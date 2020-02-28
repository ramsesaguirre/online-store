<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class OrderDetails
     *
     * @package App
     */
    class OrderDetails extends Model {

        /**
         * @var string
         */
        protected $table = 'tbl_orders_details';

        /**
         * @var string
         */
        protected $primaryKey = 'id';

        /**
         * @var array
         */
        protected $fillable = [
            'order',
            'product',
            'quantity',
            'single_value',
            'total_value'
        ];

        /**
         * Many to one
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function orders() {
            return $this->belongsTo(Orders::class);
        }
    }
