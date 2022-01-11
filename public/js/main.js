//query sql to dbms return the data
fetch("http://localhost/DAMS/files/getFileInfo").then((response) =>
    response.json()
);
//create a table
//insert those data in the table