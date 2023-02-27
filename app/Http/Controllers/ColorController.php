<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data']=Color::all();
        return view('admin.color',$result);
    }
    public function manage_color(Request $req,$id=''){
        // return $req->post();
        if($id>0){
            $arr = Color::where(['id'=>$id])->get();
            $result['color']=$arr['0']->color;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }else{
            $result['color']='';
            $result['status']='';
            $result['id']=0;

        }
        return view('admin/manage_color',$result);
    }
    public function manage_color_process(Request $req){
        // $name = $req->file('cimage')->getClientOriginalName();
        // return $name; exit;

        $req->validate([
            'color'=>'required|unique:colors,color,'.$req->post('id'),
        ]);
        if($req->post('id')>0){
        $model = Color::find($req->post('id'));
        $msg ="Record Edit Successfully";
    }else{
        $model = new Color();
        $msg = "Record insert Successfully";
    }
        $model->color=$req->post('color');
        $model->status=1;
        // $model->cimage=$req->file ('cimage')->getClientOriginalName();
              //move uploaded file
        // $req->cimage->move(public_path('images'),$model->cimage);
        $model->save();
        $req->session()->flash('message',$msg);
        return redirect('admin/color');
    }
    public function delete(Request $req, $id){
        // echo $id;
        $model=Color::find($id);
        $model->delete();
        $req->session()->flash('message','Color Delete successfully.');
        return redirect('admin/color');

    }
    public function status(Request $req, $status, $id){
        // echo $id;
        // echo $status; exit;

        $model=Color::find($id);
        $model->status=$status;
        $model->save();
        $req->session()->flash('message','Color status update successfully.');
        return redirect('admin/color');
    }
}
