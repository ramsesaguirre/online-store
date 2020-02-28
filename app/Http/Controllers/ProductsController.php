<?php

    namespace App\Http\Controllers;

    use App\Products;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class Products
     *
     * @package App\Http\Controllers
     */
    class ProductsController extends Controller {

        /**
         * Listado de Productos
         *
         * @return JsonResponse
         */
        public function getList() {
            //return new JsonResponse(Products::all(), Response::HTTP_OK);
            return new JsonResponse(Products::with('media')->get(), Response::HTTP_OK);
        }

        /**
         * Mostrar registro
         *
         * @param null $id
         * @return JsonResponse
         */
        public function getShow($id = null) {

            $result = Products::where(['is_active' => true, 'id' => $id])->first();
            return new JsonResponse($result, is_null($result) ? Response::HTTP_NOT_FOUND : Response::HTTP_OK);
        }

        /**
         * Nuevo registro
         *
         * @param Request $request
         * @return JsonResponse
         */
        public function getNew(Request $request) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'slug' => 'required|string|max:50',
                'description' => 'required|string|max:1500',
                'price' => 'required|string|max:20'
            ]);

            if($validator->fails()):
                return new JsonResponse($validator->messages()->first(), Response::HTTP_BAD_REQUEST);
            else:
                $model = new Products();
                $model->name = $request->input('name');
                $model->slug = Str::slug($request->input('slug'));
                $model->description = $request->input('description');
                $model->price = $request->input('price');
                $result = $model->save();

                return new JsonResponse($result, Response::HTTP_CREATED);
            endif;
        }

        /**
         * Editar Registro
         *
         * @param null $id
         * @param Request $request
         * @return JsonResponse
         */
        public function getEdit($id = null, Request $request) {

            $model = Products::where(['is_active' => true, 'id' => $id])->first();

            if(is_null($model)):
                return new JsonResponse(['message' => 'No existe el registro solicitado'], Response::HTTP_NOT_FOUND);
            endif;

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'slug' => 'required|string|max:50',
                'description' => 'required|string|max:1500',
                'price' => 'required|string|max:20'
            ]);

            if($validator->fails()):
                return new JsonResponse($validator->messages()->first(), Response::HTTP_BAD_REQUEST);
            endif;

            $model->name = $request->input('name');
            $model->slug = Str::slug($request->input('slug'));
            $model->description = $request->input('description');
            $model->price = $request->input('price');
            $result = $model->save();

            return new JsonResponse($result, Response::HTTP_CREATED);
        }

        /**
         * Eliminar Registro
         *
         * @param null $id
         * @param Request $request
         *
         * @return JsonResponse
         */
        public function getRemove($id = null, Request $request) {

            $model = Products::where(['is_active' => true, 'id' => $id])->first();

            if(is_null($model)):
                return new JsonResponse(['message' => 'No existe el registro solicitado'], Response::HTTP_NOT_FOUND);
            endif;

            if($request->request->has('_token')):
                $model->delete();
                return new JsonResponse(['message' => 'Registro Eliminado'], Response::HTTP_NO_CONTENT);
            endif;

            return new JsonResponse(['message' => 'No es posible eliminar el registro solicitado'], Response::HTTP_BAD_REQUEST);
        }
    }
