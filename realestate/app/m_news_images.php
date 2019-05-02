<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_news_images extends Model
{
    //
    protected $table = 'm_news_images';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    public function m_news_images_groups()
    {
    	return $this->belongsTo('App\m_news_images_groups','news_images_groups_id','id');
    }
}
