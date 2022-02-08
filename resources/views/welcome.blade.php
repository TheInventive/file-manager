<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <example-component></example-component>
@endsection
<section  class="bg-light" style="height: 49vh;" id="categories">
    @foreach($categories as $category)
    <button class="btn-lg btn-secondary ajaxSingleClick ajaxDoubleClick" id="{{$category->id}}">{{$category->category_name}}</button>
    @endforeach
</section>
<section class="bg-info" style="height: 50vh;" id="files">
    <h1>Select category to show files</h1>
</section>
</body>
<script src="{{asset('js/ajax.js')}}"></script>
</html>
