export * from "./animations/index.js";
export * from "./search/index.js";
import {documentsTableFormat} from "./documentsTable/documentsTable.js";

$("#directories").on("change", function(){
    $(".currentDirForm").trigger("submit");
})






$("#sort").on("change", function(e) {
    let sort_method = this.value;
    $.ajax({
        url: "http://localhost/DAMS/archive/sort",
        method: "POST",
        data: { sort: sort_method },
        success: function(response) {
            let data = JSON.parse(response);
            $(".list-item").each(function(i) {
                $(this).text(
                    `${data[i].file_id}  ${data[i].file_name} ${data[i].file_type} ${data[i].file_tmpName} ${data[i].file_error} ${data[i].file_size} ${data[i].file_date}`
                );
            });
        },
    });
});
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

if (urlParams.has("file_name")) {
    $(".myModal").show();
}


$(".newItemList").hide();
$(".createNewFolder").hide();

$(".new").on("click", function(){
    $(".newItemList").show();
});

$(".createNewFolderBtn").on("click", function(){
    $(".newItemList").hide();
    $(".createNewFolder").show();
});

$(document).on("mouseup", function(e){
    if($(e.target).closest(".createNewFolder").length === 0){
        $(".createNewFolder").hide();
    };

    if($(e.target).closest(".newItemList").length === 0){
        $(".newItemList").hide();
    };
})

$(".newFolderCancelBtn").on("click", function(){
    $(".createNewFolder").hide();
})

// $(".fileUploadBtn").on("click", function(){
//    $("#file").trigger("click")


// //     let file = document.querySelector("#file");
// //    console.log(file.files[0].name);
   
// })

// if($("#file").trigger("click")){
    
// }

//if click choose file
$(".fileInput").trigger("click")
//check if file is empty

let file = document.querySelector("#file");


$(".fileInput").on("change", function(){
    if(file.files.length !== 0){
        $(".fileUploadForm").trigger("submit");
    }
});



let folder = document.querySelector("#folder");
$(".folderInput").on("change", function(){
    if($(this)[0].files !== 0){

        $("#directory").val($(this)[0].files[0].webkitRelativePath);
        $(".folderUploadForm").trigger("submit");
    }
});



