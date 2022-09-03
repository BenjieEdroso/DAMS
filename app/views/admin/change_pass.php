<?php require_once(APPROOT . "/includes/header.php");?>
<h1>Change password</h1>

<form action="<?php echo URLROOT?>/admin/update_pass" method="post" class="col-3">
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
        <input type="password" name="confirm_pass" id="confirm_pass" class="form-control form-control-sm">
    </div>
    <input type="submit" value="Save" class="btn btn-sm btn-primary mt-3">
</form>
<?php require_once(APPROOT . "/includes/footer.php");?>