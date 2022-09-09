<?php require_once(APPROOT . "/includes/header.php");?>
<div class="confirm_refuse d-flex bg-light" style="height: 100vh;">
    <?php include_once(APPROOT . "/includes/sidebar.php");?>
    <div class="w-100 p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Requests</h1>
            <div class="d-flex align-items-center">
                <button id="backBtn" style="outline: none; border:none; background: none;">
                    <img src="<?php echo URLROOT?> /images/arrow-left-square-fill.svg" height="28"
                        style="opacity: 70%;">
                </button>
                <?php include_once(APPROOT . "/includes/logout_button.php");?>
            </div>
        </div>

        <form action="<?php echo URLROOT?>/request/refuse" method="post" class="bg-white rounded p-3 border col-4">
            <h5>Are you sure you want to refuse this file request?</h5>
            <input type="number" name="id" id="id" hidden value="<?php echo $data["file_id"]?>">
            <input type="text" name="status" id="status" hidden value="refused">
            <button type="submit" class="btn btn-danger btn-sm">Refuse</button>
            <button class="btn btn-sm btn-secondary" onclick="window.history.back();">Cancel</button>
        </form>
    </div>
</div>


<?php require_once(APPROOT . "/includes/footer.php");?>