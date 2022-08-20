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
    <form action="<?php echo URLROOT?>/users/login" class="col-3 border p-4" method="POST">
        <div class="mb-4">
            <h3>Login</h3>
        </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

    </form>
    <script src="<?php echo URLROOT?>/js/jquery.min.js"></script>
    <script src="<?php echo URLROOT?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT?>/js/main.js"></script>
</body>

</html>