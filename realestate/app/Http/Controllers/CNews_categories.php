<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_news_categories;
class CNews_categories extends Controller
{
    
	public $title = 'News Categories';
	public $routelink = 'news/categories';

    public function getList($items = 5)
    {
    	$title = $this->title;
    	$routeLink = $this->routelink;
        // $DB_table = m_news_brands::all();
    	$DB_table = m_news_categories::paginate($items);

    	return view('admin.modules.news.categories.categories',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
    	# code...
    	$DB_table =  m_news_categories::select('id','name')->where('parent_id','=','---')->get();
    	$title = 'New News categories record';
    	$routeLink = $this->routelink;
    	return view('admin.modules.news.categories.insert',compact('title','routeLink','DB_table'));
    }

    public function getDetail($id)
    {
        $DB_treee =  m_news_categories::select('id','name')->where('parent_id','=','---')->get();
        $DB_table = m_news_categories::find($id);
    	$title = $this->title;
        $routeLink = $this->routelink;
        return view('admin.modules.news.categories.detail',compact('title','routeLink','DB_table','DB_treee'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_news_categories();
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->image = $request->image;
        $DB_table->icon = $request->icon;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;
        $DB_table->parent_id = $request->parent_id;
        $DB_table->show_in_homepage = $request->show_in_homepage;
        $DB_table->action_id = 1;
        $DB_table->seo_title = $request->seo_title;
        $DB_table->seo_keyword = $request->seo_keyword;
        $DB_table->seo_description = $request->seo_description;

        if($request->hasFile('icon')) {
            $file = $request->file('icon');
            $file_extension = $file->getClientOriginalExtension('icon');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded icon file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('icon');
            $file_name_icon = getNameImage($file_originalName);
            $file->move('images/news/categories/icons',$file_name_icon);
            $DB_table->icon = 'images/news/categories/icons/'.$file_name_icon;
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
            $file->move('images/news/categories',$file_name);
            $DB_table->image = 'images/news/categories/'.$file_name;
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
    	$DB_treee =  m_news_categories::select('id','name')->where('parent_id','=','---')->get();
        $DB_table = m_news_categories::find($id);
        $title = 'Categories update';
        $routeLink = $this->routelink;
        return view('admin.modules.news.categories.update',compact('title','routeLink','DB_table','DB_treee'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table =  m_news_categories::find($id);
        // $DB_table->image = $request->image;
        // $DB_table->icon = $request->icon;
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        // $DB_table->image = $request->image;
        // $DB_table->icon = $request->icon;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;
        $DB_table->parent_id = $request->parent_id;
        $DB_table->show_in_homepage = $request->show_in_homepage;
        $DB_table->seo_title = $request->seo_title;
        $DB_table->seo_keyword = $request->seo_keyword;
        $DB_table->seo_description = $request->seo_description;

        if($request->hasFile('icon')) {
            $file = $request->file('icon');
            $file_extension = $file->getClientOriginalExtension('icon');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded icon file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('icon');
            $file_name_icon = getNameImage($file_originalName);
            $file->move('images/news/categories/icons',$file_name_icon);
            $DB_table->icon = 'images/news/categories/icons/'.$file_name_icon;
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/news/categories',$file_name);
            $DB_table->image = 'images/news/categories/'.$file_name;
        }

        if(!$DB_table->save()){
        	return redirect()->back()->with('alert', 'Update failed!');	
        }
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
    	# code...
        $DB_table=  m_news_categories::find($id);
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
