<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    /**
     * Class OrderDetails
     */
    class OrderDetails extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {

            Schema::create('tbl_orders_details', function (Blueprint $blueprint) {
                $blueprint->bigIncrements('id');
                $blueprint->bigInteger('orders_id')->unsigned();
                $blueprint->foreign('orders_id')
                    ->references('id')
                    ->on('tbl_orders')
                    ->onDelete('cascade')
                ;
                $blueprint->bigInteger('products_id')->unsigned();
                $blueprint->foreign('products_id')
                    ->references('id')
                    ->on('tbl_products')
                    ->onDelete('cascade')
                ;
                $blueprint->integer('quantity');
                $blueprint->float('single_value')->nullable();
                $blueprint->float('total_value')->nullable();
                $blueprint->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('tbl_orders_details');
        }
    }
