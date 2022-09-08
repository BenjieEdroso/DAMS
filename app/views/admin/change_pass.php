<?php require_once(APPROOT . "/includes/header.php");?>
<div class="change_pass d-flex bg-light" style="height: 100vh;">
    <?php include_once(APPROOT . "/includes/sidebar.php");?>
    <div class="main w-100 p-3">
                <div class="d-flex justify-content-between">
            <h1>Change Password</h1>
            <div class="d-flex align-items-center">
                <button id="backBtn" style="outline: none; border:none; background: none;">
                    <img src="<?php echo URLROOT?> /images/arrow-left-square-fill.svg" height="28"
                        style="opacity: 70%;">
                </button>
                <?php include_once(APPROOT . "/includes/logout_button.php");?>
            </div>
        </div>

<form action="<?php echo URLROOT?>/admin/update_pass" method="post" class="col-3 p-3 bg-white rounded border">
    <input type="number" name="user_id" id="user_id" hidden value="<?php echo $data["user_id"];?>">
    <div class="form-group">
        <label for="old_pass">Old Password</label>
        <input type="password" name="old_pass" id="old_pass" class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="new_pass">New Password</label>
        <input type="password" name="new_pass" id="new_pass" class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="confirm_pass">Confirm New Password</label>
        <input type="password" name="confirm_pass" id="confirm_pass" class="form-control form-control-sm mb-3">
    </div>
    <input type="submit" value="Save" class="btn btn-sm btn-primary">
    <button class="btn btn-sm btn-secondary" onclick="window.history.back();">Cancel</button>
</form>
    </div>
</div>
<?php require_once(APPROOT . "/includes/footer.php");?>