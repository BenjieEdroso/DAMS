<?php require_once APPROOT . "/views/includes/header.php"; ?>



<form action="<?php echo URLROOT; ?>/users/login" method="post"
    class="col-3 shadow p-3 col-4 position-absolute top-50 start-50 translate-middle" >
    <div class="text-center mb-3">
    <img src="<?php echo URLROOT; ?>/images/chmsc-logo-side.png" class=""
        alt="carlos hilado memorial state college logo">
    <h1 class="fs-4">Document Archiving and Monitoring System</h1>
</div>
    <div class="mb-3">
        <h4 >Sign in</h4>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
            value="<?php echo $data["username"]; ?>">
        <?php if (!empty($data["username_error"])) { ?> <div id="username_error"
            class=""><?php echo $data["username_error"]; ?></div><?php } ?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" value="<?php echo $data["password"]; ?>">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        <?php if (!empty($data["password_error"])) { ?><div id="password_error"
            class=""><?php echo $data["password_error"]; ?></div><?php } ?>

    </div>

    <div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/users/register">Register</a>
    </div>
</form>




<?php require_once APPROOT . "/views/includes/footer.php"; ?>