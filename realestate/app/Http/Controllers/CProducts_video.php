<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_products_videos;

class CProducts_video extends Controller
{
    //
	public $title = 'Videos';
	public $routeLink = 'products/videos';

    public function getList($items = 5)
    {
        // $DB_table = m_products_videos::all();
        $title = $this->title;
        $routeLink = $this->routeLink;
    	$DB_table = m_products_videos::paginate($items);
    	return view('admin.modules.products.videos.videos',compact('title','routeLink','DB_table'));
    }

    public function getDetail($id)
    {

        $title = $this->title;
        $routeLink = $this->routeLink;
        $DB_table = m_products_videos::find($id);
        $craw_products_categories = $DB_table->m_products_categories;
        $title = $DB_table->name;
        return view('admin.modules.products.videos.detail',compact('title','routeLink','DB_table'));
        
    }

    public function getInsert()
    {
    	# code...
    	
        $title = 'New' . $this->title . 'record';
        $routeLink = $this->routeLink;
    	return view('admin.modules.products.videos.insert',compact('title','routeLink'));
    }

    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,['name' => 'required|unique:m_products_videos|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_products_videos();
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->products_categories_id = $request->products_categories_id;
        $DB_table->image = $request->image;
        $DB_table->icon = $request->icon;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

        if($request->hasFile('icon')) {
            $file = $request->file('icon');
            $file_extension = $file->getClientOriginalExtension('icon');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded icon file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('icon');
            $file_name_icon = getNameImage($file_originalName);
            $file->move('images/products/videos/icons',$file_name_icon);
            $DB_table->icon = 'images/products/videos/icons/'.$file_name_icon;
        }
        else {
            $DB_table->icon ='images/noimages.jpg';
            
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/videos',$file_name);
            $DB_table->image = 'images/products/videos/'.$file_name;
        }
        else {
            $DB_table->image ='images/noimages.jpg';
        }
        $DB_table->save();

        $notification = 'Created';
        return redirect()->back()->with('notification', 'Record has created!');

    }


    public function getUpdate($id)
    {
        $title = $this->title . 'update';
        $routeLink = $this->routeLink;
        $DB_table = m_products_videos::find($id);
        $routeLink = 'products/videos';
        return view('admin.modules.products.videos.update',compact('title','routeLink','DB_table'));

    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table=  m_products_videos::find($id);
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->products_categories_id = $request->products_categories_id;
        // $DB_table->image = $request->image;
        // $DB_table->icon = $request->icon;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

        if($request->hasFile('icon')) {
            $file = $request->file('icon');
            $file_extension = $file->getClientOriginalExtension('icon');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded icon file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('icon');
            $file_name_icon = getNameImage($file_originalName);
            $file->move('images/products/videos/icons',$file_name_icon);
            $DB_table->icon = 'images/products/videos/icons/'.$file_name_icon;
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/videos',$file_name);
            $DB_table->image = 'images/products/videos/'.$file_name;
        }

        $DB_table->save();
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
        # code...
        $DB_table=  m_products_videos::find($id);
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
