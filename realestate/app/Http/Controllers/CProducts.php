<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_products;
use App\m_products_types;
use App\m_products_brands;

class CProducts extends Controller
{
    public $title = 'Products';
    public $routeLink = 'products/products';

    public function getList($items = 5)
    {
        // $DB_table = m_products::all();
        $title = $this->title;
        $routeLink = $this->routeLink;
        $DB_table = m_products::paginate($items);

        return view('admin.modules.products.products.products',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
        $title = $this->title;
        $routeLink = $this->routeLink;
        $craw_products_types = $this->craw_products_types();
        $craw_products_brands = $this->craw_products_brands();
        return view('admin.modules.products.products.insert',compact('title','routeLink','craw_products_types','craw_products_brands'));
    }

    public function getDetail($id)
    {
        $DB_table = m_products::find($id);
        $title = $DB_table->name;
        $routeLink = $this->routeLink;
        return view('admin.modules.products.products.detail',compact('title','routeLink','DB_table'));
    }
    public function postInsert(Request $request)
    {
        # code...
        $this->validate($request,['name' => 'required|unique:m_products|min:2'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 2 characters!'
        ]);

        $DB_table = new m_products();

		$DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->height = $request->height;
		$DB_table->width = $request->width;
		$DB_table->depth = $request->depth;
		$DB_table->weight = $request->weight;
		$DB_table->new_related = $request->new_related;
		$DB_table->is_new = $request->is_new;
		$DB_table->is_hot = $request->is_hot;
		$DB_table->tag = $request->tag;
		$DB_table->keyword = $request->keyword;
		$DB_table->products_types_id = $request->products_types_id;
		$DB_table->products_brands_id = $request->products_brands_id;
		$DB_table->customers_id = $request->customers_id;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->published = $request->published;
		$DB_table->seo_title = $request->seo_title;
		$DB_table->seo_keyword = $request->seo_keyword;
		$DB_table->seo_description = $request->seo_description;
		$DB_table->checking = '0';
		$DB_table->action_id = '1';

		if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/products',$file_name);
            $DB_table->image = 'images/products/products/'.$file_name;
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
        $craw_products_types = $this->craw_products_types();
        $craw_products_brands = $this->craw_products_brands();
        $DB_table = m_products::find($id);
        $title = $this->title . 'update';
        $routeLink = $this->routeLink;
        return view('admin.modules.products.products.update',compact('title','routeLink','DB_table','craw_products_types','craw_products_brands'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!'
        ]);

        $DB_table=  m_products::find($id);
		$DB_table->name = $request->name;
		$DB_table->alias = $request->alias;
		$DB_table->height = $request->height;
		$DB_table->width = $request->width;
		$DB_table->depth = $request->depth;
		$DB_table->weight = $request->weight;
		$DB_table->new_related = $request->new_related;
		$DB_table->is_new = $request->is_new;
		$DB_table->is_hot = $request->is_hot;
		$DB_table->tag = $request->tag;
		$DB_table->keyword = $request->keyword;
		$DB_table->products_types_id = $request->products_types_id;
		$DB_table->products_brands_id = $request->products_brands_id;
		$DB_table->customers_id = $request->customers_id;
		$DB_table->description_short = $request->description_short;
		$DB_table->description = $request->description;
		$DB_table->ordering = $request->ordering;
		$DB_table->published = $request->published;
		$DB_table->seo_title = $request->seo_title;
		$DB_table->seo_keyword = $request->seo_keyword;
		$DB_table->seo_description = $request->seo_description;
		$DB_table->checking = '0';
		$DB_table->action_id = '1';

		if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/products/products',$file_name);
            $DB_table->image = 'images/products/products/'.$file_name;
        }
        
        $DB_table->save();
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
        # code...
        $DB_table=  m_products::find($id);
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


    public function craw_products_types()
    {
        return $cate = m_products_types::select('id','name')->get();
    }
    public function craw_products_brands()
    {
        return $cate = m_products_brands::select('id','name')->get();
    }
}
