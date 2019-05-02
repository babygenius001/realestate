<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_news_categories extends Model
{
    //
    protected $table = 'm_news_categories';
    public $timestamps = true;
    public $primaryKey = 'id';
    
    public function m_news()
    {
    	return $this->hasMany('App\m_news','news_categories_id','id');
    }
}
