<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products;
use App\m_products_types;
use App\m_products_brands;
use App\m_products_categories;
use Auth;

class CDProducts extends Controller
{
    //
    function __construct(){
        parent::__construct();
    }

    public $title = "product";
    public $link = "/products";

 	public function products(){
    	$title = "All product";
        $link = $this->link;
        $customer_id = Auth::guard('m_customers')->user()->id;
        $Dash_table = m_products::select('id','name','image','description_short')->where('customers_id','=',$customer_id)->where('published','=','1')->orderBy('ordering','desc')->paginate(20);
        return view('modules.account.dashboard.products.products',compact('link','Dash_table','title'));
    }

    public function getNew()
    {
    	$title = "New " . $this->title;

        $link = $this->link;
    	$craw_products_categories = m_products_categories::select('id','name')->where('published','=','1')->get();
    	$craw_products_types = m_products_types::select('id','name')->where('published','=','1')->get();
    	$craw_products_brands = m_products_brands::select('id','name')->where('published','=','1')->get();
    	return view('modules.account.dashboard.products.new',compact('title','craw_products_types','craw_products_brands','craw_products_categories'));
    }

    public function postNew(Request $request)
    {
    	$this->validate($request,['name' => 'required|unique:m_products|min:2'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 2 characters!'
        ]);
        $DB_table = new m_products();
		$DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->height = $request->height;
		$DB_table->width = $request->width;
		$DB_table->depth = $request->depth;
		$DB_table->weight = $request->weight;
		$DB_table->new_related = $request->new_related;
		$DB_table->is_new = $request->is_new;
		$DB_table->is_hot = $request->is_hot;
		$DB_table->tag = $request->tag;
		$DB_table->keyword = $request->keyword;
		$DB_table->products_types_id = $request->products_types_id;
		$DB_table->products_brands_id = $request->products_brands_id;
		$DB_table->customers_id = $request->customers_id;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->seo_title = $request->seo_title;
		$DB_table->seo_keyword = $request->seo_keyword;
		$DB_table->seo_description = $request->seo_description;
		$DB_table->checking = '0';
		$DB_table->customers_id = Auth::guard('m_customers')->user()->id;


		if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }

            $dateNow = getDateNow();
            $yearNow = getYearNow();
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/products/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/products/products/' . $yearNow . '/' . $dateNow . '/' .$file_name;
        }
        else {
            $DB_table->image ='images/noimages.jpg';
        }

		try
        {
            if(!$DB_table->save()){
                $error = 'Create failed!';            
            }
        	return redirect()->route('NRGDashProducts')->with('notification', 'Record has created!');
        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Create failed!');
        }
    }

    public function getDetail($id)
    {
    	# code...
        $customers_id = Auth::guard('m_customers')->user()->id;
    	$DB_table = m_products::where('published','=','1')->where('customers_id','=',$customers_id)->findOrFail($id);
    	$title = $this->title . ': ' . $DB_table->name;
    	return view('modules.account.dashboard.products.detail',compact('DB_table','title'));
    }

    public function getUpdate($id)
    {
    	# code...
    	$craw_products_categories = m_products_categories::select('id','name')->where('published','=','1')->get();
    	$craw_products_types = m_products_types::select('id','name')->where('published','=','1')->get();
    	$craw_products_brands = m_products_brands::select('id','name')->where('published','=','1')->get();
    	$DB_table = m_products::findOrFail($id);
    	$title = $this->title . ': ' . $DB_table->name;
    	return view('modules.account.dashboard.products.update',compact('DB_table','title','craw_products_categories','craw_products_types','craw_products_brands'));
    }
    public function postUpdate($id, Request $request)
    {
    	# code...
    	$this->validate($request,['name' => 'required|min:2'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 2 characters!'
        ]);

    	$DB_table = m_products::findOrFail($id);
		$DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->height = $request->height;
		$DB_table->width = $request->width;
		$DB_table->depth = $request->depth;
		$DB_table->weight = $request->weight;
		$DB_table->new_related = $request->new_related;
		$DB_table->is_new = $request->is_new;
		$DB_table->is_hot = $request->is_hot;
		$DB_table->tag = $request->tag;
		$DB_table->keyword = $request->keyword;
		$DB_table->products_types_id = $request->products_types_id;
		$DB_table->products_brands_id = $request->products_brands_id;
		$DB_table->customers_id = $request->customers_id;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->seo_title = $request->seo_title;
		$DB_table->seo_keyword = $request->seo_keyword;
		$DB_table->seo_description = $request->seo_description;
		$DB_table->customers_id = Auth::guard('m_customers')->user()->id;

		if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }

            $dateNow = getDateNow();
            $yearNow = getYearNow();
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/products/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/products/products/' . $yearNow . '/' . $dateNow . '/' .$file_name;
        }

		try
        {
            if(!$DB_table->save()){
                $error = 'Update failed!';            
            }
        	return redirect()->route('NRGDashProducts')->with('notification', 'Record has been Update!');
        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Update failed!');
        }
    }

    public function unpublish($id)
    {
        # code...
        $DB_table = m_products::findOrFail($id);
        $DB_table->published = 0;
        try
        {
            if(!$DB_table->save()){
                $error = 'Delete failed!';            
            }
            return redirect()->route('NRGDashProducts')->with('notification', 'Delete completed!');

        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Delete failed! This record has been using');
        }

    }
}
