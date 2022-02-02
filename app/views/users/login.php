<?php require_once APPROOT . "/views/includes/header.php"; ?>
<!-- <img src="<?php echo URLROOT; ?>/images/chmsc_logo.png" alt="carlos hilado memorial state college logo" class=""
    style="height: 150px;"> -->
<div class="side">
    <img src="<?php echo URLROOT; ?>/images/chmsc-logo-side.png" alt="carlos hilado memorial state college logo">
    <h1 class="side__title">Document Archiving and Monitoring System</h1>
</div>
<form action="<?php echo URLROOT; ?>/users/login" method="post"
    class="col-3 container  border position-absolute start-50 top-50 translate-middle rounded py-4 px-3">
    <div class="mb3">
        <h4>Sign in</h4>
    </div>
    <div class="mb-4">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
            value="<?php echo $data["username"]; ?>">
        <?php if (!empty($data["username_error"])) { ?> <div id="username_error"
            class="form-text position-absolute text-danger"><?php echo $data["username_error"]; ?></div><?php } ?>
    </div>
    <div class="mb-4 has-validation">
        <label for="exampleInputPassword1" class="form-label" value="<?php echo $data["password"]; ?>">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        <?php if (!empty($data["password_error"])) { ?><div id="password_error"
            class="form-text position-absolute text-danger"><?php echo $data["password_error"]; ?></div><?php } ?>

    </div>
    <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div> -->
    <div class="mt-5">
        <button type="submit" class="btn btn-primary">Sign in</button>
        <a class="btn btn-light" href="<?php echo URLROOT; ?>/users/register">Register</a>
    </div>
</form>
<!-- <a href="<?php echo URLROOT; ?>/users/register_student">Student Register</a> -->


<?php require_once APPROOT . "/views/includes/footer.php"; ?>