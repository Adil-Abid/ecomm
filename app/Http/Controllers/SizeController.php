<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data']=size::all();
        return view('admin.size',$result);
    }
    public function manage_size(Request $req,$id=''){
        // return $req->post();
        if($id>0){
            $arr = size::where(['id'=>$id])->get();
            $result['size']=$arr['0']->size;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }else{
            $result['size']='';
            $result['status']='';
            $result['id']=0;

        }
        return view('admin/manage_size',$result);
    }
    public function manage_size_process(Request $req){
        // $name = $req->file('cimage')->getClientOriginalName();
        // return $name; exit;

        $req->validate([
            'size'=>'required|unique:sizes,size,'.$req->post('id'),
        ]);
        if($req->post('id')>0){
        $model = size::find($req->post('id'));
        $msg ="Record Edit Successfully";
    }else{
        $model = new size();
        $msg = "Record insert Successfully";
    }
        $model->size=$req->post('size');
        $model->status=1;
        // $model->cimage=$req->file ('cimage')->getClientOriginalName();
              //move uploaded file
        // $req->cimage->move(public_path('images'),$model->cimage);
        $model->save();
        $req->session()->flash('message',$msg);
        return redirect('admin/size');
    }
    public function delete(Request $req, $id){
        // echo $id;
        $model=size::find($id);
        $model->delete();
        $req->session()->flash('message','Size Delete successfully.');
        return redirect('admin/size');

    }
    public function status(Request $req, $status, $id){
        // echo $id;
        // echo $status; exit;

        $model=size::find($id);
        $model->status=$status;
        $model->save();
        $req->session()->flash('message','Size status update successfully.');
        return redirect('admin/size');
    }
}
