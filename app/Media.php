<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Media
     *
     * @package App
     */
    class Media extends Model {

        /**
         * @var string
         */
        protected $table = 'tbl_media';

        /**
         * @var string
         */
        protected $primaryKey = 'id';

        /**
         * @var array
         */
        protected $fillable = [
            'products_id',
            'file'
        ];

        protected $hidden = [
            'id',
            'products_id',
            'created_at',
            'updated_at'
        ];

        /**
         * Many to one
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function products() {
            return $this->belongsTo(Products::class, 'media');
        }
    }
