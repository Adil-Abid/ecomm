@extends('admin/layout')
@section('page_title','Color')
@section('color_select','active')
@section('container')
{{session('message')}}
<h1>Color</h1>
<a href="{{url('admin/color/manage_color')}}">
<button type="button" class="btn btn-success m-t-10" >Add Color</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Color</th>
                                                <!-- <th>Category Image</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->color}}</td>
                                                <!-- <td><img src="../../images/{{$list->cimage}}" width="100px" height="100px" alt="img"></td> -->
                                                <td>
                                                <a href="{{url('admin/color/manage_color')}}/{{$list->id}}"><button type="button" class="btn btn-success btn-sm" >Edit</button></a>
                                                <a href="{{url('admin/color/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger btn-sm" >Delete</button></a>

                                                @if($list->status==1)
                                                <a href="{{url('admin/color/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-outline-success btn-sm" >Active</button></a>
                                            @elseif($list->status==0)
                                                <a href="{{url('admin/color/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-outline-danger btn-sm" >Deactive</button></a>
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
