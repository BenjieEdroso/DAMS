<?php

require_once APPROOT . "/views/includes/header.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  redirect("users/login");
}
?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>

<main class="main main--archive">
    <div class="topnav">
        <div> <i class="material-icons icon">file_upload</i> Upload Files</div>
        <div class="icon-scanner-cont"><i class="material-icons icon-scanner">scanner</i> Scan Files</div>
        <form action="#" method="get">
            <div> <i class="material-icons search-icon">search</i>
                <input type="text" name="search" id="search" class="search-box">
            </div>
            <input type="submit" value="submit" hidden>
        </form>
    </div>
</main>
</div>
<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>