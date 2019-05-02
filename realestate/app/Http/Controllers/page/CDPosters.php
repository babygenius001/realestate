<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products;
use App\m_products_posters;
use App\m_products_types;
use App\m_products_brands;
use App\m_products_categories;
use Auth;

class CDPosters extends Controller
{
    // 
    function __construct(){
        parent::__construct();
    }
    public $title = "Poster";
    public $link = "/posters";

    public function posters(){
    	$title = "List Poster";
        $link = $this->link;
        $customer_id = Auth::guard('m_customers')->user()->id;
        $Dash_table = m_products_posters::select('id','products_id','alias','name','image','title','description_short')->where('customers_id','=',$customer_id)->where('published','=','1')->orderBy('ordering','desc')->paginate(20);
        return view('modules.account.dashboard.poster.poster',compact('Dash_table','title','link'));
    }

    public function getNew()
    {

        $title = "New " . $this->title;
        $customer_id = Auth::guard('m_customers')->user()->id;
        $craw_products = m_products::select('id','name')->where('published','=','1')->where('customers_id','=',$customer_id)->get();
        return view('modules.account.dashboard.poster.new',compact('title','craw_products'));
    }

    public function postNew(Request $request)
    {
        $this->validate($request,['name' => 'required|min:2'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 2 characters!'
        ]);

        $DB_table = new m_products_posters();
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->new_related = $request->new_related;
        $DB_table->title = $request->title;
        $DB_table->content = $request->content;
        $DB_table->summary = $request->summary;
        $DB_table->is_new = 1;
        $DB_table->is_hot = 0;
        $DB_table->tag = $request->tag;
        $DB_table->products_id = $request->products_id;
        $DB_table->keyword = $request->keyword;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->ordering = $request->ordering;
        $DB_table->seo_title = $request->seo_title;
        $DB_table->seo_keyword = $request->seo_keyword;
        $DB_table->seo_description = $request->seo_description;
        $DB_table->checking = '0';
        $DB_table->products_videos_id = 1;
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
            $file->move('images/poster/poster/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/poster/poster/' . $yearNow . '/' . $dateNow . '/' .$file_name;
        }
        else {
            $DB_table->image ='images/noimages.jpg';
        }
       
        try
        {
            if(!$DB_table->save()){
                $error = 'Create failed!';            
            }
            return redirect()->route('NRGDashPosters')->with('notification', 'Record has created!');
        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Create failed!');
        }
    }

    public function getNewId($id)
    {

        $title = "New " . $this->title;
        $customer_id = Auth::guard('m_customers')->user()->id;
        $DB_table = m_products::findOrFail($id);

        return view('modules.account.dashboard.poster.newId',compact('title','DB_table'));
    }
    public function getUpdate($id)
    {
        # code...
        $customers_id = Auth::guard('m_customers')->user()->id;
        $DB_table = m_products_posters::where('customers_id','=',$customers_id)->findOrFail($id);
        $title = $this->title . ': ' . $DB_table->name;
        return view('modules.account.dashboard.poster.update',compact('DB_table','title'));
    }

    public function postUpdate($id, Request $request)
    {
        # code...
        $DB_table = m_products_posters::findOrFail($id);
        $DB_table->title = $request->title;
        $DB_table->content = $request->content;
        $DB_table->summary = $request->summary;
        $DB_table->tag = $request->tag;
        $DB_table->keyword = $request->keyword;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->ordering = $request->ordering;
        $DB_table->seo_title = $request->seo_title;
        $DB_table->seo_keyword = $request->seo_keyword;
        $DB_table->seo_description = $request->seo_description;

       
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
            $file->move('images/poster/poster/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/poster/poster/' . $yearNow . '/' . $dateNow . '/' .$file_name;
        }

        try
        {
            if(!$DB_table->save()){
                $error = 'Update failed!';            
            }
            return redirect()->route('NRGDashPosters')->with('notification', 'Record has been Update!');
        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Update failed!');
        }
    }
    public function unpublish($id)
    {
        # code...
        $DB_table = m_products_posters::findOrFail($id);
        $DB_table->published = 0;
        try
        {
            if(!$DB_table->save()){
                $error = 'Delete failed!';            
            }
            return redirect()->route('NRGDashPosters')->with('notification', 'Delete completed!');

        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Delete failed! This record has been using');
        }

    }
    public function getDetail($id)
    {
        # code...
        $customers_id = Auth::guard('m_customers')->user()->id;
        $DB_table = m_products_posters::where('published','=','1')->where('customers_id','=',$customers_id)->findOrFail($id);
        $title = $this->title . ': ' . $DB_table->name;
        return view('modules.account.dashboard.poster.detail',compact('DB_table','title'));
    }
}
