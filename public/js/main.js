let getCurrentPath = () => {
  let arr = window.location.pathname.split("/");
  return arr[arr.length - 1];
};

let setActiveLink = () => {
  let element = document.querySelector(`.${getCurrentPath()}`);
  element.classList.add("active-link");
};

setActiveLink();

function getSearchResults(query, filter) {
  const XHR = new XMLHttpRequest();
  XHR.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      console.log(this.responseText);
      // <div class="card">
      //   <div class="card-body">
      //     <h5 class="card-title">Special title treatment</h5>
      //     <p class="card-text">
      //       With supporting text below as a natural lead-in to additional
      //       content.
      //     </p>
      //     <a href="#" class="btn btn-primary">
      //       Go somewhere
      //     </a>
      //   </div>
      //   <div class="card-footer text-muted">2 days ago</div>
      // </div>;
    }
  };
  XHR.open(
    "GET",
    `http://localhost/DAMS/admin/search?q=${query}&filter=${filter}`,
    true
  );
  XHR.send();
}

let searchForm = document.getElementById("searchForm");
searchForm.addEventListener("submit", (e) => {
  e.preventDefault();
  let query = document.getElementById("query");
  let filter = document.getElementById("filter");
  getSearchResults(query.value, filter.value);
});
