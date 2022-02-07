<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<section  style="background-color: red; height: 49vh;" id="categories">
    <button onclick="showFiles()" ondblclick="doubleClick()" class="btn-lg btn-secondary">Kategória 1</button>
    <i class="fa-solid fa-arrow-left"></i>
    <button ondblclick="doubleClick()" class="btn-lg btn-secondary">Kategória 1</button>
</section>
<section style="background-color: blue; height: 50vh;" id="files">
    <button type="button" class="btn-light btn-lg">Item 1</button>
    <button type="button" class="btn-light btn-lg">Item 1</button>
    <button type="button" class="btn-light btn-lg">Item 1</button>
</section>
</body>
<script src="{{asset('js/subcategory.js')}}"></script>
</html>
