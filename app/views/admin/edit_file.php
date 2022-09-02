<?php require_once(APPROOT . "/includes/header.php");?>
<h1>Edit file</h1>
<form action="<?php echo URLROOT?>/admin/update_file" method="post">
    <input type="number" name="file_id" id="file_id" hidden value="<?php echo $data[0]->file_id?>">
    <div class="form-group">
        <label for="file_name">Filename</label>
        <input type="text" name="file_name" id="file_name" value="<?php echo $data[0]->file_name?>" class="form-control form-control-sm">
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-sm btn-primary col-12">
    </div>
</form>

<?php require_once(APPROOT . "/includes/footer.php");?>