<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\m_news_categories;
use App\m_slides_categories;
use App\m_products_categories;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

 	function __construct(){

     	// m_news_categories
	    	$DBMenu_news_categories = m_news_categories::select('id','alias','name','parent_id')->where('parent_id','=','---')->get();
	    	view()->share('DBMenu_news_categories',$DBMenu_news_categories);
    	// end m_news_categories

        // m_products_categories
            $DBMenu_products_categories = m_products_categories::select('id','name')->where('published','=','1')->get();
            view()->share('DBMenu_products_categories',$DBMenu_products_categories);
        // end m_products_categories

     	// m_slides_categories
	    	$DBSlides_categories = m_slides_categories::select('id','name')->where('published','=','1')->get();

	    	view()->share('DBSlides_categories',$DBSlides_categories);
    	// end m_slides_categories
    }
}
