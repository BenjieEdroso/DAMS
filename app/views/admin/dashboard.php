<?php require_once(APPROOT . "/includes/header.php");?>
<div class="p-3">
    <h1>Dashboard</h1>
    <div class="d-flex justify-content-between py-3">
        <div>
            <a href="<?php echo URLROOT?>/admin/requests" class="btn btn-sm btn-primary">Grant requests</a>
            <a href="<?php echo URLROOT?>/admin/archive" class="btn btn-sm btn-primary">Archive</a>
            <a href="<?php echo URLROOT?>/admin/manage_users" class="btn btn-sm btn-primary">User</a>
        </div>
        <a href="<?php echo URLROOT?>/admin/logout" class="btn btn-sm btn-secondary">Logout</a>
    </div>
    <form action="<?php echo URLROOT?>/archive/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" id="fileInput" multiple>
        <button type="submit" id="submitButton" class="btn btn-sm btn-primary">Upload</button>
    </form>

    <?php if(isset($_SESSION["upload_msg"])) {?>
    <div id="upload_msg"
        class="alert <?php _if($_SESSION["upload_msg"] == "Upload successful", "alert-success ", "alert-danger")?> ">
        <?php if(!empty($_SESSION["upload_msg"])) { echo $_SESSION["upload_msg"]; } ?>
    </div>
    <?php } unset($_SESSION["upload_msg"]); ?>
</div>

<?php require_once(APPROOT . "/includes/footer.php");?>