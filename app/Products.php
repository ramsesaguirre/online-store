<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Products
     *
     * @package App
     */
    class Products extends Model {

        /**
         * @var string
         */
        protected $table = 'tbl_products';

        /**
         * @var string
         */
        protected $primaryKey = 'id';

        /**
         * @var array
         */
        protected $fillable = [
            'name',
            'slug',
            'description',
            'price',
            'is_active'
        ];

        /**
         * One to many
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function media() {
            return $this->hasOne(Media::class);
        }
    }
