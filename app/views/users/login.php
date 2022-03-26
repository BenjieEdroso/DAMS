<?php require_once APPROOT . "/views/includes/header.php"; ?>
<div class="d-flex align-items-center vh-100 justify-content-center">
    <form action="<?php echo URLROOT; ?>/users/login" method="post" class="col-lg-5 col-md-8 col-10">
        <div class="position-relative">
            <input type=" text" name="username" id="username"
                class=" form-control my-5 p-3 <?php if (!empty($data["username_error"])) { ?>is-invalid <?php } ?>"
                value="<?php echo $data["username"]; ?>" placeholder="Username">
            <?php if (!empty($data["username_error"])) { ?> <div id="username_error"
                class="text-danger position-absolute top-100 mt-2 ">
                <?php echo $data["username_error"]; ?></div><?php } ?>
        </div>
        <div class="position-relative">
            <input type="password" name="password" id="password"
                class="form-control my-5 p-3  <?php if (!empty($data["password_error"])) { ?>is-invalid <?php } ?>"
                value="" placeholder="Password">
            <?php if (!empty($data["password_error"])) { ?><div id="password_error"
                class="text-danger position-absolute top-100 mt-2 invalid-feedback">
                <?php echo $data["password_error"]; ?></div><?php } ?>
        </div>
        <button type="submit" class="form-control bg-primary text-white my-5 p-3 ">Login</button>
    </form>
</div>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>