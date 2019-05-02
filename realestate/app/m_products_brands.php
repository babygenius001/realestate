<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products_brands extends Model
{
    //
    //Table name
    protected $table = 'm_products_brands';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    
    public function m_products()
    {
        # code...
        return $this->hasMany('App\m_products','products_brands_id','id');
    }
}
