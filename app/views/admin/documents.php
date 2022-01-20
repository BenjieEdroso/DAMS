<?php
session_start();
require_once APPROOT . "/views/includes/header.php";

if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
    redirect("users/login");
}

?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>
<?php require_once APPROOT . "/views/includes/admin-main.php"; ?>

<div class="container ">
    <table class="table bg-white rounded">
        <thead>
            <tr>
                <th scope="col">File Id</th>
                <th scope="col">File Name</th>
                <th scope="col">File Type</th>
                <th scope="col">File Temporary Name</th>
                <th scope="col">File Error</th>
                <th scope="col">File Size</th>
                <th scope="col">File Upload Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-body" id="table">
            <?php print_r($data)?>
        </tbody>
    </table>
</div>

<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>