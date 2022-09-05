const CURRENT_URL = window.location.href;
const ARCHIVE = "http://localhost/DAMS/admin/archive";

if (CURRENT_URL !== ARCHIVE) {
  $("#searchField").on("keyup", function () {
    $.ajax("http://localhost/DAMS/archive/search", {
      method: "POST",
      data: {
        query: $("#searchField").val(),
      },
      success: function (res) {
        const NO_RESULT = 0;
        let results = Array.from(document.querySelector(".results").children);
        if (res.length > NO_RESULT) {
          results.forEach((el) => {
            el.remove();
          });
          $(".results").append(res);
        } else {
          results.forEach((el) => {
            el.remove();
          });
        }
      },
    });
  });
}

$(".register-form").on("submit", function (e) {
  e.preventDefault();
  let formData = $(this).serializeArray();
  $.ajax("http://localhost/DAMS/users/register", {
    method: "POST",
    data: formData,
    success: function (file) {
      let htmlString = `<div class="alert alert-success alert-msg">${file}</div>`;
      $(".register-form").append(htmlString);
    },
  });
});

$(window).on("load", function () {
  $("#searchField").val("");
});

if (window.location.href === "http://localhost/dams/admin/dashboard") {
  function fadeOutAlert() {
    setTimeout(() => {
      let alertElement = document.getElementById("upload_msg");
      alertElement.remove();
    }, 1500);
  }

  fadeOutAlert();
}

$("#searchArchive").on("keyup", function () {
  let tbodyChildren = Array.from(document.querySelector(".tbody").children);
  tbodyChildren.forEach((el) => {
    el.remove();
  });
  let keyword = $("#searchField").val();

  $.ajax("http://localhost/DAMS/admin/search", {
    method: "GET",
    data: {
      keyword: keyword,
    },
    success: function (response) {
      let jsonResponse = JSON.parse(response);
      jsonResponse.forEach((item) => {
        let jsx = `
                     <tr class="result-row">
                     <th scope="row">${item.file_id}</th>
                     <td style="width: 275.13px;">${item.file_name}</td>
                     <td>${item.file_type}</td>
                     <td>${item.file_tmp_name}</td>
                     <td>${item.file_error}</td>
                     <td>${item.file_size}</td>
                     <td>${item.file_date_uploaded}</td>
                     <td>${item.file_date_modified}</td>
                     <td  style="width: 120px;" >
                     <a href="http://localhost/dams/admin/edit_file?file_id=${item.file_id}" class="btn btn-sm btn-primary">Edit</a>
                     
                     <a href="http://localhost/dams/admin/delete_file?file_id=${item.file_id}&file_name=${item.file_name}" class="btn btn-sm btn-danger">Delete</a></td>
                     
                     </tr>`;
        $(".tbody").append(jsx);
      });
    },
  });
});

$("#keyword").on("keyup", function () {
  let initialElements = Array.from($("#tbody")[0].children);
  initialElements.forEach((el) => {
    el.remove();
  });
  let keyword = $("#keyword").val();
  $.ajax("http://localhost/DAMS/admin/search_user", {
    method: "GET",
    data: {
      keyword: keyword,
    },
    success: function (response) {
      let tbody = Array.from($("#tbody")[0].children);
      tbody.forEach((el) => {
        el.remove();
      });
      $("#tbody").append(response);
    },
  });
});
