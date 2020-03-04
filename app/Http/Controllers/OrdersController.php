<?php

    namespace App\Http\Controllers;

    use App\Orders;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;

    /**
     * Class OrdersController
     *
     * @package App\Http\Controllers
     */
    class OrdersController extends Controller {

        public function create() {

            $order = Orders::where(['is_active' => true, 'is_paid' => null, 'is_delivery' => null])->first();

            if(is_null($order)):

            endif;
        }
    }
