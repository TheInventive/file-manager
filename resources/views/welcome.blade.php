<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="position-relative">
    @csrf
    <section class="bg-info position-absolute" style=" right: 0;">
        <button class="btn btn-success">New category</button>
        <button class="btn btn-danger">Delete category</button>
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
        <form action="/file-upload" method="POST" enctype="multipart/form-data">
            @csrf
        <fieldset>
            <button class="btn btn-success">Upload file</button>
            <input id="secret" type="hidden" name="category_id" value="1">
            <input type="file" name="file" class="form-control d-inline">
        </fieldset>
        </form>
        <button class="btn btn-warning">Download file</button>
        <button class="btn btn-danger">Delete file</button>
    </section>
    <section class="bg-info" style="height: 50vh;" id="files">
        @foreach($files as $file)
            <button class="btn-lg btn-warning fileDownload" id="{{$file->id}}">{{$file->file_name}}</button>
        @endforeach
    </section>
</div>
</body>
<script src="{{asset('js/ajax.js')}}"></script>
</html>
