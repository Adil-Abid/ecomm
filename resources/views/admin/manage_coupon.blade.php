@extends('admin/layout')
@section('page_title','Manage Coupon')
@section('coupon_select','active')
@section('container')

<h1>Manage Coupon</h1>
<a href="{{url('admin/coupon')}}">
<button type="button" class="btn btn-success m-t-10" >Back</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('coupon.manage_coupon_process') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                                <label for="title" class="control-label mb-1">Title</label>
                                                <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                @error('title')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <!-- <label for="cimage" class="control-label mb-1">Category Image</label>
                                                <input type="file" class="form-control" value="" name="cimage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                                @error('code')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="value" class="control-label mb-1">Value</label>
                                                <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <!-- <label for="cimage" class="control-label mb-1">Category Image</label>
                                                <input type="file" class="form-control" value="" name="cimage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                                @error('value')
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
