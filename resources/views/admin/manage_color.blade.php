@extends('admin/layout')
@section('page_title','Manage Color')
@section('color_select','active')
@section('container')

<h1>Manage Color</h1>
<a href="{{url('admin/color')}}">
<button type="button" class="btn btn-success m-t-10" >Back</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('color.manage_color_process') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                                <label for="color" class="control-label mb-1">Color</label>
                                                <input id="color" value="{{$color}}" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                @error('color')
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
