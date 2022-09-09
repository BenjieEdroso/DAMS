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
      $(".tbody").append(response);
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
      $("#tbody").append(response);
    },
  });
});

$("#backBtn").on("click", function () {
  window.history.back();
});

$(".deleteBtn").on("click", function () {
  $(".myModal").removeAttr("hidden");
});

function clearHistory() {
  const LOGIN_URL = "http://localhost/dams/users/login";
  let currentURL = window.location.href;
  if (LOGIN_URL === currentURL) {
    browser.history.deleteAll();
  }
}

clearHistory();
