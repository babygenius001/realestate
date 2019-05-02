<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_news_images;
use App\m_news_images_groups;
class CNewsImages extends Controller
{
    //
     public $title = 'Images';
	public $routelink = 'news/images';

    public function getList($items = 5)
    {
    	$title = $this->title;
    	$routeLink = $this->routelink;
        // $DB_table = m_news_brands::all();
    	$DB_table = m_news_images::paginate($items);

    	return view('admin.modules.news.images.images',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
    	# code...

    	$DB_table = m_news_images_groups::get();
    	$title = 'New image record';
    	$routeLink = $this->routelink;
    	return view('admin.modules.news.images.insert',compact('title','routeLink','DB_table'));
    }

    public function getDetail($id)
    {
        $DB_table_group_img = m_news_images_groups::get();
        $DB_table = m_news_images::find($id);
    	$title = $this->title;
        $routeLink = $this->routelink;
        return view('admin.modules.news.images.detail',compact('title','routeLink','DB_table','DB_table_group_img'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,['name' => 'required|unique:m_news_images|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_news_images();
        $DB_table->name = $request->name;
        $DB_table->news_images_groups_id = $request->news_images_groups_id;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;
		if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/news/images',$file_name);
            $DB_table->image = 'images/news/images/'.$file_name;
        }
        else {
            $DB_table->image ='images/noimages.jpg';
        }
        
        if(!$DB_table->save()){
        	return redirect()->back()->with('alert', 'Insert failed!');	
        }

        $notification = 'Created';
        return redirect()->back()->with('notification', 'Record has created!');

    }


    public function getUpdate($id)
    {
        $DB_table_group_img = m_news_images_groups::get();
        $DB_table = m_news_images::find($id);
        $title = 'images update';
        $routeLink = $this->routelink;
        return view('admin.modules.news.images.update',compact('title','routeLink','DB_table','DB_table_group_img'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table =  m_news_images::find($id);
        $DB_table->name = $request->name;
        $DB_table->news_images_groups_id = $request->news_images_groups_id;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

		if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/news/images',$file_name);
            $DB_table->image = 'images/news/images/'.$file_name;
        }
        
        if(!$DB_table->save()){
        	return redirect()->back()->with('alert', 'Update failed!');	
        }
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
    	# code...
        $DB_table=  m_news_images::find($id);
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
