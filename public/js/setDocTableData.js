export function setDocTableData() {
    //query sql to dbms return the data
    fetch("http://localhost/DAMS/documents/getFileInfo")
        .then((response) => response.json())
        .then((data) => {
                let table = document.querySelector(".table-body");
                let tableRowTemplate;
                //do this as many times as the database tables row length
                data.forEach((record, ind, arr) => {
                            let smallName = "";
                            if (record.file_name.length > 27) {
                                let tempName = record.file_name.substring(0, 27);
                                smallName = tempName + "...";
                            }
                            tableRowTemplate = `
            <tr>
                <td class="file_id">${record.file_id}</td>
                <td class="file_name">${smallName}</td>
                <td class="file_type">${record.file_type}</td>
                <td class="file_tmpName">${record.file_tmpName}</td>
                <td class="file_error">${record.file_error}</td>
                <td class="file_size">${record.file_size}</td>
                <td class="file_date">${record.file_date} </td>
                <td class="file_actions">
                    <a href="${
                      location.origin +
                      `/DAMS/documents/download?fileName=${record.file_name}`
                    }" class="download"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                    <a href="${
                      location.origin +
                      `/DAMS/documents/edit?fileName=${record.file_name}`
                    }" class="edit"><i class="bi bi-pencil-fill"></i></a>
                    <a href="#"><i class="bi bi-folder-symlink-fill"></i></a>
                    <a href="#"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>`;

        table.insertAdjacentHTML("beforeend", tableRowTemplate);
      });
    });
}