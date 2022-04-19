<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<div class="d-flex">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <div class="col-10">
        <div class="d-flex mx-3 my-3 position-relative">
            <button class="btn btn-primary upload-btn" data-bs-toggle="modal" data-bs-target="#myModal">Upload</button>
            <form action="#" method="get" class="col-4 ms-5">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute top-50 ms-4  translate-middle text-primary"></i>
                    <input type="text" name="q" id="q" class="form-control rounded-pill ps-5 text-primary">
                </div>

            </form>
            <div class="dropdown position-absolute end-0">
                <button class="rounded-circle px-2 py-1 settings text-primary" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        <div class="card mx-3 px-3">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date uploaded</th>
                        <th scope="col">Date last modified</th>
                        <th scope="col">Date to expire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>FORM-1</td>
                        <td>OJT-Appplication.docx</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>FORM-1</td>
                        <td>OJT-Appplication.docx</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>FORM-1</td>
                        <td>OJT-Appplication.docx</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>FORM-1</td>
                        <td>OJT-Appplication.docx</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>FORM-1</td>
                        <td>OJT-Appplication.docx</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                        <td>04/07/2022 13:00:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload a document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo URLROOT?>/archive/file_upload" method="post" className="form col-3"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="category" class="mb-3">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    <?php foreach($data as $item){ ?>
                                    <option value="<?php echo $item->category?>"><?php echo $item->category?>
                                    </option>
                                    <?php };?>
                                </select>
                            </div>
                            <input class="form-control text-primary mb-3" type="file" id="files" name="files[]"
                                multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/includes/footer.php" ; ?>