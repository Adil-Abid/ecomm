@extends('admin/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')
{{session('message')}}
<h1>Product</h1>
<a href="{{url('admin/product/manage_product')}}">
<button type="button" class="btn btn-success m-t-10" >Add Product</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <!-- <th>Category Image</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->slug}}</td>
                                                <!-- <td><img src="../../images/{{$list->cimage}}" width="100px" height="100px" alt="img"></td> -->
                                                <td>
                                                <a href="{{url('admin/product/manage_product')}}/{{$list->id}}"><button type="button" class="btn btn-success btn-sm" >Edit</button></a>
                                                <a href="{{url('admin/product/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger btn-sm" >Delete</button></a>

                                                @if($list->status==1)
                                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-outline-success btn-sm" >Active</button></a>
                                            @elseif($list->status==0)
                                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-outline-danger btn-sm" >Deactive</button></a>
                                            @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
@endsection
