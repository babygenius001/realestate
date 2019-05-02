<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_products_posters_images;
use App\m_products_posters_details;
use App\m_products_posters;
use App\m_products_colours;
use Auth;
class CDPostersImages extends Controller
{
     function __construct(){
        parent::__construct();
    }
    public $title = "Model";
    public $link = "/posters_images";

    public function posters_images($id)
    {
    	$customers_id = Auth::guard('m_customers')->user()->id;
    	$get_products_posters = m_products_posters::select('id','name')->findOrFail($id);
    	$DB_table = m_products_posters_images::where('products_posters_id','=',$id)->where('published','=','1')->orderBy('ordering','desc')->where('customers_id','=',$customers_id)->get();
    	$title =  "Poster: " .  $get_products_posters->name ." - List image";
        $link = $this->link . "/" . $id ;
        return view('modules.account.dashboard.poster_image.poster_image',compact('DB_table','title','link','id'));
    }
    public function getNew($id)
    {
    	$get_products_posters = m_products_posters::findOrFail($id);
        $title = "Post: " . $get_products_posters->name . " - New image:";
        return view('modules.account.dashboard.poster_image.new',compact('title','get_products_posters','id'));
    }

	public function postNew($id, Request $request)
    {
    	$this->validate($request,['image' => 'required'],[
            'image.required' => 'No image selected!'
        ]);

        if(count($request->file('image')) > 19){
			return redirect()->back()->with('alert', 'Upload maximum 20 item!');
		}

    	$ordering =  $request->ordering;
    	$customers_id = Auth::guard('m_customers')->user()->id;
        $arrFiles = $request->file('image');

        foreach ($arrFiles as $file) {
        	# code...
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $dateNow = getDateNow();
            $yearNow = getYearNow();
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/products/' . $yearNow . '/' . $dateNow,$file_name);

        	$DB_table = new m_products_posters_images();
	        $DB_table->ordering = $request->ordering;
	        $DB_table->products_posters_id = $id;
	        $DB_table->customers_id = $customers_id;
            $DB_table->image = 'images/products/products/' . $yearNow . '/' . $dateNow . '/' .$file_name;
	       	try
	        {
	            if(!$DB_table->save()){
	                $error = 'Create failed!';            
	            }
	        }
	        catch (\Exception $e) 
	        {
	             return redirect()->back()->with('alert', 'Update failed!');
	        }
        }
		return redirect()->route('NRGDashPostersImages',['id'=>$id])->with('notification', 'Record has Created!');

    }
    public function unpublish($id)
    {
        # code...
        $DB_table = m_products_posters_images::findOrFail($id);
        $DB_table->published = 0;
        try
        {
            if(!$DB_table->save()){
                $error = 'Delete failed!';            
            }
            return redirect()->back()->with('notification', 'Delete completed!');

        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Delete failed! This record has been using');
        }

    }
}
