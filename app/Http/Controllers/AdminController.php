<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index(Request $request)
    {
        //
        if($request->session()->has('Admin_login')){
            return redirect('admin/dashboard');
        }
        else{
            $request->session()->flash('error','access denied');
        return view('admin.login');

        }
        return view('admin.login');
    }
    public function auth(Request $req)
    {
        //
        // return $req->post();
        $email = $req->post('email');
        $password = $req->post('password');
        $result = Admin::where(['email'=>$email,'password'=>$password])->get();
        // echo"<pre>";
        // print_r($result);
        if(isset($result['0']->id)){
            $req->session()->put('Admin_login',true);
            $req->session()->put('Admin_Id',$result['0']->id);
            return redirect('admin/dashboard');

        }
        else{
            $req->session()->flash('error','please enter valid details');
            return redirect('admin');
        }
    }
    public function dashboard()
    {
        //
        return view('admin.dashboard');
    }
    public function category()
    {
        //
        return view('admin.category');
    }

    // password hash //
    //  public function updatepass()
    //  {
    //      $r = Admin::find(1);
    //      $r->password=Hash::make('1234');
    //      $r->save();
    //  }
}
