<?php require_once(APPROOT . "/includes/header.php");?>
<div class="edit_file d-flex bg-light" style="height: 100vh;">
    <?php include_once(APPROOT . "/includes/sidebar.php");?>
    <div class="w-100 p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Delete file</h1>
            <div class="d-flex align-items-center">
                <button id="backBtn" style="outline: none; border:none; background: none;">
                    <img src="<?php echo URLROOT?> /images/arrow-left-square-fill.svg" height="28"
                        style="opacity: 70%;">
                </button>
                <?php include_once(APPROOT . "/includes/logout_button.php");?>
            </div>
        </div>
        <div class="bg-white rounded p-3 border col-4">
            <h5>Are you sure you want to delete this file?</h5>
            <a href="<?php echo URLROOT?>/admin/delete_file?file_id=<?php echo $data["file_id"]?>&file_name=<?php echo $data["file_name"]?>"
                class="btn-sm btn btn-primary">Yes</a>
            <button class="btn btn-sm btn-secondary" onclick="window.history.back();">Cancel</button>
        </div>
    </div>
</div>


<?php require_once(APPROOT . "/includes/footer.php");?>