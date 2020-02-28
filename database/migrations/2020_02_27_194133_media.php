<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    /**
     * Class Media
     */
    class Media extends Migration {

        protected $hidden = ['product_id'];
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {

             Schema::create('tbl_media', function (Blueprint $blueprint) {
                 $blueprint->bigIncrements('id');
                 $blueprint->bigInteger('products_id')->unsigned();
                 $blueprint->foreign('products_id')
                     ->references('id')
                     ->on('tbl_products')
                     ->onDelete('cascade');
                 $blueprint->string('file');
                 $blueprint->timestamps();
             });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {

            Schema::dropIfExists('tbl_media');
        }
    }
