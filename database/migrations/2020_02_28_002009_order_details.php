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
                $blueprint->bigInteger('order')->unsigned();
                $blueprint->foreign('order')
                    ->references('id')
                    ->on('tbl_orders')
                    ->onDelete('cascade')
                ;
                $blueprint->bigInteger('product')->unsigned();
                $blueprint->foreign('product')
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
