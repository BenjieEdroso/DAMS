<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<?php if(!isset($_SESSION["username"])) {
    redirect("users/login");
}?>
<div class="d-flex" style="width: 100%">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <?php require_once APPROOT . "/views/includes/dashboard-main.php" ; ?>
</div>
<?php require_once APPROOT . "/views/includes/footer.php" ; ?>