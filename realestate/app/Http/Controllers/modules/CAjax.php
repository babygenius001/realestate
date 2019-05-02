<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products_types;

class CAjax extends Controller
{
    //
    public function getProducts_categories($id)
    {
    	# code.
    	$AJX_products_types = m_products_types::select('id','name')->where('products_categories_id',$id)->get();
    	foreach ($AJX_products_types as $AJX_type_item) {
			echo "<option value='" . $AJX_type_item->id . "'>" . $AJX_type_item->name . "</option>";
    	}
    }
}
