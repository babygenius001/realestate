<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products_posters extends Model
{
    //
    protected $table = 'm_products_posters';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function m_products()
    {
    	# code...
    	return $this->belongsTo('App\m_products','products_id','id');
    }
    public function m_products_posters_details()
    {
        # code...
        return $this->hasMany('App\m_products_posters_details','products_posters_id','id');
    }
    public function m_products_posters_images()
    {
    	# code...
    	return $this->hasMany('App\m_products_posters_images','products_posters_id','id');
    }
}
