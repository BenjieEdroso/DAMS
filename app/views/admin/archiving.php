<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<div class="d-flex">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <div class="col-10">
        <div class="d-flex mx-3 my-3 position-relative">
            <button class="btn btn-primary upload-btn btn-sm " data-bs-toggle="modal" data-bs-target="#myModal"><i
                    class="bi bi-upload pe-2"></i>Upload</button>
            <button class="btn btn-secondary mx-3 btn-sm upload-btn " data-bs-toggle="modal"
                data-bs-target="#addCategoryModal"><i class="bi bi-plus-circle pe-2"></i>Add
                Category</button>
            <button class="btn btn-secondary upload-btn btn-sm  " data-bs-toggle="modal"
                data-bs-target="#deleteCategoryModal"><i class="bi bi-trash3-fill pe-2"></i>Delete a
                Category</button>
            <form action="#" method="get" class="col-4 ms-5">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute top-50 ms-4  translate-middle text-primary"></i>
                    <input type="text" name="q" id="q" class="form-control rounded-pill ps-5 text-primary">
                </div>
            </form>
            <!-- <div class="dropdown position-absolute end-0">
                <button class="rounded-circle px-2 py-1 settings text-primary" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Set </a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div> -->
            <button class="btn btn-secondary position-absolute end-0 btn-sm" data-bs-toggle="modal"
                data-bs-target="#settingsModal"><i class="bi bi-gear pe-2"></i>Settings</button>

        </div>
        <div class="card mx-3 px-3" style="height: calc(100vh - 90px); overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date uploaded</th>
                        <th scope="col">Date last modified</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["files"] as $file) {?>
                    <tr>
                        <th scope="row"><?php  echo $file->file_id?></th>
                        <td><?php echo $file->file_category?></td>
                        <td><?php echo $file->file_name?></td>
                        <td><?php echo $file->file_date_uploaded?></td>
                        <td><?php echo $file->file_date_modified?></td>
                        <td><a href="#"><i class="action-icon bi bi-pencil-square"></i></a>
                            <a href="#"><i class="action-icon bi bi-folder-symlink"></i></a>
                            <a href="#"><i class="action-icon bi bi-trash text-danger"></i></a>
                        </td>
                    </tr>
                    <?php }?>
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
                                    <?php foreach($data["category"] as $item){ ?>
                                    <option value="<?php echo $item->category?>"><?php echo $item->category?>
                                    </option>
                                    <?php };?>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="expiration" class="mb-3">Expiration:</label>
                                <input type="number" name="expiration" id="expiration" class="form-control"
                                    value="<?php echo $data["expiration"][0]->expiration_id;?>">
                            </div> -->
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
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo URLROOT?>/archive/add_category" method="post" className="form col-3"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="category" class="mb-3">Category:</label>
                            </div>
                            <input class="form-control text-primary mb-3" type="text" id="category" name="category">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete a category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo URLROOT?>/archive/delete_category" method="post" className="form col-3"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="category" class="mb-3">Category:</label>
                            </div>
                            <select name="category" id="category" class="form-control">
                                <?php foreach($data["category"] as $item){ ?>
                                <option value="<?php echo $item->category?>"><?php echo $item->category?>
                                </option>
                                <?php };?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo URLROOT?>/archive/settings" method="post">
                            <h6>Expiration</h6>
                            <div class="d-flex justify-content-between">
                                <div class="col-5">
                                    <input type="number" name="expirationCount" id="expirationCount"
                                        class="form-control" placeholder="# of "
                                        <?php if(!empty($data["settings"][0]->expiration_count)) { ?>
                                        value="<?php echo $data["settings"][0]->expiration_count?>" <?php }?>>
                                </div>
                                <div class="col-6">
                                    <select name="expiration" id="expiration" class="form-control col-6">
                                        <option value="7" <?php if($data["settings"][0]->expiration=== "7") {?> selected
                                            <?php } ?>>
                                            Week/s</option>
                                        <option value="30" <?php if($data["settings"][0]->expiration === "30") {?>
                                            selected <?php } ?>>Month/s</option>
                                        <option value="365" <?php if($data["settings"][0]->expiration === "365") {?>
                                            selected <?php } ?>>Year/s</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h6>Archive Path</h6>
                            <div>
                                <input type="text" name="archivePath" id="archivePath" class="form-control"
                                    placeholder="Ex. d:/archive/"
                                    <?php if(!empty($data["settings"][0]->archive_path)) { ?>
                                    value="<?php echo $data["settings"][0]->archive_path?>" <?php }?>>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Save Settings" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once APPROOT . "/views/includes/footer.php" ; ?>