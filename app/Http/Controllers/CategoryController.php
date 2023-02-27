<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data']=Category::all();
        return view('admin.category',$result);
    }
    public function manage_category(Request $req,$id=''){
        // return $req->post();
        if($id>0){
            $arr = Category::where(['id'=>$id])->get();
            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']=0;

        }
        return view('admin/manage_category',$result);
    }
    public function manage_category_process(Request $req){
        // $name = $req->file('cimage')->getClientOriginalName();
        // return $name; exit;

        $req->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$req->post('id'),
        ]);
        if($req->post('id')>0){
        $model = Category::find($req->post('id'));
        $msg ="Record Edit Successfully";
    }else{
        $model = new Category();
        $msg = "Record insert Successfully";
    }
        $model->category_name=$req->post('category_name');
        $model->category_slug=$req->post('category_slug');
        $model->status=1;
        // $model->cimage=$req->file ('cimage')->getClientOriginalName();
              //move uploaded file
        // $req->cimage->move(public_path('images'),$model->cimage);
        $model->save();
        $req->session()->flash('message',$msg);
        return redirect('admin/category');
    }
    public function delete(Request $req, $id){
        // echo $id;
        $model=Category::find($id);
        $model->delete();
        $req->session()->flash('message','Category Delete successfully.');
        return redirect('admin/category');

    }
    public function status(Request $req, $status, $id){
        // echo $id;
        // echo $status; exit;

        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $req->session()->flash('message','Category status update successfully.');
        return redirect('admin/category');
    }
}
