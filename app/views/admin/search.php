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
    <a href="#" class="position-absolute seeResults result-text">See all results</a>
</form>

<div id="list-example" class="list-group data_viewer mx-auto">

</div>





<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>