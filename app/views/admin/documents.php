<?php
session_start();
require_once APPROOT . "/views/includes/header.php";

if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
    redirect("users/login");
}

?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>
<?php require_once APPROOT . "/views/includes/admin-main.php"; ?>

    <div class="container ">
        <table class="table bg-white rounded">
            <thead>
            <tr>
                <th scope="col">File Id</th>
                <th scope="col">File Name</th>
                <th scope="col">File Type</th>
                <th scope="col">File Temporary Name</th>
                <th scope="col">File Error</th>
                <th scope="col">File Size</th>
                <th scope="col">File Upload Date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody class="table-body" id="table">
            <?php foreach($data as $document){  ?>
                <?php
                if(strlen($document->file_name) > 27){
                    $file_name = substr($document->file_name,0,27);
                    $file_name = $file_name . "...";
                }else{
                    $file_name = $document->file_name;
                }
                ?>
                <tr>
                    <td><?php echo $document->file_id?></td>
                    <td><?php echo $file_name?></td>
                    <td><?php echo $document->file_type?></td>
                    <td><?php echo $document->file_tmpName?></td>
                    <td><?php echo $document->file_error?></td>
                    <td><?php echo $document->file_size?></td>
                    <td><?php echo $document->file_date?></td>
                    <td class="file_actions">
                        <a href="http://localhost/DAMS/documents/download?fileName=<?php echo $document->file_name?>" class="download"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                        <a href="#" class="modal-btn-open edit" id="<?php echo $document->file_id; ?>" data-toggle="modal" data-target="#myModal"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#"><i class="bi bi-folder-symlink-fill"></i></a>
                        <a href="#"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            <?php };?>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">File name</h5>

                        </div>
                        <div class="modal-body" >
                            <form action="" method="post" id="editForm">

                                <input type="hidden" class="form-control" id="fileNameOld" name="file_name_old" value="<?php echo $document->file_name?>">

                                <div class="form-group">
                                    <input type="text" class="form-control" id="fileName" name="file_name" value="">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary mt-3 float-end" value="Save Changes"/>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="alert edit-msg edit-alert col-6  alert-success " role="alert"
                                 style=" padding: 5px 10px; margin: 0 10px; ">

                            </div>
                            <button type="button" class="btn btn-secondary modal-btn-close" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            </tbody>
        </table>
    </div>

<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>