<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_news extends Model
{
    //
    protected $table = 'm_news';
    public $timestamps = true;
    public $primaryKey = 'id';

    public function m_news_categories($value='')
    {
    	return $this->belongsTo('App\m_news_categories','news_categories_id','id');
    }
}
