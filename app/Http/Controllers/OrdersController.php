<?php

    namespace App\Http\Controllers;

    use App\OrderDetails;
    use App\Orders;
    use App\Products;
    use App\Services\OrderCreate;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Ramsey\Uuid\Uuid;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class OrdersController
     *
     * @package App\Http\Controllers
     */
    class OrdersController extends Controller {


        /**
         * Genera el proceso de agregar el
         * pedido correspondiente
         *
         * @param Request $request
         * @param OrderCreate $create
         *
         * @return JsonResponse
         * @throws \Exception
         */
        public function create(Request $request, OrderCreate $create) {

            /*$request->query->add([
                'order' => [
                    ['product' => 1, 'cant' => 3],
                    ['product' => 2, 'cant' => 1],
                    ['product' => 3, 'cant' => 1],
                    ['product' => 4, 'cant' => 2],
                    ['product' => 5, 'cant' => 3]
                ]
            ]);*/

            if(!is_array($request->get('order', null))):
                return new JsonResponse(['message' => 'No se ha enviado el arreglo solicitado'], Response::HTTP_BAD_REQUEST);
            endif;

            $validator = Validator::make($request->all(), [
                'order.*.product' => 'required|numeric|exists:tbl_products,id',
                'order.*.cant' => 'required|numeric|min:1'
            ]);

            if($validator->fails()):
                return new JsonResponse($validator->messages()->first(), Response::HTTP_BAD_REQUEST);
            endif;

            return $create->create($request);
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
