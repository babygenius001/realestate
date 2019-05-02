<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products_types extends Model
{
    //Table name
    protected $table = 'm_products_types';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    public function m_products_categories()
    {
    	# code...
    	return $this->belongsTo('App\m_products_categories','products_categories_id','id');
    }
    public function m_products()
    {
        # code...
        return $this->hasMany('App\m_products','products_types_id','id');
    }
}
