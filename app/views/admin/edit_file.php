<?php require_once(APPROOT . "/includes/header.php");?>
<div class="delete_file d-flex bg-light" style="height: 100vh;">
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
        <form action="<?php echo URLROOT?>/admin/update_file" method="post" class="bg-white col-4 rounded border p-3">
            <input type="number" name="file_id" id="file_id" hidden value="<?php echo $data[0]->file_id?>">
            <div class="form-group">
                <label for="file_name">Filename</label>
                <input type="text" name="file_name" id="file_name" value="<?php echo $data[0]->file_name?>"
                    class="form-control form-control-sm mb-3">
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-sm btn-primary ">
                <button class="btn btn-sm btn-secondary" onclick="window.history.back();">Cancel</button>
            </div>

        </form>
    </div>
</div>


<?php require_once(APPROOT . "/includes/footer.php");?>