let getCurrentPath = () => {
  let arr = window.location.pathname.split("/");
  return arr[arr.length - 1];
};

let setActiveLink = () => {
  let element = document.querySelector(`.${getCurrentPath()}`);
  element.classList.add("active-link");
};

setActiveLink();
