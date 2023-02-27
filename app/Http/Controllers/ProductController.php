<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data']=Product::all();
        return view('admin.product',$result);
    }
    public function manage_product(Request $req,$id=''){
        // return $req->post();
        if($id>0){
            $arr = Product::where(['id'=>$id])->get();
            $result['category_id']=$arr['0']->category_id;
            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['slug']=$arr['0']->slug;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['technical_specification']=$arr['0']->technical_specification;
            $result['uses']=$arr['0']->uses;
            $result['warranty']=$arr['0']->warranty;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_id']='';
            $result['name']='';
            $result['image']='';
            $result['slug']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['warranty']='';
            $result['status']='';
            $result['id']=0;
        }
        $result['category'] = DB::table('categories')->where(['status'=>1])->get();
        // echo "<pre>"; print_r($result); exit;
        return view('admin/manage_product',$result);
    }
    public function manage_product_process(Request $req){
        // $name = $req->file('cimage')->getClientOriginalName();
        // return $name; exit;

        $req->validate([
            'name'=>'required',
            'image'=>'required|mimes,jpeg,jpg,png',
            'slug'=>'required|unique:products,slug,'.$req->post('id'),
        ]);
        if($req->post('id')>0){
        $model = Product::find($req->post('id'));
        $msg ="Record Edit Successfully";
    }else{
        $model = new Product();
        $msg = "Record insert Successfully";
    }
        if($req->hasFile('image')){
            $image =$req->file('image');
            $ext = $image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        $model->category_id=$req->post('category_id');
        $model->name=$req->post('name');
        $model->slug=$req->post('slug');
        $model->brand=$req->post('brand');
        $model->model=$req->post('model');
        $model->short_desc=$req->post('short_desc');
        $model->desc=$req->post('desc');
        $model->keywords=$req->post('keywords');
        $model->technical_specification=$req->post('technical_specification');
        $model->uses=$req->post('uses');
        $model->warranty=$req->post('warranty');
        $model->status=1;
        // $model->cimage=$req->file ('cimage')->getClientOriginalName();
              //move uploaded file
        // $req->cimage->move(public_path('images'),$model->cimage);
        $model->save();
        $req->session()->flash('message',$msg);
        return redirect('admin/product');
    }
    public function delete(Request $req, $id){
        // echo $id;
        $model=Product::find($id);
        $model->delete();
        $req->session()->flash('message','Product Delete successfully.');
        return redirect('admin/product');

    }
    public function status(Request $req, $status, $id){
        // echo $id;
        // echo $status; exit;

        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $req->session()->flash('message','Product status update successfully.');
        return redirect('admin/product');
    }
}
