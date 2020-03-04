<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    /**
     * Class Orders
     */
    class Orders extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {

            Schema::create('tbl_orders', function (Blueprint $blueprint) {
                $blueprint->bigIncrements('id');
                $blueprint->bigInteger('user')->unsigned();
                $blueprint->foreign('user')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                $blueprint->bigInteger('product')->unsigned();
                $blueprint->foreign('product')
                    ->references('id')
                    ->on('tbl_products')
                    ->onDelete('cascade')
                ;
                $blueprint->float('total')->nullable();
                $blueprint->boolean('is_paid')->nullable();
                $blueprint->boolean('is_delivery')->nullable();
                $blueprint->boolean('is_active');
                $blueprint->uuid('token');
                $blueprint->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('tbl_orders');
        }
    }
