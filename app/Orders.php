<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Orders
     *
     * @package App
     */
    class Orders extends Model {

        /**
         * @var string
         */
        protected $table = 'tbl_orders';

        /**
         * @var string
         */
        protected $primaryKey = 'id';

        /**
         * @var array
         */
        protected $fillable = [
            'user',
            'product',
            'total',
            'is_paid',
            'is_delivery'
        ];

        /**
         * One to many
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function details() {
            return $this->belongsTo(OrderDetails::class);
        }
    }
