<?php require_once(APPROOT . "/includes/header.php");?>
<h1>Dashboard</h1>
<a href="<?php echo URLROOT?>/admin/requests" class="btn btn-sm btn-primary">Grant requests</a>
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

<?php require_once(APPROOT . "/includes/footer.php");?>