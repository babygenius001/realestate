<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_slides extends Model
{
    //
    protected $table = 'm_slides';
    public $timestamps = true;
    
    public function m_slides_categories()
    {
    	return $this->belongsTo('App\m_slides_categories','slides_categories_id','id');
    }
}
