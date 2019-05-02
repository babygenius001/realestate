<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\m_customers;
use App\m_customers_addresses;

class CCustomers extends Controller
{
    //
    public function getLogin()
    {
        return view('modules.account.login');
        //return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {

        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        
        if (!Auth::guard('m_customers')->attempt($arr)) {
            return redirect()->back();
        }
        return redirect()->route('NRGHome');
    }

    public $title = 'Customers';
    public $routeLink = 'customers/customers';

    public function getRegister()
    {
        return view('modules.account.register');
    }

    public function postRegister(Request $request)
    {

    	# code...
        $rules = [
            'name'=>'required|min:2',
            'email'=>'required|unique:m_customers|email',
            'password'=>'required|min:8|required_with:confirmed|same:confirmed',
            'tel'=>'required|min:8',
            'date_of_birth' => 'required',
            'confirmed' => 'required|min:8'
        ];

        $messages = [
            'name.required' => 'The name is required',
            'name.min' => 'Name: enter at least 3 characters',
            'email.required' => 'The email is required',
            'email.unique' => 'This email already exists',
            'email.email' => 'Email address not in the correct format',
            'password.required' => 'Password is required',
            'password.min' => 'Password: enter at least 8 characters',
            'tel.min' => 'Tel: enter at least 8 characters',
            'tel.required' => 'The email is required',
            'date_of_birth.required' => 'The email is required',
            'confirmed.required' => 'The email is required',
            'confirmed.min' => 'Confirmed: enter at least 8 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $DB_table = new m_customers();
        $DB_table->name = $request->name;
        $DB_table->email = $request->email;
        $DB_table->password = bcrypt($request->password);
        $DB_table->tel = $request->tel;
        $DB_table->description = $request->description;
        $DB_table->date_of_birth = $request->date_of_birth;
        $DB_table->gender = $request->gender;
        $DB_table->image = "images/Crystal_personal.png";

        if(!$DB_table->save()){
            return redirect()->back()->with('alert', 'Unsuccessfully!');
        }

        $notification = 'Created';
        return redirect()->back()->with('notification', 'Successfully!');
    }

    public function getlogout()
    {
        Auth::logout();
        Auth::guard('m_customers')->logout();
        return redirect()->route('NRGLogin');
    }

    public function getList($items = 5)
    {
        // $DB_table = m_customers::all();
        $title = $this->title;
        $routeLink = $this->routeLink;
        $DB_table = m_customers::paginate($items);

        return view('admin.modules.customers.customers.customers',compact('title','routeLink','DB_table'));
    }

    public function getInsert()
    {
        $title = $this->title;
        $routeLink = $this->routeLink;
        return view('admin.modules.customers.customers.insert',compact('title','routeLink'));
    }

    public function getDetail($id)
    {
        $DB_table = m_customers::find($id);
        $title = $DB_table->name;
        $routeLink = $this->routeLink;




        return view('admin.modules.customers.customers.detail',compact('title','routeLink','DB_table'));
    }

    public function getUpdate($id)
    {
        $DB_table = m_customers::find($id);
        $title = $this->title . 'update';
        $routeLink = $this->routeLink;
        return view('admin.modules.customers.customers.update',compact('title','routeLink','DB_table'));
    }
    public function postUpdate(Request $request,$id)
    {
        $rules = [
            'name'=>'required|min:2',
            'tel'=>'required|min:8',
            'date_of_birth' => 'required',
        ];

        $messages = [
            'name.required' => 'The name is required',
            'name.min' => 'Name: enter at least 3 characters',
            'tel.min' => 'Tel: enter at least 8 characters',
            'tel.required' => 'The email is required',
            'date_of_birth.required' => 'The email is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $DB_table=  m_customers::find($id);
        $DB_table->name = $request->name;
        $DB_table->tel = $request->tel;
        $DB_table->description = $request->description;
        $DB_table->date_of_birth = $request->date_of_birth;
        $DB_table->gender = $request->gender;
        $DB_table->published = $request->published;


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension('image');
            if(!imageChecker($file_extension)) {
                return redirect()->back()->with('alert', 'Uploaded image file is not a valid image. Only JPG, PNG and GIF files are allowed!');
            }
            $file_originalName = $file->getClientOriginalName('image');
            $file_name = getNameImage($file_originalName);
            $file->move('images/customers/customers',$file_name);
            $DB_table->image = 'images/customers/customers/'.$file_name;
        }
        
        $DB_table->save();
        return redirect()->back()->with('notification', 'Update completed!');
    }

    public function getBanned($id)
    {
        # code...
        $DB_table=  m_customers::find($id);
        $DB_table->banned = ($DB_table->banned == 0) ? 1 : 0;
        if(!$DB_table->save()) {
            return redirect()->back()->with('alert', 'Uncomplete!');
        }
        return redirect()->back()->with('notification', 'Completed!');
    }


  
}
