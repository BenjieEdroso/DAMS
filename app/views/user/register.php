<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
</head>

<body>
    <form class="col-3 border p-4 register-form" method="POST">
        <div class="mb-4">
            <h3>Register</h3>
        </div>
        <!-- firstname input -->
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control form-control-sm" name="firstname" />
            <label class="form-label text-muted" for="form2Example1">Firstname</label>
        </div>
        <!-- latname input -->
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control form-control-sm" name="lastname" />
            <label class="form-label text-muted" for="form2Example1">Lastname</label>
        </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control form-control-sm" name="email" />
            <label class="form-label text-muted" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control form-control-sm" name="password" />
            <label class="form-label text-muted" for="form2Example2">Password</label>
        </div>
        <!-- Birthdate input -->
        <div class="form-outline mb-4">
            <input type="date" id="form2Example1" class="form-control form-control-sm text-muted" name="birthdate" />
            <label class="form-label text-muted" for="form2Example1">Birthdate</label>
        </div>
        <!-- Password input -->
        <div class="form-outline mb-4">
            <select name="type" id="type" class="form-control form-control-sm text-muted">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <label class="form-label text-muted" for="form2Example2">User type</label>
        </div>


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4 btn-sm">Create account</button>

    </form>
    <script src="<?php echo URLROOT?>/js/jquery.min.js"></script>
    <script src="<?php echo URLROOT?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT?>/js/main.js"></script>
</body>

</html>