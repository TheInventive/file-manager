$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.goBack' , function(e) {
    e.preventDefault();
    let id = $('.goBack').attr('id');
    let urlString = '/getsiblings/'+id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: getSiblings});
});

$(document).on('click', '.ajaxSingleClick' , function(e){
    e.preventDefault();
    let urlString = '/setsubcat/'+this.id;
    elementId = this.id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: getSiblings})
});

function getCategories(result){
    let innerHtml = '<button id="'+elementId+'" class="btn-primary goBack">Go back</button><br>';
    for(let i = 0; i < result.length; i++){
        innerHtml +=
            '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick ajaxDoubleClick">'+result[i].category_name+'</button>';
    }
    document.getElementById('secret').value = elementId;
    document.getElementById('categories').innerHTML = innerHtml;
}

function getSiblings(result){
    let innerHtml = '';
    let parentId;
    if(result[0] !== undefined)
        parentId = result[0].parent_id;
    else
        parentId = elementId;

    if(parentId !== 1){
        innerHtml += '<button id="'+ parentId+'" class="btn-primary goBack">Go back</button><br>';
    }
    for(let i = 0; i < result.length; i++){
        innerHtml +=
            '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick ajaxDoubleClick">'+result[i].category_name+'</button>';
    }
    document.getElementById('categories').innerHTML = innerHtml;

    let urlString = '/getmsg/'+parentId;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: getFiles
    });
}

function getFiles(result){
    let innerHtml = '';
    for(let i = 0; i < result.length; i++){
        innerHtml +=
            '<button type="button" class="btn btn-warning btn-lg" id="'+result[i].id+'">'+result[i].file_name+'</button>';
    }
    document.getElementById('files').innerHTML = innerHtml;
}
