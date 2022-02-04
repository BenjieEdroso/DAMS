<?php require_once APPROOT . "/views/includes/header.php"; ?>
<?php if (!empty($data["success_msg"])) { ?> <div class="alert alert-success alert-dis fade show  " role="alert">
    <?php echo $data["success_msg"]; ?></div> <?php } ?>
<form action="<?php echo URLROOT; ?>/users/register" method="post"
    class="col-4 container  border position-relative rounded py-4 px-3">
    <div class="mb-3">
        <h5>Create your DAMS account</h5>
        <h6 class="text-muted">(Step 1 of 2)</h6>
    </div>

    <div class="d-flex justify-content-between">
        <div class="mb-4 col-3 ">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname"
                value="<?php echo $data["firstname"]; ?>">
            <?php if (!empty($data["firstname_error"])) { ?> <div id="firstname_error"
                class="form-text position-absolute text-danger"><?php echo $data["firstname_error"]; ?></div><?php } ?>
        </div>
        <div class="mb-4 col-3 ">
            <label for="middlename" class="form-label">Middle name</label>
            <input type="text" class="form-control" id="middlename" name="middlename" aria-describedby="middlename"
                value="<?php echo $data["middlename"]; ?>">
            <?php if (!empty($data["middlename_error"])) { ?> <div id="middlename_error"
                class="form-text position-absolute text-danger"><?php echo $data["middlename_error"]; ?></div><?php } ?>
        </div>
        <div class="mb-4 col-3 ">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname"
                value="<?php echo $data["lastname"]; ?>">
            <?php if (!empty($data["lastname_error"])) { ?> <div id="lastname_error"
                class="form-text position-absolute text-danger"><?php echo $data["lastname_error"]; ?></div><?php } ?>
        </div>
    </div>

    <div class="mb-4 col-12">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
            value="<?php echo $data["username"]; ?>">
        <?php if (!empty($data["username_error"])) { ?> <div id="username_error"
            class="form-text position-absolute text-danger"><?php echo $data["username_error"]; ?></div><?php } ?>
    </div>
    <div class="d-flex justify-content-between">
        <div class="mb-4 col-5 ">
            <label for="exampleInputPassword1" class="form-label"
                value="<?php echo $data["password"]; ?>">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            <?php if (!empty($data["password_error"])) { ?><div id="password_error"
                class="form-text position-absolute text-danger"><?php echo $data["password_error"]; ?></div><?php } ?>
        </div>
        <div class="mb-4 col-5 ">
            <label for="confirm_pass" class="form-label" value="<?php echo $data["confirm_pass"]; ?>">Confirm
                password</label>
            <input type="password" class="form-control" name="confirm-password" id="confirm_pass">
            <?php if (!empty($data["confirm_pass_error"])) { ?><div id="confirm_pass_error"
                class="form-text position-absolute text-danger"><?php echo $data["confirm_pass_error"]; ?></div>
            <?php } ?>
        </div>
    </div>

    <input type="hidden" name="user_type" id="user_type" value="student">


    <div class="mt-5">
        <button type="submit" class="btn btn-primary">Register</button>
        <a class="btn btn-light" href="<?php echo URLROOT; ?>/users/login">Sign in</a>
    </div>
</form>


<?php require_once APPROOT . "/views/includes/footer.php"; ?>