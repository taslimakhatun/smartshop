@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <h3 class="text-success">{{Session::get('message')}}</h3>
        <h1>category</h1>
        <form action="{{route('new-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="categoryname">Category Name</label>
                <input type="text" class="form-control" name="cat_name" id="categoryname">

            </div>
            <div class="form-group">
                <label for="categorydesc">Category Description</label>
                <textarea class="form-control" name="cat_desc" id="categorydesc"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="cat_image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="status">Publication Status</label>
                <div class="radio">
                    <input type="radio" name="status" value="1"> Published
                    <input type="radio" name="status" value="0"> Unpublished
                </div>
            </div>
            <input type="submit" name="btn" class="btn btn-primary">
        </form>
    </div>
@endsection