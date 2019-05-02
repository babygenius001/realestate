<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products_posters;
use App\m_products_posters_details;
use App\m_news;
use App\m_products_posters_images;


class pageProduct extends Controller
{
    //
    public function getProducts($value='')
    {
    	# code...
    }

    public function getDetail($alias,$id)
    {
    	$getProductsModel = m_products_posters_details::where('published','=',1)->where('alias','=',$alias)->findOrFail($id);
    	$getProductsPosters = $getProductsModel->m_products_posters;
    	$getProductsNeighborhood = m_products_posters_details::where('published','=',1)->where('products_posters_id','=',$getProductsPosters->id)->where('id','!=',$id)->get();
    	$getProductsImages = $getProductsPosters->m_products_posters_images;
    	$getProducts = $getProductsPosters->m_products;
    	$title = $getProductsPosters->name;
    	
    	$news = m_news::select('id','alias','name','summary','image','is_new','new_related','is_hot')->where('show_in_homepage','=','1')->where('published','=','1')->orderBy('created_at','desc')->orderBy('ordering','desc')->limit(10)->get();
        view()->share('news',$news);

    	if(!$getProductsPosters->published == 1){
        	return redirect()->back()->with('alert', 'Product not found!');
    	}

    	return view('modules.products.detail',compact('title','getProductsModel','getProductsPosters','getProductsNeighborhood','getProductsImages','getProducts'));
    }
}
