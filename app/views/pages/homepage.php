<?php require_once(APPROOT."/includes/header.php")?>
<?php if($_SESSION["user_type"] === "admin"){ redirect("admin/dashboard");}?>
<div class="col-12 d-flex justify-content-between p-3">
    <div>
        <h1>Welcome</h1>
        <p class="d-inline">Electronic document archiving and monitoring system you can now search for an archived
            document our the
            IT department</p>
        <?php echo $_SESSION["user_id"];?>
        <?php echo $_SESSION["user_type"];?>
    </div>
    <div>
        <span><?php echo $_SESSION["user"];?></span>
        <a href="<?php echo URLROOT?>/request" class="btn btn-sm btn-primary">My Requests</a>
        <a href="<?php echo URLROOT?>/users/logout" class="btn btn-sm btn-secondary">Logout</a>
    </div>
</div>
<form method="get" id="searchForm">
    <div class="input-group mb-3 input-group-sm">
        <input type="text" class="form-control form-control-sm" placeholder="Search a document"
            aria-label="Search a document" aria-describedby="basic-addon2" id="searchField">
    </div>
</form>
<div class="results">

</div>
<?php require_once(APPROOT."/includes/footer.php")?>