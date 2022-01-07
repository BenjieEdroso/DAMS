import { asyncRequest, insertDataToElement } from "./functions.js";
import { documentsRow } from "./template.js";

let response;
asyncRequest("GET", "http://localhost/DAMS/uploads/getFileInfo").then(
  (responseData) => {
    for (let i = 0; i < responseData.length; i++) {
      document
        .querySelector(".table-body")
        .insertAdjacentHTML("beforeend", documentsRow());
    }

    let colName = Object.keys(responseData[0]);
    for (var i = 0; i < colName.length; i++) {
      insertDataToElement(colName[i], responseData);
    }
    response = responseData;
  }
);

export default response;
