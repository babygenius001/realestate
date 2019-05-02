<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_slides;
use App\m_slides_categories;
use Auth;

class CSlides extends Controller
{
    public $title = 'Slides';
	public $routelink = 'slides/slides';

    public function getList($items = 5)
    {
    	$title = $this->title;
    	$routeLink = $this->routelink;
        // $DB_table = m_slides_brands::all();
    	$DB_table = m_slides::paginate($items);

    	return view('admin.modules.slides.slides.slides',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
    
    	$title = 'New slides record';
    	$routeLink = $this->routelink;
    	$DB_slides_categories = m_slides_categories::select('id','name')->where('published','=','1')->get();
    	return view('admin.modules.slides.slides.insert',compact('title','routeLink','DB_slides_categories'));
    }

    public function getDetail($id)
    {
    	// $DB_table_categories = m_slides::find($id);
     //    $DB_table = m_slides::select('id','summary','created_at','title')->where('slides_categories_id','=',$id)->orderBy('created_at','desc')->paginate(5);
    	// $title = $this->title;
     //    $routeLink = $this->routelink;
     //    return view('admin.modules.slides.slides.detail',compact('title','routeLink','DB_table','DB_table_categories'));
    	$DB_table = m_slides::find($id);
        $title =  $this->title . ' ' . $DB_table->name . ' detail';
        $routeLink = $this->routelink;
        return view('admin.modules.slides.slides.detail',compact('title','routeLink','DB_table'));
    }
    public function getItems($id)
    {
        $tmpVariable = m_slides_categories::find($id);
        $title = "Group " . $this->title . ": ". $tmpVariable->name;
        $routeLink = $this->routelink;
        $DB_table = m_slides::select('id','name','summary','image')->where('slides_categories_id','=',$id)->get();
        return view('admin.modules.slides.slides.items',compact('title','routeLink','DB_table'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,[
    	 	'name' => 'required|unique:m_slides|min:3|max:100',

    	],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_slides();
		$DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->published = $request->published;
		$DB_table->image = $request->image;
		$DB_table->url = $request->url;
		$DB_table->summary = $request->summary;
		$DB_table->slides_categories_id = $request->slides_categories_id;
		$DB_table->action_id = Auth::guard('m_managers')->user()->id;

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
            $file->move('images/slides/slides/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/slides/slides/' . $yearNow . '/' . $dateNow . '/' .$file_name;
        }
        else {
            $DB_table->image ='images/noimages.jpg';
        }
        
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
        $DB_slides_categories = m_slides_categories::select('id','name')->where('published','=','1')->get();
        $DB_table = m_slides::find($id);
        $title = $this->title . ' - ' . $DB_table->name . ' - update';
        $routeLink = $this->routelink;
        return view('admin.modules.slides.slides.update',compact('title','routeLink','DB_table','DB_slides_categories'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table = m_slides::find($id);
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->ordering = $request->ordering;
        $DB_table->published = $request->published;
        // $DB_table->image = $request->image;
        $DB_table->url = $request->url;
        $DB_table->summary = $request->summary;
        $DB_table->slides_categories_id = $request->slides_categories_id;

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
            $file->move('images/slides/slides/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/slides/slides/' . $yearNow . '/' . $dateNow . '/' .$file_name;
        }

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
        $DB_table= m_slides::find($id);
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
