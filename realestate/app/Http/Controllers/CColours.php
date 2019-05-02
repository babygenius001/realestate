<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_products_colours;

class CColours extends Controller
{
    public $title = 'Colours';
    public $routeLink = 'products/colours';

    public function getList($items = 5)
    {
        // $DB_table = m_products_colours::all();
        $title = $this->title;
        $routeLink = $this->routeLink;
        $DB_table = m_products_colours::paginate($items);

        return view('admin.modules.products.colours.colours',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
        $title = $this->title;
        $routeLink = $this->routeLink;
        return view('admin.modules.products.colours.insert',compact('title','routeLink'));
    }

    public function getDetail($id)
    {
        $DB_table = m_products_colours::find($id);
        $title = $DB_table->name;
        $routeLink = $this->routeLink;
        return view('admin.modules.products.colours.detail',compact('title','routeLink','DB_table'));
    }
    public function postInsert(Request $request)
    {
        # code...
         $this->validate($request,['name' => 'required|unique:m_products_colours|min:2'],[
            'name.required' => 'The name is empty!',
            'name.unique' => 'Name has already been taken!',
            'name.min' => 'The name has at least 2 characters!'
        ]);

        $DB_table = new m_products_colours();
        $DB_table->name = $request->name;
        $DB_table->hex_colour = $request->hex_colour;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

        $DB_table->save();

        $notification = 'Created';
        return redirect()->back()->with('notification', 'Record has created!');

    }


    public function getUpdate($id)
    {
        $DB_table = m_products_colours::find($id);
        $title = $this->title . 'update';
        $routeLink = $this->routeLink;
        return view('admin.modules.products.colours.update',compact('title','routeLink','DB_table'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['name' => 'required|min:3'],[
            'name.required' => 'The name is empty!',
            'name.min' => 'The name has at least 3 characters!'
        ]);

        $DB_table=  m_products_colours::find($id);
        $DB_table->name = $request->name;
        $DB_table->hex_colour = $request->hex_colour;
        $DB_table->description_short = $request->description_short;
        $DB_table->description = $request->description;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;
        
        $DB_table->save();
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getDelete($id)
    {
        # code...
        $DB_table=  m_products_colours::find($id);
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
