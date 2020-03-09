<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Products;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class ClientProductsController
     *
     * @package App\Http\Controllers\Api
     */
    class ClientProductsController extends Controller {

        /**
         * Lista de productos
         *
         * @return JsonResponse
         */
        public function getList() {

            $query = Products::with('media')
                ->where('is_active', true)
                ->select(['name', 'token', 'description', 'price'])
                ->get()->toArray();

            return new JsonResponse($query, Response::HTTP_OK);
        }

        /**
         * Obtiene el producto indicado
         *
         * @param null $token
         * @return JsonResponse
         */
        public function getShow($token = null) {

            $query = Products::with('media')
                ->where(['is_active' => true, 'token' => $token])
                ->select(['name', 'token', 'description', 'price'])
                ->get()->first();

            if(is_null($query)):
                return new JsonResponse(['message' => 'El producto no es posible encontrarlo'], Response::HTTP_NOT_FOUND);
            endif;

            return new JsonResponse($query->toArray(), Response::HTTP_OK);
        }
    }
