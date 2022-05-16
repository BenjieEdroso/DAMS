<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<?php if(!empty($data["error_msg"])) { ?>
<div class="alert-danger p-3"><?php echo $data["error_msg"]?></div>
<?php }?>
<div class="w-100">
    <img class="mx-auto d-block mt-5" src="<?php echo URLROOT?>/images/chmsu-logo.png" width="198" height="199">
</div>
<h5 class="text-center my-5">Login</h5>
<div class="d-flex w-100 justify-content-center">
    <form action="<?php echo URLROOT?>/users/login" method="post" autocomplete="off" class="col-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control p-2 " autocomplete="off"
                placeholder="youremail@chmsu.edu.ph">
            <?php if(!empty($data["email_error"])) { ?>
            <div class="text-danger"><?php echo $data["email_error"];?></div>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control p-2" autocomplete="off">
            <?php if(!empty($data["password_error"])) { ?>
            <div class="text-danger"><?php echo $data["password_error"];?></div>
            <?php }?>
        </div>
        <input type="submit" value="Login" id="loginBtn" class="loginBtn form-control p-2 text-white">
    </form>
</div>
<a href="#" class="text-center text-secondary my-3 d-block text-decoration-none">Forgot password?</a>
<?php require_once APPROOT . "/views/includes/footer.php" ; ?>