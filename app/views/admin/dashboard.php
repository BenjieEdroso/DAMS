<?php 
require_once APPROOT . "/views/includes/header.php";
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  redirect("users/login");
}?>

<div class="d-flex align-items-start vh-100 ">
    <aside class="nav flex-column nav-pills me-3 col-lg-2 d-none d-xl-block bg-success h-100" id="v-pills-tab"
        role="tablist" aria-orientation="vertical">
        <div class="d-flex align-content-center justify-content-center p-3">
            <img src="<?php echo URLROOT?>/images/logo.png" alt="Carlos Hilado Memorial State College logo">
            <p class="text-white h3 my-auto ms-3">DAMS</p>
        </div>
        <hr>
        <a class="nav-link  text-white active" id="v-pills-dashboard-tab" data-bs-toggle="pill"
            href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
        <a class="nav-link text-white " id="v-pills-archiving-tab" data-bs-toggle="pill" href="#v-pills-archiving"
            role="tab" aria-controls="v-pills-archiving" aria-selected="false">Archiving</a>
        <a class="nav-link text-white " id="v-pills-monitoring-tab" data-bs-toggle="pill" href="#v-pills-monitoring"
            role="tab" aria-controls="v-pills-monitoring" aria-selected="false">Monitoring</a>
        <a class="nav-link text-white " id="v-pills-control-tab" data-bs-toggle="pill" href="#v-pills-control"
            role="tab" aria-controls="v-pills-control" aria-selected="false">Control</a>
        <a class="nav-link text-white " id="v-pills-usermanagement-tab" data-bs-toggle="pill"
            href="#v-pills-usermanagement" role="tab" aria-controls="v-pills-usermanagement" aria-selected="false">User
            Management</a>
    </aside>
    <main class="tab-content p-3 w-100" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
            aria-labelledby="v-pills-dashboard-tab">
            <?php require_once APPROOT . "/views/includes/dashboard-content.php"?>
        </div>

        <div class="tab-pane fade" id="v-pills-archiving" role="tabpanel" aria-labelledby="v-pills-archiving-tab">

        </div>
        <div class="tab-pane fade" id="v-pills-monitoring" role="tabpanel" aria-labelledby="v-pills-monitoring-tab">
            <h1>Monitoring</h1>
        </div>
        <div class="tab-pane fade" id="v-pills-control" role="tabpanel" aria-labelledby="v-pills-control-tab">
            <h1>Control</h1>
        </div>
        <div class="tab-pane fade" id="v-pills-usermanagement" role="tabpanel"
            aria-labelledby="v-pills-usermanagement-tab">
            <h1>User Management</h1>
        </div>
    </main>
</div>
</div>
</div>
<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>