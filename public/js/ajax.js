$(document).on('click', '.goBack' , function() {
    let id = $('.goBack').attr('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let urlString = '/getsiblings/'+id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        data: {
            name: jQuery('#name').val(),
            type: jQuery('#type').val(),
            price: jQuery('#price').val()
        },
        success: function(result){
            let innerHtml = '';
            if(result[0].parent_id !== 1){
                console.log(result[0].parent_id);
                innerHtml += '<button id="'+result[0].parent_id+'" class="btn-primary goBack">Go back</button><br>';
            }
            for(let i = 0; i < result.length; i++){
                innerHtml +=
                    '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick ajaxDoubleClick">'+result[i].category_name+'</button>';
            }
            document.getElementById('categories').innerHTML = innerHtml;
        }}).fail(function(result){
        console.log('fail');
        console.log(result);
    });
});
$(document).on('dblclick', '.ajaxDoubleClick' , function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let urlString = '/setsubcat/'+this.id;
    let elementId = this.id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        data: {
            name: jQuery('#name').val(),
            type: jQuery('#type').val(),
            price: jQuery('#price').val()
        },
        success: function(result){
            let innerHtml = '<button id="'+elementId+'" class="btn-primary goBack">Go back</button><br>';
            for(let i = 0; i < result.length; i++){
                innerHtml +=
                    '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick ajaxDoubleClick">'+result[i].category_name+'</button>';
            }
            document.getElementById('categories').innerHTML = innerHtml;
        }})
});
$(document).on('click', '.ajaxSingleClick' , function singleClick(e){
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
            let innerHtml = '';
            for(let i = 0; i < result.length; i++){
                innerHtml +=
                    '<button type="button" class="btn btn-warning btn-lg" id="'+result[i].id+'">'+result[i].file_name+'</button>';
            }
            document.getElementById('files').innerHTML = innerHtml;
        }})
});
