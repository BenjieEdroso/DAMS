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
        $(".data_viewer").removeClass("show");
        $(".data_viewer").addClass("hidden");
        let some = $(".data_viewer").children();
        some.each(function(index) {
            some[index].remove();
        });
    }
});

$(".seeResults").on("click", function(e) {
    if (e.target.innerText == "See all results") {
        see_all_results($(this));
        $(".data_viewer").addClass("show");
        e.target.innerText = "Close";
    } else if (e.target.innerText == "Close") {
        $(".data_viewer").removeClass("show");
        $(".data_viewer").addClass("hidden");
        let some = $(".data_viewer").children();
        some.each(function(index) {
            some[index].remove();
        });
        e.target.innerText = "See all results";
    }
});

function see_all_results(a) {
    $.ajax({
        url: "http://localhost/DAMS/documents/see_all_results",
        method: "POST",
        success: function(response) {
            let element = a[0];
            let data_viewer = document.querySelector(".data_viewer");
            let data = JSON.parse(response);
            data_viewer.innerHTML = "";

            if (data.length == 0) {
                $(".data_viewer").addClass("hidden");
            } else if (data.length > 0) {
                data.forEach((data) => {
                    const a = document.createElement("a");
                    a.setAttribute("href", "#");
                    a.setAttribute(
                        "class",
                        "searchItems list-group-item list-group-item-action"
                    );
                    a.innerHTML = data.file_name;
                    data_viewer.appendChild(a);
                });
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
            console.log(data);
            div.innerHTML = "";

            if (data.length == 0) {
                $(".data_viewer").addClass("hidden");
                let some = $(".data_viewer").children();
                some.each(function(index) {
                    some[index].remove();
                });
            } else if (data.length > 0) {
                data.forEach((data) => {
                    const a = document.createElement("a");
                    a.setAttribute("href", "#");
                    a.setAttribute(
                        "class",
                        "searchItems list-group-item list-group-item-action"
                    );
                    a.innerHTML = data.file_name;
                    div.appendChild(a);
                });
                $(".data_viewer").removeClass("hidden");
                $(".data_viewer").addClass("show");
            }
        },
    });
}

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