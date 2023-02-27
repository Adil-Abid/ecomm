@extends('admin/layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')

@if($id>0)
{{$image_required=''}}
@else
{{$image_required='required'}}
@endif

<h1>Manage Product</h1>
<a href="{{url('admin/product')}}">
<button type="button" class="btn btn-success m-t-10" >Back</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('product.manage_product_process') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name</label>
                                                <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">Slug</label>
                                                <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('slug')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" value="" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                                                @error('image')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id" class="control-label mb-1">Category</label>
                                                <select id="category_id" value="{{$category_id}}" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false"required>
                                                <option value="" > Select Category</option>
                                                @foreach($category as $list)
                                                   @if($category_id==$list->id)
                                                      <option selected value="{{$list->id}}" >
                                                @else
                                                      <option value="{{$list->id}}" >
                                                @endif
                                                {{$list->category_name}}</option>
                                                @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Brand</label>
                                                <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="model" class="control-label mb-1">Model</label>
                                                <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1">Short Description</label>
                                                <textarea id="short_desc" value="{{$short_desc}}" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>{{$short_desc}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" class="control-label mb-1">Description</label>
                                                <textarea id="desc" value="{{$desc}}" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>{{$desc}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords" class="control-label mb-1">Keywords</label>
                                                <textarea id="keywords" value="{{$keywords}}" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>{{$keywords}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                                <textarea id="technical_specification" value="{{$technical_specification}}" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>{{$technical_specification}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="uses" class="control-label mb-1">Uses</label>
                                                <textarea id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>{{$uses}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="warranty" class="control-label mb-1">Warranty</label>
                                                <textarea id="warranty" value="{{$warranty}}" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>{{$warranty}}</textarea>
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
