<?php

    namespace App\Http\Controllers;

    use App\Media;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class MediaController
     *
     * @package App\Http\Controllers
     */
    class MediaController extends Controller {

        /**
         * Listado de Productos
         *
         * @return JsonResponse
         */
        public function getList() {
            return new JsonResponse(Media::all(), Response::HTTP_OK);
        }

        /**
         * Mostrar registro
         *
         * @param null $id
         * @return JsonResponse
         */
        public function getShow($id = null) {

            $result = Media::where(['id' => $id])->first();
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
                'product' => 'required|integer|max:20',
                'file' => 'required|string|max:190'
            ]);

            if($validator->fails()):
                return new JsonResponse($validator->messages()->first(), Response::HTTP_BAD_REQUEST);
            endif;

            $model = new Media();
            $model->product = $request->input('product');
            $model->file = $request->input('file');
            $result = $model->save();

            return new JsonResponse($result, Response::HTTP_CREATED);
        }

        /**
         * Editar Registro
         *
         * @param null $id
         * @param Request $request
         * @return JsonResponse
         */
        public function getEdit($id = null, Request $request) {

            $model = Media::where(['id' => $id])->first();

            if(is_null($model)):
                return new JsonResponse(['message' => 'No existe el registro solicitado'], Response::HTTP_NOT_FOUND);
            endif;

            $validator = Validator::make($request->all(), [
                'product' => 'required|integer|max:20',
                'file' => 'required|string|max:190'
            ]);

            if($validator->fails()):
                return new JsonResponse($validator->messages()->first(), Response::HTTP_BAD_REQUEST);
            endif;

            $model->product = $request->input('product');
            $model->file = $request->input('file');
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

            $model = Media::where(['id' => $id])->first();

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
