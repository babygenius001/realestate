<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_news_images_groups;
use App\m_news_images;

class CNewsGroupImage extends Controller
{
    //
    public $title = 'Groups Images';
	public $routelink = 'news/images_groups';

    public function getList($items = 5)
    {
    	$title = $this->title;
    	$routeLink = $this->routelink;
        // $DB_table = m_news_brands::all();
    	$DB_table = m_news_images_groups::paginate($items);

    	return view('admin.modules.news.images_groups.images_groups',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
    	# code...
    	$title = 'New group image record';
    	$routeLink = $this->routelink;
    	return view('admin.modules.news.images_groups.insert',compact('title','routeLink'));
    }

    public function getDetail($id)
    {
        $DB_table_images =  m_news_images::select('id','name','image')->where('news_images_groups_id','=',$id)->get();
        $DB_table = m_news_images_groups::find($id);
    	$title = $this->title;
        $routeLink = $this->routelink;
        return view('admin.modules.news.images_groups.detail',compact('title','routeLink','DB_table','DB_table_images'));
    }
    public function getLink($id)
    {
        $title = m_news_images_groups::find($id)->name;
        $DB_table =  m_news_images::select('id','name','image')->where('news_images_groups_id','=',$id)->get();
        return view('admin.modules.news.images_groups.link',compact('title','DB_table'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,['name' => 'required|unique:m_news_images_groups|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_news_images_groups();
        $DB_table->name = $request->name;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

        
        if(!$DB_table->save()){
        	return redirect()->back()->with('alert', 'Insert failed!');	
        }

        $notification = 'Created';
        return redirect()->back()->with('notification', 'Record has created!');

    }


    public function getUpdate($id)
    {
        $DB_table = m_news_images_groups::find($id);
        $title = 'images_groups update';
        $routeLink = $this->routelink;
        return view('admin.modules.news.images_groups.update',compact('title','routeLink','DB_table'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table =  m_news_images_groups::find($id);
        $DB_table->name = $request->name;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

        
        if(!$DB_table->save()){
        	return redirect()->back()->with('alert', 'Update failed!');	
        }
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
    	# code...
        $DB_table =  m_news_images_groups::find($id);
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
