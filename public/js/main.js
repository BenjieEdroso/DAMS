if (window.location.href !== "http://localhost/DAMS/admin/archive") {
  $("#searchField").on("keyup", function () {
    $.ajax("http://localhost/DAMS/archive/search", {
      method: "POST",
      data: {
        query: $("#searchField").val(),
      },
      success: function (res) {
        let documents = Array.from(JSON.parse(res));
        let results = Array.from(document.querySelector(".results").children);

        if (documents.length > 0) {
          results.forEach((el) => {
            el.remove();
          });
          documents.forEach((doc) => {
            let htmlString = `<a href="http://localhost/DAMS/doc/open?id=${doc.file_id}" ">
<div class="card">
                      <div class="card-body">
                          <p class="h6">${doc.file_name}</p>
                          <span class="me-3 text-muted small">${doc.file_date_uploaded}</span>
                          <span class="text-muted small">${doc.file_date_modified}</span>
                      </div>
                  </div>
</a>`;
            $(".results").append(htmlString);
          });
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

// $(".request-btn").on("click", function () {
//   let fileNameId = $(this).attr("data-id");
//   $.ajax("http://localhost/DAMS/doc/request", {
//     method: "GET",
//     data: {
//       id: fileNameId,
//     },
//     success: function (res) {
//       // $(".request-btn").prop("disabled", true);
//       // $(".request-btn").text("Requested");
//       // $(".request-btn").removeClass("btn-primary");
//       // $(".request-btn").addClass("btn-success");
//     },
//   });
// });
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
                     <td>aw</td>
                     </tr>`;
        $(".tbody").append(jsx);
      });
    },
  });
});
