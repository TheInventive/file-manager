let elementId;
let nameOfFile;
let nameOfCategory;

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.goBack' , function(e) {
    e.preventDefault();
    let id = $('.goBack').attr('id');
    jQuery.ajax({
        url: '/get-files-by-sibling/',
        data :{
            'id' : id
        },
        method: 'post',
        success: getSiblings});
});

$(document).on('click', '.ajaxSingleClick' , function(e){
    let element = document.getElementById('secret');
    if (element == null) return;
    e.preventDefault();
    //Setting globals
    nameOfCategory = this.innerText;
    elementId = this.id;
    //Setting secret
    document.getElementById('secret').value = this.id;
    jQuery.ajax({
        url: '/get-sub-categories/',
        data : {
          'id' : elementId
        },
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
