<?php require_once APPROOT . "/views/includes/header.php"; ?>
<!-- 
<div class="form-signin form-custom">
  <?php if (!empty($data["success_msg"])) { ?> <div class="alert alert-success alert-dis fade show" role="alert"><?php echo $data["success_msg"]; ?></div> <?php } ?>
  <form action="<?php echo URLROOT; ?>/users/register"  method="POST">
  <div class="mb-5">
    <h3>Please Register</h3>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name ="username" aria-describedby="username"  value="<?php echo $data["username"]; ?>" >
   <?php if (!empty($data["username_error"])) { ?> <div class="alert alert-danger" role="alert"><?php echo $data["username_error"]; ?></div> <?php } ?>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password"  value="<?php echo $data["password"]; ?>" >
    <?php if (!empty($data["password_error"])) { ?> <div class="alert alert-danger" role="alert"><?php echo $data["password_error"]; ?></div> <?php } ?>
  </div>
   <div class="mb-3">
    <label for="confirm-password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirm-password" name="confirm-password" value="<?php echo $data["confirm_pass"]; ?>" >
    <?php if (!empty($data["confirm_pass_error"])) { ?> <div class="alert alert-danger" role="alert"><?php echo $data["confirm_pass_error"]; ?></div> <?php } ?>
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
  <a class="btn btn-light" href="<?php echo URLROOT; ?>/users/login">Already have an account? Login</a>
</form>
</div> -->
<?php if (!empty($data["success_msg"])) { ?> <div class="alert alert-success alert-dis fade show  " role="alert">
    <?php echo $data["success_msg"]; ?></div> <?php } ?>
<form action="<?php echo URLROOT; ?>/users/register" method="post"
    class="col-3 container  border position-relative rounded py-4 px-3">
    <div class="mb3">
        <h4>Register</h4>
    </div>
    <div class="mb-4">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
            value="<?php echo $data["username"];?>">
        <?php if (!empty($data["username_error"])) { ?> <div id="username_error"
            class="form-text position-absolute text-danger"><?php echo $data["username_error"]; ?></div><?php } ?>
    </div>
    <div class="mb-4 ">
        <label for="exampleInputPassword1" class="form-label" value="<?php echo $data["password"];?>">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        <?php if (!empty($data["password_error"])) { ?><div id="password_error"
            class="form-text position-absolute text-danger"><?php echo $data["password_error"]; ?></div><?php } ?>
    </div>
    <div class="mb-4">
        <label for="confirm_pass" class="form-label" value="<?php echo $data["confirm_pass"];?>">Confirm
            password</label>
        <input type="password" class="form-control" name="confirm-password" id="confirm_pass">
        <?php if (!empty($data["confirm_pass_error"])) { ?><div id="confirm_pass_error"
            class="form-text position-absolute text-danger"><?php echo $data["confirm_pass_error"]; ?></div><?php } ?>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-primary">Register</button>
        <a class="btn btn-light" href="<?php echo URLROOT; ?>/users/login">Sign in</a>
    </div>
</form>


<?php require_once APPROOT . "/views/includes/footer.php"; ?>