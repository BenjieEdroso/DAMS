<?php

require_once APPROOT . "/views/includes/header.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    redirect("users/login");
}

?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>
<?php require_once APPROOT . "/views/includes/admin-main.php"; ?>


<form action="<?php echo URLROOT; ?>/documents/search" method="post"
    class="d-flex justify-content-center mx-auto position-relative" style="width: 70%; ">
    <input class="form-control p-3" type="text" name="search" id="search-box" placeholder="Search">
    <a href="#" class="position-absolute seeResults">See all results</a>
</form>

<div class="data_viewer card mx-auto mt-3" style="width: 70%; display: none; visibility: hidden;">
    <div class="card-body">

    </div>
</div>




<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>