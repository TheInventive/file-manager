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

let elementId;
let nameOfFile;
let nameOfCategory;

$(document).on('click', '.ajaxSingleClick' , function(e){
    e.preventDefault();
    let urlString = '/setsubcat/'+this.id;
    nameOfCategory = this.innerText;
    document.getElementById('secret').value = this.id;
    elementId = this.id;
    jQuery.ajax({
        url: urlString,
        method: 'post',
        success: getSiblings})
});

$(document).on('click', '.fileSelect' , function(e){
    e.preventDefault();
    nameOfFile = this.innerText;
    elementId = this.id;
});

$(document).on('click', '.sendDownload',function (){
    if(nameOfFile != null){
        window.location="/file-download/"+nameOfFile
        nameOfFile = undefined;
    }
    else
        alert('Click file to select!');
})

$(document).on('click','.sendDelete',function (e){
    e.preventDefault();
    if(nameOfFile != null){
        jQuery.ajax({
            url : '/file-delete',
            method : 'post',
            data : {
                'file_name' : nameOfFile
            },
            success : function (){
                alert('File deleted successfully!');
            },
            fail : function (){
                alert('Something went wrong!');
            }
        })
        nameOfFile = undefined;
    }
    else
        alert('Click file to select!');
});

$(document).on('click','.deleteCategory',function (e){
    e.preventDefault();
    if(nameOfCategory != null){
        jQuery.ajax({
            url : '/delete-category',
            method : 'post',
            data : {
                'category_name' : nameOfCategory
            },
            success : function (){
                alert('Category deleted successfully!');
                location.reload();
            },
            fail : function (){
                alert('Something went wrong!');
            }
        })
        nameOfCategory = undefined;
    }
    else
        alert('Click category to select!');
});

function getCategories(result){
    let innerHtml = '<button id="'+elementId+'" class="btn-primary goBack">Go back</button><br>';
    for(let i = 0; i < result.length; i++){
        innerHtml +=
            '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick">'+result[i].category_name+'</button>';
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

    document.getElementById('secret').value = parentId;
    if(parentId !== 1){
        innerHtml += '<button id="'+ parentId+'" class="btn-primary goBack">Go back</button><br>';
    }
    for(let i = 0; i < result.length; i++){
        innerHtml +=
            '<button id="'+result[i].id+'" type="button" class="btn btn-secondary btn-lg ajaxSingleClick">'+result[i].category_name+'</button>';
    }
    document.getElementById('categories').innerHTML = innerHtml;

    //Get new files
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
            '<button type="button" class="btn btn-warning btn-lg fileSelect" id="'+result[i].id+'">'+result[i].file_name+'</button>';
    }
    document.getElementById('files').innerHTML = innerHtml;
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById('secret2').value = document.getElementById('secret').value;
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
