@extends('admin.master')


@section('body')
    <div class="container-fluid">
        <h3 class="text-success">{{Session::get('message')}}</h3>
        <h1>Brand</h1>
        {{Form::open(['route'=>'new-brand','enctype'=>'multipart/form-data'])}}
            <div class="form-group">
                {{Form::label('Brand Name')}}
                {{Form::text('brand_name','',['class'=>'form-control'])}}
                <span style="color:red">{{$errors->has('brand_name') ? $errors->first('brand_name'):''}}</span>
            </div>
            <div class="form-group">
                {{Form::label('Brand Description')}}
                {{Form::textarea('brand_description','',['class'=>'form-control','rows'=>'4'])}}
                <span style="color:red">{{$errors->has('brand_description') ? $errors->first('brand_description'):''}}</span>
            </div>
            <div class="form-group">
                {{Form::label('Brand Image')}}
                {{Form::file('brand_image',['class'=>'form-control-file'])}}
                <span style="color:red">{{$errors->has('brand_image') ? $errors->first('brand_image'):''}}</span>
            </div>
            <div class="form-group">
                {{Form::label('Publication Status')}}
                <div class="radio">
                    {{Form::radio('status','1')}} Published
                    {{Form::radio('status','0')}} Unpublished
                </div>
                <span style="color:red">{{$errors->has('status') ? $errors->first('status'):''}}</span>
            </div>
            <div class="form-group">
                {{Form::submit('Add Brand',['class'=>'btn btn-primary'])}}
            </div>
        {{Form::close()}}
    </div>
@endsection