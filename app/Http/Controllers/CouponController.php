<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function index()
    {
        //
        $result['data']=Coupon::all();
        return view('admin.coupon',$result);
    }
    public function manage_coupon(Request $req,$id=''){
        // return $req->post();
        if($id>0){
            $arr = Coupon::where(['id'=>$id])->get();
            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['id']=$arr['0']->id;
        }else{
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['id']=0;

        }
        return view('admin/manage_coupon',$result);
    }
    public function manage_coupon_process(Request $req){
        // $name = $req->file('cimage')->getClientOriginalName();
        // return $name; exit;

        $req->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code,'.$req->post('id'),
            'value'=>'required',
        ]);
        if($req->post('id')>0){
        $model = Coupon::find($req->post('id'));
        $msg ="Record Edit Successfully";
    }else{
        $model = new Coupon();
        $msg = "Record insert Successfully";
    }
        $model->title=$req->post('title');
        $model->code=$req->post('code');
        $model->value=$req->post('value');
        $model->status=1;
        // $model->cimage=$req->file ('cimage')->getClientOriginalName();
              //move uploaded file
        // $req->cimage->move(public_path('images'),$model->cimage);
        $model->save();
        $req->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }
    public function delete(Request $req, $id){
        // echo $id;
        $model=Coupon::find($id);
        $model->delete();
        $req->session()->flash('message','Coupon Delete successfully.');
        return redirect('admin/coupon');

    }
    public function status(Request $req, $status, $id){
        // echo $id;
        // echo $status; exit;

        $model=Coupon::find($id);
        $model->status=$status;
        $model->save();
        $req->session()->flash('message','Coupon status update successfully.');
        return redirect('admin/coupon');
    }
}
