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
    <h1>Welcome</h1>
    <p>Electronic document archiving and monitoring system you can now search for an archived document our the IT
        department</p>
    <form method="get" id="searchForm">
        <div class="input-group mb-3 input-group-sm">
            <input type="text" class="form-control form-control-sm" placeholder="Search a document"
                aria-label="Search a document" aria-describedby="basic-addon2" id="searchField">
        </div>
    </form>
    <div class="results">

    </div>
    <script src="<?php echo URLROOT?>/js/jquery.min.js"></script>
    <script src="<?php echo URLROOT?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT?>/js/main.js"></script>
</body>

</html>