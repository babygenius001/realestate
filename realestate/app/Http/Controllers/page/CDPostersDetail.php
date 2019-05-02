<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products_posters_details;
use App\m_products_posters;
use App\m_products_colours;
class CDPostersDetail extends Controller
{
    //
    function __construct(){
        parent::__construct();
    }
    public $title = "Model";
    public $link = "/posters_detail";

    public function posters_detail($id)
    {
    	$get_products_posters = m_products_posters::findOrFail($id);
    	$title =  "Poster: " .  $get_products_posters->name ." - List models";
        $link = $this->link . "/" . $id ;
        $Dash_table = m_products_posters_details::select('id','alias','storage','products_colours_id','name','price')->where('published','=','1')->where('products_posters_id','=',$id)->orderBy('ordering','desc')->paginate(20);
        return view('modules.account.dashboard.poster_detail.poster_detail',compact('Dash_table','title','link'));
    }
        public function getNew($id)
    {
    	$get_products_posters = m_products_posters::findOrFail($id);
    	$craw_products_colours = m_products_colours::where('published','=','1')->get();
        $title = "New " . $this->title;
        return view('modules.account.dashboard.poster_detail.new',compact('title','craw_products_colours','get_products_posters'));
    }

	public function postNew($id, Request $request)
    {
        $this->validate($request,['name' => 'required|min:2'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 2 characters!'
        ]);

        $DB_table = new m_products_posters_details();
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;

        $DB_table->products_colours_id = $request->products_colours_id;
        $DB_table->products_posters_id = $id;


        $DB_table->manufactories = $request->manufactories;
        $DB_table->quality = $request->quality;
        $DB_table->storage = $request->storage;
        $DB_table->price = $request->price;
        $DB_table->max_buying = $request->max_buying;


        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;

        $DB_table->ordering = $request->ordering;

        $DB_table->seo_title = $request->seo_title;
        $DB_table->seo_keyword = $request->seo_keyword;
        $DB_table->seo_description = $request->seo_description;

        try
        {
            if(!$DB_table->save()){
                $error = 'Create failed!';            
            }
            return redirect()->route('NRGDashPostersDetail',['id'=>$DB_table->products_posters_id])->with('notification', 'Record has Created!');
        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Create failed!');
        }
    }
    public function getUpdate($id)
    {
        $DB_table = m_products_posters_details::findOrFail($id);
        $craw_products_colours = m_products_colours::where('published','=','1')->get();
        $title = "Update " . $this->title;
        return view('modules.account.dashboard.poster_detail.update',compact('title','craw_products_colours','DB_table'));
    }
    public function postUpdate($id, Request $request)
    {
        $this->validate($request,['name' => 'required|min:2'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 2 characters!'
        ]);

        $DB_table = m_products_posters_details::findOrFail($id);
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->products_colours_id = $request->products_colours_id;
        $DB_table->manufactories = $request->manufactories;
        $DB_table->quality = $request->quality;
        $DB_table->storage = $request->storage;
        $DB_table->price = $request->price;
        $DB_table->max_buying = $request->max_buying;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->ordering = $request->ordering;
        $DB_table->seo_title = $request->seo_title;
        $DB_table->seo_keyword = $request->seo_keyword;
        $DB_table->seo_description = $request->seo_description;
        $DB_table->save();
        try
        {
            if(!$DB_table->save()){
                $error = 'Create failed!';            
            }
            return redirect()->route('NRGDashPostersDetail',['id'=>$DB_table->products_posters_id])->with('notification', 'Record has Update!');
        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Update failed!');
        }
    }
    public function unpublish($id)
    {
        # code...
        $DB_table = m_products_posters_details::findOrFail($id);
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
}
