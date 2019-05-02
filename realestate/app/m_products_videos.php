<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products_videos extends Model
{
    //
    protected $table = 'm_products_videos';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    public function m_customers()
    {
    	# code...
    	return $this->belongsTo('m_customers','customers_id','id');
    }
}
