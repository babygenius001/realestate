<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_news;
use App\m_news_categories;
use App\m_news_images_groups;
use Auth;

class CNews extends Controller
{
    //
    public $title = 'News';
	public $routelink = 'news/news';

    public function getList($items = 5)
    {
    	$DB_table = m_news_categories::select('id','name')->where('parent_id','!=','---')->get();
    	$conditional = ["[]",null,""," "];
    	if(in_array($DB_table , $conditional)){
        	return redirect()->route('NRGCNewCategories_getList')->with('alert', 'Please create a new category!');
    	}
    	$title = $this->title;
    	$routeLink = $this->routelink;
        // $DB_table = m_news_brands::all();
    	$DB_table = m_news::paginate($items);

    	return view('admin.modules.news.news.news',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
    	$DB_table = m_news_categories::select('id','name')->where('parent_id','!=','---')->get();
    	$conditional = ["[]",null,""," "];
    	if(in_array($DB_table , $conditional)){
        	return redirect()->route('NRGCNewCategories_getList')->with('alert', 'Please create a new category!');
    	}
    	$DB_table_img_group =  m_news_images_groups::select('id','name')->get();
    	$title = 'New News record';
    	$routeLink = $this->routelink;
    	return view('admin.modules.news.news.insert',compact('title','routeLink','DB_table','DB_table_img_group'));
    }

    public function getDetail($id)
    {
    	$DB_table_categories = m_news_categories::find($id);
        $DB_table = m_news::select('id','summary','created_at','title')->where('news_categories_id','=',$id)->orderBy('created_at','desc')->paginate(5);
    	$title = $this->title;
        $routeLink = $this->routelink;
        return view('admin.modules.news.news.detail',compact('title','routeLink','DB_table','DB_table_categories'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,[
    	 	'name' => 'required|unique:m_news|min:3|max:100',
    	 	'title'  => 'required|min:3',

    	],[
            'name.required' => 'The name is empty!',
            'title.required' => 'The title is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'title.min' => 'The title has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_news();
		$DB_table->name =  $request->name;
		$DB_table->alias =  $request->alias;
		$DB_table->title =  $request->title;
		$DB_table->summary =  $request->summary;
		$DB_table->content =  $request->content;
		$DB_table->description_short =  $request->description_short;
		$DB_table->description =  $request->description;
		$DB_table->tag =  $request->tag;
		$DB_table->news_categories_id =  $request->news_categories_id;
		$DB_table->creator =  $request->creator;
		$DB_table->source_website =  $request->source_website;
		$DB_table->show_in_homepage =  $request->show_in_homepage;
		$DB_table->hit = 0;
		$DB_table->published =  $request->published;
		$DB_table->ordering =  $request->ordering;
		$DB_table->keyword =  $request->keyword;
		$DB_table->seo_title =  $request->seo_title;
		$DB_table->seo_keyword =  $request->seo_keyword;
		$DB_table->seo_description =  $request->seo_description;
		$DB_table->is_new =  $request->is_new;
		$DB_table->is_hot =  $request->is_hot;
		$DB_table->new_related =  $request->new_related;
		$DB_table->action_id = Auth::id();

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
            $file->move('images/news/news/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/news/news/' . $yearNow . '/' . $dateNow . '/' .$file_name;
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
    	$DB_table_categories = m_news_categories::select('id','name')->where('parent_id','!=','---')->get();
    	$conditional = ["[]",null,""," "];
    	if(in_array($DB_table_categories , $conditional)){
        	return redirect()->route('NRGCNewCategories_getList')->with('alert', 'Please create a new category!');
    	}
    	$DB_table_img_group =  m_news_images_groups::select('id','name')->get();
        $DB_table = m_news::find($id);
        $title = 'news update';
        $routeLink = $this->routelink;
        return view('admin.modules.news.news.update',compact('title','routeLink','DB_table','DB_table_categories','DB_table_img_group'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table =  m_news::find($id);
        // $DB_table->image = $request->image;
        // $DB_table->icon = $request->icon;
        $DB_table->name =  $request->name;
		$DB_table->alias =  $request->alias;
		$DB_table->title =  $request->title;
		$DB_table->summary =  $request->summary;
		$DB_table->content =  $request->content;
		$DB_table->description_short =  $request->description_short;
		$DB_table->description =  $request->description;
		$DB_table->tag =  $request->tag;
		$DB_table->news_categories_id =  $request->news_categories_id;
		$DB_table->creator =  $request->creator;
		$DB_table->source_website =  $request->source_website;
		$DB_table->show_in_homepage =  $request->show_in_homepage;
		$DB_table->published =  $request->published;
		$DB_table->ordering =  $request->ordering;
		$DB_table->keyword =  $request->keyword;
		$DB_table->seo_title =  $request->seo_title;
		$DB_table->seo_keyword =  $request->seo_keyword;
		$DB_table->seo_description =  $request->seo_description;
		$DB_table->is_new =  $request->is_new;
		$DB_table->is_hot =  $request->is_hot;
		$DB_table->new_related =  $request->new_related;

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
            $file->move('images/news/news/' . $yearNow . '/' . $dateNow,$file_name);
            $DB_table->image = 'images/news/news/' . $yearNow . '/' . $dateNow . '/' .$file_name;
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
        $DB_table=  m_news::find($id);
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
