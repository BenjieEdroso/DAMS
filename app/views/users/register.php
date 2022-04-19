<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<form action="<?php echo URLROOT?>/users/register" method="post"
    class="card col-4 p-3 position-absolute top-50 start-50 translate-middle">
    <h4 class="mb-4 mt-4">Please Register</h4>
    <div>
        <label for="firstname" class="form-label">Firstname</label>
        <input class="form-control" type="text" name="firstname" id="firstname">
        <?php if(!empty($data["firstname_error"])){?> <div class="text-danger"><?php echo $data["firstname_error"];?>
        </div><?php }?>
    </div>


    <div>
        <label for="lastname" class="form-label">Lastname</label>
        <input class="form-control" type="text" name="lastname" id="lastname">
        <?php if(!empty($data["lastname_error"])){?> <div class="text-danger"><?php echo $data["lastname_error"];?>
        </div><?php }?>
    </div>


    <div>
        <label for="birthdate" class="form-label">Birthdate</label>
        <input class="form-control" type="date" name="birthdate" id="birthdate">
        <?php if(!empty($data["birthdate_error"])){?> <div class="text-danger"><?php echo $data["birthdate_error"];?>
        </div><?php }?>
    </div>


    <div>
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" name="email" id="email">
        <?php if(!empty($data["email_error"])){?> <div class="text-danger"><?php echo $data["email_error"];?>
        </div><?php }?>
    </div>


    <div>
        <label for="password" class="form-label">Password</label>
        <input class="form-control" type="password" name="password" id="password">
        <?php if(!empty($data["password_error"])){?> <div class="text-danger"><?php echo $data["password_error"];?>
        </div><?php }?>
    </div>

    <input type="submit" value="Register" class="btn btn-primary mb-3 mt-3">
</form>

<?php print_r($data)?>
<?php require_once APPROOT . "/views/includes/footer.php" ; ?>