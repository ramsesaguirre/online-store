<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Products;
    use Illuminate\Database\Eloquent\Relations\HasOne;
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

            $query = Products::with(['media' => function (HasOne $hasOne) {
                $hasOne->select(['file']);
            }])->where('is_active', true)
                ->get(['name', 'token', 'description', 'price']);
            return new JsonResponse($query, Response::HTTP_OK);
        }
    }
