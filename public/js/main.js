let currentUrl = () => {
  let arr = window.location.pathname.split("/");
  return arr[arr.length - 1];
};

let validateUrl = () => {
  if (currentUrl() === "archiving") {
    let sidebarEl = document.querySelector(".sidebar-archiving");
    sidebarEl.classList.add("active-link");
  }
};

validateUrl();
