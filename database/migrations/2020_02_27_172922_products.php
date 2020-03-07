<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    /**
     * Class Products
     */
    class Products extends Migration {


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {

            Schema::create('tbl_products', function (Blueprint $blueprint) {
                $blueprint->bigIncrements('id');
                $blueprint->string('name', 190);
                $blueprint->string('slug', 190);
                $blueprint->uuid('token');
                $blueprint->text('description');
                $blueprint->string('price');
                $blueprint->boolean('is_active');
                $blueprint->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('tbl_products');
        }
    }
