<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_customers_addresses;
use App\m_customers;

class CAddresses extends Controller
{
    //
    public $title = 'Addresses';
    public $routeLink = 'customers/addresses';

     public function getList($items = 5)
    {
        $title = $this->title;
        $routeLink = $this->routeLink;
        // $DB_table = m_addresses_brands::all();
    	$DB_table = m_customers_addresses::orderBy('customers_id', 'desc')->orderBy('ordering', 'desc')->paginate($items);
    	return view('admin.modules.customers.addresses.addresses',compact('title','routeLink','DB_table'));
    }

    public function getInsert($id)
    {
    	# code...
        $DB_table = m_customers::select('id','name')->find($id);
        $title = $this->title;
        $routeLink = $this->routeLink;
    	return view('admin.modules.customers.addresses.insert',compact('title','routeLink','DB_table'));
    }

    public function getDetail($id)
    {
        $DB_table = m_customers_addresses::where('customers_id', '=', $id)->get();
        $title = $this->title;
        $routeLink = $this->routeLink;
        $id_obj = $id;
        return view('admin.modules.customers.addresses.detail',compact('title','routeLink','DB_table','id_obj'));
    }

    public function postInsert(Request $request)
    {
    	# code...
    	 $this->validate($request,['Address' => 'min:10'],[
            'Address.min' => 'Address has at least 3 characters!',
        ]);

    	$DB_table = new m_customers_addresses();
        $DB_table->customers_id = $request->customers_id;
        $DB_table->address = $request->address;
        $DB_table->published = $request->published;
        $DB_table->ordering = $request->ordering;

        if(!$DB_table->save()) {
            return redirect()->back()->with('alert', 'Unsuccessfully!');
        }
        $notification = 'Created';
        return redirect()->back()->with('notification', 'Address has been added!');

    }


    public function getUpdate($id)
    {
        $DB_table = m_customers_addresses::find($id);
        $title = $this->title . "update";
        $routeLink = 'customers/addresses';
        return view('admin.modules.customers.addresses.update',compact('title','routeLink','DB_table'));
    }
    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,['address' => 'required|min:3'],[
            'address.required' => 'The name is empty!',
            'address.min' => 'The name has at least 3 characters!',
        ]);

        $DB_table =  m_customers_addresses::find($id);
        
        $DB_table->address = $request->address;
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
        $DB_table=  m_customers_addresses::find($id);
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
