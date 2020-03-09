<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Media;
    use App\Products;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class AdminProductsController
     *
     * @package App\Http\Controllers\Api
     */
    class AdminProductsController extends Controller {

        /**
         * Genera un nuevo producto
         *
         * @param Request $request
         *
         * @return JsonResponse
         */
        public function setCreate(Request $request) {

            $validator = $this->getValidation($request->all());

            if($validator->fails()):
                return new JsonResponse($validator->messages()->first(), Response::HTTP_BAD_REQUEST);
            endif;

            $entity = Products::create(array_merge($request->all(), [
                'slug' => Str::slug($request->get('name')),
                'token' => Str::uuid()->toString(),
                'is_active' => true
            ]));

            return new JsonResponse($entity, Response::HTTP_CREATED);
        }

        /**
         * Genera la lista de productos
         *
         * @return JsonResponse
         */
        public function getList() {
            return new JsonResponse(Products::with('media')->get()->toArray(), Response::HTTP_OK);
        }

        /**
         * Muestra el Producto solicitado
         *
         * @param null $id
         *
         * @return JsonResponse
         */
        public function getShow($id = null) {

            $product = Products::where('id', $id);
            if($product->count() === 0):
                return new JsonResponse(['message' => 'El producto no es posible encontrarlo'], Response::HTTP_NOT_FOUND);
            endif;

            return new JsonResponse($product->get()->first()->toArray(), Response::HTTP_OK);
        }

        /**
         * Editar Registro
         *
         * @param null $id
         * @param Request $request
         *
         * @return JsonResponse
         */
        public function getEdit($id = null, Request $request) {

            $product = Products::where('id', $id);
            if($product->count() === 0):
                return new JsonResponse(['message' => 'El producto no es posible encontrarlo'], Response::HTTP_NOT_FOUND);
            endif;

            $product = Products::find($id);
            $product->name = $request->get('name', null);
            $product->description = $request->get('description', null);
            $product->price = $request->get('price', null);
            $product->slug = Str::slug($product->name);
            $product->save();

            return new JsonResponse(Products::with('media')->where('id', $id)->first()->toArray(), Response::HTTP_OK);
        }

        /**
         * Eliminar Registro
         *
         * @param null $id
         *
         * @return JsonResponse
         */
        public function setRemove($id = null) {

            $product = Products::find($id);
            if(is_null($product)):
                return new JsonResponse(['message' => 'El producto no es posible encontrarlo'], Response::HTTP_NOT_FOUND);
            endif;

            $product->forceDelete();
            return new JsonResponse(['message' => 'Producto eliminado correctamente'], Response::HTTP_OK);

        }

        /**
         * Genera el proceso de validacion
         *
         * @param array $array
         * @return \Illuminate\Contracts\Validation\Validator
         */
        private function getValidation(array $array = []) {
            return Validator::make($array, $this->getRules());
        }

        /**
         * Reglas de validacion
         *
         * @return array
         */
        private function getRules() {

            return [
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:1500',
                'price' => 'required|string|max:20'
            ];
        }
    }
