//get data from controller (async)
export function asyncRequest(method, url) {
  const myPromise = new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.responseType = "json";
    xhr.onreadystatechange = function () {
      if (xhr.status === 200 && xhr.readyState === 4) {
        resolve(xhr.response);
      }
    };

    xhr.send();
  });

  return myPromise;
}

export function insertDataToElement(className, responseData) {
  document.querySelectorAll(`.${className}`).forEach(function (value, index) {
    let dataText = responseData[index][className];
    if (dataText.length > 27) {
      dataText = dataText.substring(0, 27) + "...";
    }
    value.innerHTML = dataText;
  });
}
