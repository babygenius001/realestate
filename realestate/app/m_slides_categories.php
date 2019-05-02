<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_slides_categories extends Model
{
    //
    protected $table = 'm_slides_categories';

    public function m_slides()
    {
    	return $this->hasMany('App\m_slides','slides_categories_id','id');
    }
}
