<?php require_once(APPROOT."/includes/header.php")?>
<?php if($_SESSION["user_type"] === "admin"){ redirect("admin/dashboard");}?>
<?php include_once(APPROOT . "/includes/homepage_header.php");?>
<div class="homepage bg-light p-3 w-100">
    <div class="position-relative w-full">
        <div class="col-6 mx-auto text-center mb-3">
            <h1>Welcome</h1>
            <p class="d-inline">Electronic document archiving and monitoring system you can now search for an archived
                document our the
                IT department</p>
        </div>
    </div>
    <form method="get" id="searchForm" class="col-6 mx-auto position-relative searchForm">
        <div class="input-group mb-3 input-group-sm">
            <input type="text" class="form-control form-control-sm" placeholder="Search a document"
                aria-label="Search a document" aria-describedby="basic-addon2" id="searchField">
        </div>
    </form>
    <div class="results " style="overflow-y: scroll; max-height: calc(100vh - 250px); ">

    </div>
    <div class="homepageBg"></div>
</div>
<?php require_once(APPROOT."/includes/footer.php")?>