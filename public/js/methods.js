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
    console.log(result);
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

    jQuery.ajax({
        url: '/get-files-by-category/',
        data : {
            'id' : parentId
        },
        method: 'post',
        success: getFiles
    });
}

function getFiles(result){
    console.log(result);
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
