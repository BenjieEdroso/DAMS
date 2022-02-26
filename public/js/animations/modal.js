//modals
var editFileModal = function(){
    $(".modal-btn-open").on("click", function() {
        let file_id = $(this).attr("id");
        $.ajax({
            url: "http://localhost/DAMS/documents/select_file",
            method: "post",
            data: { file_id: file_id },
            success: function(data) {
                let file_name = data;
                $("#fileName").val(data);
                $("#fileNameOld").val(file_name);
            },
        });
        $("#myModal").modal("show");
    });
    
    $(".modal-btn-close, .close").on("click", function() {
        $("#myModal").modal("hide");
        location.reload();
    });

    $("#editForm").on("submit", function(e) {
        e.preventDefault();
        let data = $(this).serialize();
    
        $.ajax({
            url: "http://localhost/DAMS/documents/save_edit",
            method: "post",
            data: data,
            success: function(data) {
                $(".edit-msg").html(data);
                $(".edit-alert").fadeIn(1000);
                $(".edit-alert").delay(900).fadeOut(1000);
            },
        });
    });
    
    $(".edit-alert").delay(900).fadeOut(1500);
    
}



export default editFileModal;

