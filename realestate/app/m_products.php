<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products extends Model
{
    //
    //Table name
    protected $table = 'm_products';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    public function m_products_brands()
    {
    	# code...
    	return $this->belongsTo('App\m_products_brands','products_brands_id','id');
    }

    public function m_products_types()
    {
        # code...
        return $this->belongsTo('App\m_products_types','products_types_id','id');
    }

    public function m_products_posters()
    {
    	# code...
    	return $this->hasMany('App\m_products_posters','products_id','id');
    }
}
