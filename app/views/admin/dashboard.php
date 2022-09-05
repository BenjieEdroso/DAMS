<?php require_once(APPROOT . "/includes/header.php");?>
<div class="dashboard bg-light">
    <div class="d-flex justify-content-between h-100">
        <?php include_once(APPROOT . "/includes/sidebar.php");?>
        <div class="w-100 p-3">
            <div>
                <div class="d-flex justify-content-between">
                    <h3>Dashboard</h3>
                    <?php include_once(APPROOT . "/includes/logout_button.php");?>
                </div>
                <form action="<?php echo URLROOT?>/archive/upload" method="post" enctype="multipart/form-data"
                    class="mt-3">
                    <input type="file" name="files[]" id="fileInput" multiple>
                    <button type="submit" id="submitButton" class="btn btn-sm btn-secondary">Upload</button>
                </form>

                <?php if(isset($_SESSION["upload_msg"])) {?>
                <div id="upload_msg"
                    class="alert <?php _if($_SESSION["upload_msg"] == "Upload successful", "alert-success ", "alert-danger")?> ">
                    <?php if(!empty($_SESSION["upload_msg"])) { echo $_SESSION["upload_msg"]; } ?>
                </div>
                <?php } unset($_SESSION["upload_msg"]); ?>
            </div>
        </div>
    </div>

</div>

<?php require_once(APPROOT . "/includes/footer.php");?>