<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
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

        public function setCreate(Request $request) {

            $request->query->add(['name' => 'test', 'description' => 'test', 'price' => '100']);

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

        public function getList() {

        }

        public function getShow() {

        }

        public function getEdit() {

        }

        public function setRemove() {

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
