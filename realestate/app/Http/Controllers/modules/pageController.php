<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products_posters_details;
use App\m_products_categories;
use App\m_products_brands;
use App\m_news;
use Auth;
class pageController extends Controller
{
    //
    private $page_logged = false;


    function __construct(){
        parent::__construct();

    }
    
    public function home()
    {
        $Products_categories = m_products_categories::select('id','name')->where('published','=','1')->get();

        $Products_posters_details = m_products_posters_details::select('id','alias','products_posters_id','name','price')->where('published','=','1')->where('storage','>','0')->get();
        // ->random(6);
        $news = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(10)->get();
        view()->share('news',$news);

        $Products_brands = m_products_brands::select('id','name','image','url')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(10)->get();
        view()->share('Products_brands',$Products_brands);

    	return view('modules.home',compact('Products_posters_details','Products_categories','news','Products_brands'));
    }
}
