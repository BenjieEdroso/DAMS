<?php require_once(APPROOT . "/includes/header.php");?>
<div class="confirm_delete d-flex bg-light" style="height: 100vh;">
    <?php include_once(APPROOT . "/includes/sidebar.php");?>
    <div class="main w-100 p-3">
                <div class="d-flex justify-content-between">
            <h1>Delete user</h1>
            <div class="d-flex align-items-center">
                <button id="backBtn" style="outline: none; border:none; background: none;">
                    <img src="<?php echo URLROOT?> /images/arrow-left-square-fill.svg" height="28"
                        style="opacity: 70%;">
                </button>
                <?php include_once(APPROOT . "/includes/logout_button.php");?>
            </div>
        </div>
        <div class="bg-white rounded col-4 h-25 border p-3">
            <h4>Are you sure you want to delete this user?</h4>
            <a href="<?php echo URLROOT?>/admin/delete_user?user_id=<?php echo $data["user_id"]?>" class="btn btn-primary btn-sm">Yes</a>
            <button class="btn-secondary btn-sm btn" onclick="window.history.back()">Cancel</button>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/includes/footer.php");?>