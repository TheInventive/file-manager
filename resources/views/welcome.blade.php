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
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
            document.getElementById('secret2').value = document.getElementById('secret').value;
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            top: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="position-relative">
    <section class="bg-info position-absolute" style=" right: 0;">
        <button class="btn btn-success open-button" onclick="openForm()">New category</button>
        <div class="form-popup" id="myForm">
            <form action="/new-category" method="POST" enctype="multipart/form-data" class="form-container">
                @csrf
                <h1>New category</h1>

                <label for="email"><b>Name</b></label>
                <input type="text" placeholder="Name" name="category_name" required>
                <input id="secret2" type="hidden" name="parent_id" value="1">

                <button type="submit" class="btn">Create</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
            </form>
        </div>
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
