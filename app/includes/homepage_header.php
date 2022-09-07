    <div class="p-3 bg-white w-full border d-flex justify-content-between">
        <div class="logo d-flex" style="width: fit-content;">
            <img src="<?php echo URLROOT?>/images/chmsu-logo.png" alt="chmsu logo" width="50" class=" d-block me-3">
            <div class="logo-text text-muted col-4">Electronic Document Archiving and Monitoring System
            </div>
        </div>
        <div class="d-flex align-items-center">
            <?php if("http://". $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]."" !== "http://localhost/dams/users/homepage") {?>
            <button id="backBtn" style="outline: none; border:none; background: none;">
                <img src="<?php echo URLROOT?> /images/arrow-left-square-fill.svg" height="28" style="opacity: 70%;">
            </button>
            <?php }?>
            <h6 class="d-inline me-3"><?php echo $_SESSION["user"];?></h6>
            <a href="<?php echo URLROOT?>/request" class="btn btn-sm btn-success me-3">My Requests</a>
            <?php include_once(APPROOT . "/includes/logout_button.php")?>
        </div>
    </div>