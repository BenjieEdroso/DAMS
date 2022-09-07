<?php require_once(APPROOT . "/includes/header.php");?>
<h1>Edit user</h1>
<form action="<?php echo URLROOT?>/admin/update_user" method="post" class="col-4 border p-3 rounded">
    <input type="text" name="user_id" id="user_id" value="<?php echo $data->user_id?>" hidden>
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $data->firstname?>"
            class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $data->lastname?>"
            class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $data->email?>"
            class="form-control form-control-sm">
    </div>

    <button type="submit" class="btn btn-sm btn-primary mt-3 col-12">Update</button>

</form>
<?php require_once(APPROOT . "/includes/footer.php");?>