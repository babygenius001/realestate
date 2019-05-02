<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products_brands;
use App\m_news;
use App\m_news_categories;

class pageNews extends Controller
{
    //

    function __construct(){
        parent::__construct();
        $news = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(10)->get();
	    view()->share('news',$news);

    	$Products_brands = m_products_brands::select('id','name','image','url')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(10)->get();
	    view()->share('Products_brands',$Products_brands);
    }
    
    public function getNews()
    {
    	# code...
        $title = "News";

  	    $bodyNews = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(5)->get();

  	    $bodynews_hot = m_news::select('id','alias','name','summary','image','is_new','new_related')->where('is_hot','=','1')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(3)->get();

  	    $bodyNews_list = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->paginate(10);
    	
        return view("modules.news.news",compact('title','bodyNews','bodynews_hot','bodyNews_list'));
    }
    public function getCates($alias,$id)
    {


    	$get_products_categories = m_news_categories::where('alias','=',$alias)->findOrFail($id);
    	$case = $get_products_categories->parent_id;
		$title = $get_products_categories->name;

    	switch ($case) {
		    case "---":

		    	$get_list_categories = m_news_categories::select('id')->where('parent_id','=',$get_products_categories->id)->get();

		    	foreach ($get_list_categories as $key) {
		    		$arrays[] = $key->id;
		    	}

				$bodyNews = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->whereIn('news_categories_id',$arrays)->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(5)->get();
				
	
				$bodynews_hot = m_news::select('id','alias','name','summary','image','is_new','new_related')->whereIn('news_categories_id',$arrays)->where('is_hot','=','1')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(3)->get();

				$bodyNews_list = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->whereIn('news_categories_id',$arrays)->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->paginate(10);

		        break;
		    default:
		  	    $bodyNews = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('news_categories_id','=',$id)->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(5)->get();

		  	    $bodynews_hot = m_news::select('id','alias','name','summary','image','is_new','new_related')->where('news_categories_id','=',$id)->where('is_hot','=','1')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(3)->get();

		  	    $bodyNews_list = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('news_categories_id','=',$id)->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->paginate(10);
                break;
		}

        return view("modules.news.newsCate",compact('title','bodyNews','bodynews_hot','bodyNews_list'));

    }
    public function getDetail($alias,$id)
    {
    	$get_news = m_news::where('alias','=',$alias)->findOrFail($id);
    	$get_category = m_news_categories::findOrFail($get_news->news_categories_id);
    	$get_dad_category = m_news_categories::where('id','=',$get_category->parent_id)->get();
		$title = $get_category->name;
		$link = $get_dad_category[0]->name . " > " . $get_category->name . " > " . $get_news->name;

    	$bodyNews = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(5)->get();
    	# code...
    	return view("modules.news.detail",compact('title','bodyNews','link','get_news'));
    }
}
