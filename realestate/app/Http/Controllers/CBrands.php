<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_products_brands;

class CBrands extends Controller
{
    //

    public function getList($items = 5)
    {
    	$title = 'Brands';
    	$routeLink = 'products/brands';
        // $DB_table = m_products_brands::all();
    	$DB_table = m_products_brands::paginate($items);

    	return view('admin.modules.products.brands.brands',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
    	# code...
    	$title = 'New brand record';
    	$routeLink = 'products/brands';
    	return view('admin.modules.products.brands.insert',compact('title','routeLink'));
    }

    public function getDetail($id)
    {
        $DB_table = m_products_brands::find($id);
        $title = $DB_table->name;
        $routeLink = 'products/brands';
        return view('admin.modules.products.brands.detail',compact('title','routeLink','DB_table'));
    }
    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,['name' => 'required|unique:m_products_brands|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

    	$DB_table = new m_products_brands();
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->abbreviation = $request->abbreviation;
        $DB_table->url = $request->url;
        $DB_table->image = $request->image;
        $DB_table->icon = $request->icon;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->keyword = $request->keyword;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;
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
            $file->move('images/products/brands/icons',$file_name_icon);
            $DB_table->icon = 'images/products/brands/icons/'.$file_name_icon;
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
            $file->move('images/products/brands',$file_name);
            $DB_table->image = 'images/products/brands/'.$file_name;
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
        $DB_table = m_products_brands::find($id);
        $title = 'Brand update';
        $routeLink = 'products/brands';
        return view('admin.modules.products.brands.update',compact('title','routeLink','DB_table'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3|max:100'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!',
            'name.max' => 'The name has at most 3 characters!'
        ]);

        $DB_table=  m_products_brands::find($id);
        $DB_table->name = $request->name;
        $DB_table->alias = $request->alias;
        $DB_table->abbreviation = $request->abbreviation;
        $DB_table->url = $request->url;
        // $DB_table->image = $request->image;
        // $DB_table->icon = $request->icon;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->keyword = $request->keyword;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;
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
            $file->move('images/products/brands/icons',$file_name_icon);
            $DB_table->icon = 'images/products/brands/icons/'.$file_name_icon;
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/brands',$file_name);
            $DB_table->image = 'images/products/brands/'.$file_name;
        }

        $DB_table->save();
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
    	# code...
        $DB_table=  m_products_brands::find($id);
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
