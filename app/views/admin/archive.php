<?php

require_once APPROOT . "/views/includes/header.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  redirect("users/login");
}
?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>

<main class="main main--archive">
    <div class="topnav">
        <div> <i class="material-icons icon">file_upload</i> Upload Files</div>
        <div class="icon-scanner-cont"><i class="material-icons icon-scanner">scanner</i> Scan Files</div>
        <form action="#" method="get">
            <div> <i class="material-icons search-icon">search</i>
                <input type="text" name="search" id="search" class="search-box">
            </div>
            <input type="submit" value="submit" hidden>
        </form>
    </div>
    <div class="table-card">
        <ul>
            <li><a href="#" class="archived">Archived</a></li>
            <li><a href="#" class="retention">Retention</a></li>
        </ul>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Date uploaded</th>
                        <th>Last Modified</th>
                        <th>Date to expire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FOM-1</td>
                        <td>OJT-Form.docx</td>
                        <td>03/19/2022</td>
                        <td>03/20/2022</td>
                        <td>04/20/2022</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>FOM-1</td>
                        <td>OJT-Form.docx</td>
                        <td>03/19/2022</td>
                        <td>03/20/2022</td>
                        <td>04/20/2022</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>