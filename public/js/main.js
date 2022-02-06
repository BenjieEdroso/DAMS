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
//when i click
$("#encryption").on("click", function() {
    if ($(this).val() == "false") {
        $(this).val("true");
    } else {
        $(this).val("false");
    }
});

$("#search-box").on("input", function() {
    let search_string = $(this).val();
    if (search_string.length > 0) {
        $(".data_viewer").show();
        fetch_data(search_string);
    } else if (search_string == 0) {
        $(".data_viewer").hide();
    }
});

function fetch_data(search_string) {
    $.ajax({
        url: "http://localhost/DAMS/documents/find",
        method: "POST",
        data: { query: search_string },
        success: function(response) {
            let div = document.querySelector(".data_viewer");
            div.innerHTML = "";
            let data = JSON.parse(response);
            // if (data.length == 0) {
            //     $(".data_viewer").hide();
            // }

            data.forEach((data) => {
                const a = document.createElement("a");
                a.setAttribute("href", "#");
                a.setAttribute("class", "p-3 searchItems");
                a.innerHTML = data.file_name;
                div.appendChild(a);
            });
        },
    });
}