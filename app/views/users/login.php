<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<?php if(!empty($data["error_msg"])) { ?><div class="alert-danger p-3"><?php echo $data["error_msg"]?></div> <?php }?>
<form action="<?php echo URLROOT?>/users/login" method="post" autocomplete="off"
    class="col-3 px-4 py-5 rounded shadow position-absolute top-50 start-50 translate-middle">
    <div class="mb-3">
        <input type="email" name="email" id="email" class="form-control p-2 " autocomplete="off">
        <?php if(!empty($data["email_error"])) { ?><div class="text-danger"><?php echo $data["email_error"];?>
        </div><?php }?>
    </div>
    <div class="mb-3">
        <input type="password" name="password" id="password" class="form-control p-2" autocomplete="off">
        <?php if(!empty($data["password_error"])) { ?><div class="text-danger"><?php echo $data["password_error"];?>
        </div><?php }?>
    </div>
    <input type="submit" value="Login" class="form-control p-2 bg-primary text-white">
</form>

<?php require_once APPROOT . "/views/includes/footer.php" ; ?>