<?php require_once APPROOT . "/views/includes/header.php"; ?>
<div class="login">
    <form action="<?php echo URLROOT; ?>/users/login" method="post" class="login__form">
        <div class="login__form--flex">
            <input type="text" class="login__username" id="username" name="username" aria-describedby="username"
                value="<?php echo $data["username"]; ?>" placeholder="Username">
            <?php if (!empty($data["username_error"])) { ?> <div id="username_error" class="">
                <?php echo $data["username_error"]; ?></div><?php } ?>
            <input type="password" class="login__password" name="password" placeholder="Password"
                id="exampleInputPassword1">
            <?php if (!empty($data["password_error"])) { ?><div id="password_error" class="">
                <?php echo $data["password_error"]; ?></div><?php } ?>
            <button type="submit" class="login__submit">LOGIN</button>
        </div>
    </form>
</div>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>