<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_customers_addresses extends Model
{
    //
    protected $table ='m_customers_addresses';
	public $timestamps = false;

    public function m_customers()
    {
    	# code...
    	return $this->belongsTo('App\m_customers','customers_id','id');
    }
}
