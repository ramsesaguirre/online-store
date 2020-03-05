<?php

    namespace App\Services;

    use App\OrderDetails;
    use App\Orders;
    use App\Products;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use PDOException;
    use Ramsey\Uuid\Uuid;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\ParameterBag;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class OrderCreate
     *
     * @package App\Services
     */
    class OrderCreate {

        /**
         * Genera el proceso de registrar el pedido
         * correspondiente
         *
         * @param Request $request
         *
         * @return JsonResponse
         * @throws \Exception
         */
        public function create(Request $request) {

            try {
                DB::beginTransaction();

                $order = $this->setCreateOrder($request->get('order'));
                $details = $this->setCreateDetail($order, $request->get('order'));
                DB::commit();

                return new JsonResponse($order, Response::HTTP_CREATED);
            }
            catch (PDOException $exception) {
                DB::rollBack();
                return new JsonResponse('', Response::HTTP_BAD_REQUEST);
            }
        }

        /**
         * Inserta el dato correspondiente
         *
         * @param array $array
         *
         * @return Orders
         * @throws \Exception
         */
        private function setCreateOrder(array $array = []) {

            $entity = new Orders();
            $entity->user = 1;
            $entity->token = Uuid::uuid4()->toString();
            $entity->is_active = true;
            $entity->is_paid = false;
            $entity->is_delivery = false;
            $entity->total = $this->getSumProducts($array);
            $order = $entity->save();

            if(!$order):
                throw new PDOException('No es posible guardar la orden solicitada');
            endif;

            return $entity;
        }

        /**
         * Genera el proceso de iteracion de detalles
         *
         * @param Orders $orders
         * @param array $array
         *
         * @return array
         */
        private function setCreateDetail(Orders $orders, array $array = []) {

            $list = [];
            foreach ($array AS $item):
                $list[] = $this->setCreateDetailEntity($orders, (new ParameterBag($item)));
            endforeach;
            return $list;
        }

        /**
         * Genera el proceso de insertar registro
         *
         * @param Orders $orders
         * @param ParameterBag $parameterBag
         *
         * @return OrderDetails
         */
        private function setCreateDetailEntity(Orders $orders, ParameterBag $parameterBag) {

            $product = Products::find($parameterBag->get('product', null));

            $detail = new OrderDetails();
            $detail->orders_id = $orders->id;
            $detail->products_id = $product->id;
            $detail->quantity = $parameterBag->get('cant', 0);
            $detail->single_value = is_null($product) ? null : (float) $product->price;
            $detail->total_value = (float) $this->getOperate($product ? $product->price : 0, $parameterBag->get('cant', 0));
            $result = $detail->save();

            if(!$result):
                throw new PDOException('No es posible guardar la orden solicitada');
            endif;

            return $detail;
        }

        /**
         * @param array $array
         * @return float|int
         */
        private function getSumProducts(array $array = []) {

            $list = [];
            foreach ($array AS $value):
                $list[] = $this->getProductTotalValue($value['product'], $value['cant']);
            endforeach;
            return array_sum($list);
        }

        /**
         * @param int|null $id
         * @param int|null $cant
         *
         * @return float|int
         */
        private function getProductTotalValue(?int $id, ?int $cant) {

            $query = Products::find($id);
            if(!is_null($query)):
                return $this->getOperate($query['price'], $cant);
            endif;
            return 0;
        }

        /**
         * @param float|null $price
         * @param int|null $cant
         *
         * @return float|int
         */
        private function getOperate(?float $price, ?int $cant) {
            return $price * $cant;
        }
    }
