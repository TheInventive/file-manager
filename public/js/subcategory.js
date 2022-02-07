var originalHtml;

function doubleClick(){
    originalHtml = document.getElementById('categories').innerHTML;
    document.getElementById('categories')
        .innerHTML = "<a onclick='goback()' href=\"#\" class=\"previous\">&laquo; Previous</a><br>" +
        "<button type=\"button\" class=\"btn-primary btn-lg\">Sub category 1</button>";
}

function goback(){
    document.getElementById('categories')
        .innerHTML = originalHtml;
}

function showFiles(){
    document.getElementById('files')
        .innerHTML = "<button type=\"button\" class=\"btn-primary btn-lg\">Element for c1</button>";
}
