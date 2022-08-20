// $("#searchField").on("keyup", function () {
//   $.ajax("http://localhost/DAMS/archive/search", {
//     method: "POST",
//     data: {
//       query: $("#searchField").val(),
//     },
//     success: function (res) {
//       let documents = Array.from(JSON.parse(res));
//       let results = Array.from(document.querySelector(".results").children);

//       if (documents.length > 0) {
//         results.forEach((el) => {
//           el.remove();
//         });
//         documents.forEach((doc) => {
//           let htmlString = `<div class="card">
//                       <div class="card-body">
//                           <p class="h6">${doc.file_name}</p>
//                           <span class="me-3 text-muted small">${doc.file_date_uploaded}</span>
//                           <span class="text-muted small">${doc.file_date_modified}</span>
//                       </div>
//                   </div>`;
//           $(".results").append(htmlString);
//         });
//       } else {
//         results.forEach((el) => {
//           el.remove();
//         });
//       }
//     },
//   });
// });

$(".register-form").on("submit", function (e) {
  e.preventDefault();
  let formData = $(this).serializeArray();
  $.ajax("http://localhost/DAMS/users/register", {
    method: "POST",
    data: formData,
    success: function (response) {
      let htmlString = `<div class="alert alert-success alert-msg">${response}</div>`;
      $(".register-form").append(htmlString);
    },
  });
});
