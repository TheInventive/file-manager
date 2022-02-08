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
    <script>
        jQuery(document).ready(function(){
            jQuery('.ajaxSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let urlString = '/getmsg/'+this.id;
                jQuery.ajax({
                    url: urlString,
                    method: 'post',
                    data: {
                        name: jQuery('#name').val(),
                        type: jQuery('#type').val(),
                        price: jQuery('#price').val()
                    },
                    success: function(result){
                        console.log(result);
                        console.log(result.toString())
                        let innerHtml = '';
                        for(let i = 0; i < result.length; i++){
                            innerHtml +=
                                '<button type="button" class="btn-light btn-lg">'+result[i].file_name+'</button>';
                        }
                        document.getElementById('files').innerHTML = innerHtml;
                    }})
            });
        });
    </script>
</head>
<body>
<section  style="background-color: red; height: 49vh;" id="categories">
    @foreach($categories as $category)
    <button class="btn-lg btn-secondary ajaxSubmit" id="{{$category->id}}">{{$category->category_name}}</button>
    @endforeach
</section>
<section style="background-color: blue; height: 50vh;" id="files">
    <button type="button" class="btn-light btn-lg">Item 1</button>
    <button type="button" class="btn-light btn-lg">Item 1</button>
    <button type="button" class="btn-light btn-lg">Item 1</button>
</section>
</body>
<script src="{{asset('js/subcategory.js')}}"></script>
</html>
