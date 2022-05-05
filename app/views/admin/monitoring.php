<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<div class="d-flex">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <!-- //search bar -->

    <div class="col-10">
        <form action="#" method="get" class="col-4 ms-3 mt-3">
            <div class="position-relative">
                <i class="bi bi-search position-absolute top-50 ms-4  translate-middle text-primary"></i>
                <input type="text" name="q" id="q" class="form-control rounded-pill ps-5 text-primary">
            </div>
        </form>
        <nav class="nav nav-tabs mt-5 mx-3" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" href="#nav-all" role="tab"
                aria-controls="nav-all" aria-selected="true"><span class="badge bg-primary">All</span></a>
            <a class="nav-link" id="nav-successfull-tab" data-bs-toggle="tab" href="#nav-successfull" role="tab"
                aria-controls="nav-successfull" aria-selected="false"><span
                    class="badge bg-success">Successfull</span></a>
            <a class="nav-link processing" id="nav-processing-tab" data-bs-toggle="tab" href="#nav-processing"
                role="tab" aria-controls="nav-processing" tabindex="-1" aria-processing="true"><span
                    class="badge bg-warning">Processing</span></a>
            <a class="nav-link unsuccessfull" id="nav-unsuccessfull-tab" data-bs-toggle="tab" href="#nav-unsuccessfull"
                role="tab" aria-controls="nav-unsuccessfull" tabindex="-1" aria-unsuccessfull="true"><span
                    class="badge bg-danger">Unsuccessfull</span></a>
        </nav>
        <div class="tab-content mx-3" id="nav-tabContent ">
            <div class="tab-pane fade show active pt-3" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <div class="card col-4">
                    <div class="card-header">
                        <h6>FOM1</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">OJT Form Application</h5>
                        <p class="card-text">Requested from: <span>OSA</span></p>
                        <p class="card-text">Purpose: <span>OJT/Internship</span></p>
                        <p class="card-text">Date Coverage: <span>03/10/2022 - 03/12/2022</span></p>
                        <a href="#" class="btn btn-secondary btn-sm px-3">Open</a>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between">
                            <span>Opened 2 days ago</span>
                            <span class="badge bg-success">Successfull</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade pt-3" id="nav-successfull" role="tabpanel" aria-labelledby="nav-successfull-tab">
                <div class="card col-4">
                    <div class="card-header">
                        <h6>FOM1</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">OJT Form Application</h5>
                        <p class="card-text">Requested from: <span>OSA</span></p>
                        <p class="card-text">Purpose: <span>OJT/Internship</span></p>
                        <p class="card-text">Date Coverage: <span>03/10/2022 - 03/12/2022</span></p>
                        <a href="#" class="btn btn-secondary btn-sm px-3">Open</a>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between">
                            <span>Opened 2 days ago</span>
                            <span class="badge bg-success">Successfull</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade pt-3" id="nav-processing" role="tabpanel" aria-labelledby="nav-processing-tab">
                <div class="card col-4">
                    <div class="card-header">
                        <h6>FOM1</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">OJT Form Application</h5>
                        <p class="card-text">Requested from: <span>OSA</span></p>
                        <p class="card-text">Purpose: <span>OJT/Internship</span></p>
                        <p class="card-text">Date Coverage: <span>03/10/2022 - 03/12/2022</span></p>
                        <a href="#" class="btn btn-secondary btn-sm px-3">Open</a>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between">
                            <span>Opened 2 days ago</span>
                            <span class="badge bg-warning">Processing</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade pt-3" id="nav-unsuccessfull" role="tabpanel"
                aria-labelledby="nav-unsuccessfull-tab">
                <div class="card col-4">
                    <div class="card-header">
                        <h6>FOM1</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">OJT Form Application</h5>
                        <p class="card-text">Requested from: <span>OSA</span></p>
                        <p class="card-text">Purpose: <span>OJT/Internship</span></p>
                        <p class="card-text">Date Coverage: <span>03/10/2022 - 03/12/2022</span></p>
                        <a href="#" class="btn btn-secondary btn-sm px-3">Open</a>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between">
                            <span>Opened 2 days ago</span>
                            <span class="badge bg-danger">Unsuccessfull</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tabs   
    cards -->
</div>

<?php require_once APPROOT . "/views/includes/footer.php" ; ?>