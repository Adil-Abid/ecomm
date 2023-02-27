@extends('admin/layout')
@section('page_title','Manage Category')
@section('category_select','active')
@section('container')

<h1>Manage Category</h1>
<a href="{{url('admin/category')}}">
<button type="button" class="btn btn-success m-t-10" >Back</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('category.manage_category_process') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                                <label for="category_name" class="control-label mb-1">Category Name</label>
                                                <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                @error('category_name')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                                <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <!-- <label for="cimage" class="control-label mb-1">Category Image</label>
                                                <input type="file" class="form-control" value="" name="cimage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                                @error('category_slug')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div>
                                                <button id="" type="submit" class="btn btn-lg btn-info btn-block">
                                                Submit
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
