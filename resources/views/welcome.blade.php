@extends('layouts.app')
@section('content')
<div class="position-relative">
    <section class="bg-info position-absolute" style=" right: 0;">
        <button class="btn btn-success open-button" onclick="openForm()">New category</button>
        <div class="form-popup" id="myForm">
            <form action="{{'/create-category'}}" method="POST" enctype="multipart/form-data" class="form-container">
                @csrf
                <h1>New category</h1>

                <label for="email"><b>Name</b></label>
                <input type="text" placeholder="Name" name="category_name" required>
                <input id="secret2" type="hidden" name="parent_id" value="1">

                <button type="submit" class="btn">Create</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
            </form>
        </div>
        <button class="btn btn-danger deleteCategory">Delete category</button>
    </section>
    <section  class="bg-light" style="height: 49vh;" id="categories">
        @foreach($categories as $category)
            <button class="btn-lg btn-secondary ajaxSingleClick" id="{{$category->id}}">{{$category->category_name}}</button>
        @endforeach
    </section>
    <section class="bg-info position-absolute" style=" right: 0;">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{'/file-upload'}}" method="POST" enctype="multipart/form-data">
            @csrf
        <fieldset>
            <button class="btn btn-success">Upload file</button>
            <input id="secret" type="hidden" name="category_id" value="1">
            <input type="file" name="file" class="form-control d-inline">
        </fieldset>
        </form>
        <button class="btn btn-warning sendDownload">Download file</button>
        <button class="btn btn-danger sendDelete">Delete file</button>
    </section>
    <section class="bg-info" style="height: 50vh;" id="files">
        @foreach($files as $file)
            <button class="btn-lg btn-warning fileSelect" id="{{$file->id}}">{{$file->file_name}}</button>
        @endforeach
    </section>
</div>
@endsection

