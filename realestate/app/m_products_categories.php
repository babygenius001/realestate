<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products_categories extends Model
{
    //Table name
    protected $table = 'm_products_categories';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    public function m_products_types()
    {
    	# code...
    	return $this->hasMany('App\m_products_types','products_categories_id','id');
    }
}
