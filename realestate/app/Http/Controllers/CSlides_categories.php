<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_slides_categories;
use App\m_slides;
use Auth;
class CSlides_categories extends Controller
{
    //
     public $title = 'Slide Category';
	public $routelink = 'slides/slides_categories';

    public function getList($items = 5)
    {
        $title = $this->title;
        $routeLink = $this->routelink;
        // $DB_table = m_slides_categories_brands::all();
        $DB_table = m_slides_categories::paginate($items);

        return view('admin.modules.slides.slides_categories.slides_categories',compact('title','routeLink','DB_table'));
    }
    public function getInsert()
    {
    
    	$title = 'New slides_categories record';
    	$routeLink = $this->routelink;
    	return view('admin.modules.slides.slides_categories.insert',compact('title','routeLink'));
    }

    public function getDetail($id)
    {
    	// $DB_table_categories = m_slides_categories::find($id);
     //    $DB_table = m_slides_categories::select('id','summary','created_at','title')->where('slides_categories_categories_id','=',$id)->orderBy('created_at','desc')->paginate(5);
    	// $title = $this->title;
     //    $routeLink = $this->routelink;
     //    return view('admin.modules.slides.slides_categories.detail',compact('title','routeLink','DB_table','DB_table_categories'));
    	$DB_table = m_slides_categories::find($id);
        $title = 'slides categories update';
        $routeLink = $this->routelink;
        return view('admin.modules.slides.slides_categories.detail',compact('title','routeLink','DB_table'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,[
    	 	'name' => 'required|unique:m_slides_categories|min:3|max:100',

    	],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_slides_categories();
		$DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->published = $request->published;
		$DB_table->width = $request->width;
		$DB_table->height = $request->height;
		$DB_table->height_small = $request->height_small;
		$DB_table->width_small = $request->width_small;
		$DB_table->action_id = Auth::guard('m_managers')->user()->id;

		try
        {
            if(!$DB_table->save()){
                $error = 'Create failed!';            
            }
        	return redirect()->back()->with('notification', 'Record has created!');

        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Create failed!');
        }
    }


    public function getUpdate($id)
    {

        $DB_table = m_slides_categories::find($id);
        $title = 'slides categories update';
        $routeLink = $this->routelink;
        return view('admin.modules.slides.slides_categories.update',compact('title','routeLink','DB_table'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table = m_slides_categories::find($id);
        $DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->published = $request->published;
		$DB_table->width = $request->width;
		$DB_table->height = $request->height;
		$DB_table->height_small = $request->height_small;
		$DB_table->width_small = $request->width_small;

        try
        {
            if(!$DB_table->save()){
                $error = 'Update failed!';            
            }
        return redirect()->back()->with('notification', 'Update completed!');

        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Update failed!');
        }
    }

    public function getDelete($id)
    {
    	# code...
        $DB_table= m_slides_categories::find($id);
         try
        {
            if(!$DB_table->delete()){
                $error = 'Delete failed!';            }
            return redirect()->back()->with('notification', 'Delete completed!');

        }
        catch (\Exception $e) 
        {
             return redirect()->back()->with('alert', 'Delete failed! This record has been using');
        }

    }
}
