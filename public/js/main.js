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
        fetch_data(search_string);
    } else if (search_string == 0) {
        $(".data_viewer").hide();
    }
});

$(".seeResults").on("click", function() {
    if (see_all_results()) {
        $(".seeResults").addClass("close");
        $(".seeResults").text("Close");
    }

    if ($(this).hasClass("close")) {
        let data_viewer = document.querySelector(".data_viewer");
        data_viewer.style = "display: none;";
    }
});

function see_all_results() {
    $.ajax({
        url: "http://localhost/DAMS/documents/see_all_results",
        method: "POST",
        success: function(response) {
            let data_viewer = document.querySelector(".data_viewer");
            let data = JSON.parse(response);
            data_viewer.innerHTML = "";
            if (data.length == 0) {
                data_viewer.setAttribute("style", "width: 70%;  visibility: hidden;");
            } else if (data.length > 0) {
                data.forEach((data) => {
                    const a = document.createElement("a");
                    a.setAttribute("href", "#");
                    a.setAttribute("class", "p-3 searchItems");
                    a.innerHTML = data.file_name;
                    data_viewer.appendChild(a);
                });
                data_viewer.setAttribute("style", "width: 70%; visibility: visible;");
            }
        },
    });

    return true;
}

function fetch_data(search_string) {
    $.ajax({
        url: "http://localhost/DAMS/documents/find",
        method: "POST",
        data: { query: search_string },
        success: function(response) {
            let div = document.querySelector(".data_viewer");

            let data = JSON.parse(response);
            div.innerHTML = "";
            if (data.length == 0) {
                div.setAttribute("style", "width: 70%;  visibility: hidden;");
            } else if (data.length > 0) {
                data.forEach((data) => {
                    const a = document.createElement("a");
                    a.setAttribute("href", "#");
                    a.setAttribute("class", "p-3 searchItems");
                    a.innerHTML = data.file_name;
                    div.appendChild(a);
                });
                div.setAttribute("style", "width: 70%; visibility: visible;");
            }
            // if (data.length == 0) {
            //     $(".data_viewer").hide();
            // }
        },
    });
}