$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.goBack' , function() {
    let id = $('.goBack').attr('id');
    let urlString = '/getsiblings/'+id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: function(result){
            let innerHtml = '';
            if(result[0].parent_id !== 1){
                innerHtml += '<button id="'+result[0].parent_id+'" class="btn-primary goBack">Go back</button><br>';
            }
            for(let i = 0; i < result.length; i++){
                innerHtml +=
                    '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick ajaxDoubleClick">'+result[i].category_name+'</button>';
            }
            document.getElementById('categories').innerHTML = innerHtml;
            //TODO: Query and list files on going back
        }}).fail(function(result){
        console.log('fail');
        console.log(result);
    });
});
$(document).on('dblclick', '.ajaxDoubleClick' , function(e){
    e.preventDefault();
    let urlString = '/setsubcat/'+this.id;
    let elementId = this.id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: function(result){
            let innerHtml = '<button id="'+elementId+'" class="btn-primary goBack">Go back</button><br>';
            for(let i = 0; i < result.length; i++){
                innerHtml +=
                    '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick ajaxDoubleClick">'+result[i].category_name+'</button>';
            }
            document.getElementById('secret').value = elementId;
            document.getElementById('categories').innerHTML = innerHtml;
        }})
});
$(document).on('click', '.ajaxSingleClick' , function singleClick(e){
    e.preventDefault();
    let urlString = '/getmsg/'+this.id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: function(result){
            let innerHtml = '';
            for(let i = 0; i < result.length; i++){
                innerHtml +=
                    '<button type="button" class="btn btn-warning btn-lg" id="'+result[i].id+'">'+result[i].file_name+'</button>';
            }
            document.getElementById('files').innerHTML = innerHtml;
        }})
});
