<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_news_images_groups extends Model
{
    //
    protected $table = 'm_news_images_groups';
    //Timestamps
    public $timestamps = true;
    //Primary key
    public $primaryKey = 'id';

    public function m_news_images()
    {
    	return $this->hasMany('App\m_news_images','news_images_groups_id','id');
    }
}
