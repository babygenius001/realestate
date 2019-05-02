<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_products_posters_details extends Model
{
    //
    protected $table = 'm_products_posters_details';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function m_products_posters()
    {
    	# code...
    	return $this->belongsTo('App\m_products_posters','products_posters_id','id');
    }
    public function m_products_colours()
    {
    	# code...
    	return $this->belongsTo('App\m_products_colours','products_colours_id','id');
    }
}
