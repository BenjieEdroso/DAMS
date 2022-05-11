<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<?php if(!isset($_SESSION["email"])) {
    redirect("users/login");
}?>
<div class="d-flex" style="width: 100%">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <main class="tab-content col-10" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
            aria-labelledby="v-pills-home-tab">
            <div>
                <div class="cards-top d-flex p-3 justify-content-between">
                    <div class="storage card  col-3 px-4 py-3">
                        <div class="card-label h5">
                            Storage
                            <i class="bi bi-hdd-fill card-icon"></i>
                        </div>
                        <span>Free Space: <?php echo $data["un_used"]?></span>
                        <span>Used Space: <?php echo $data["used"]?></span>
                    </div>
                    <div class="files card col-3 px-4 py-3 ">
                        <div class="card-label h5">Files <i class="bi bi-file-earmark-text-fill card-icon"></i></div>
                        <div class="d-flex justify-content-between  my-auto">
                            <div>
                                <div class="number h4 "><?php echo $data["total"]?></div>
                                <div>Total</div>
                            </div>
                            <div>
                                <div class="number h4 "><?php echo $data["total_docx"]?></div>
                                <div>docx</div>
                            </div>
                            <div>
                                <div class="number h4 "><?php echo $data["total_pdf"]?></div>
                                <div>pdf</div>
                            </div>
                        </div>
                    </div>
                    <div class="files card col-3 px-4 py-3 ">
                        <div class="card-label h5">Users <i class="bi bi-people-fill card-icon"></i></div>
                        <div class="d-flex justify-content-between  my-auto">
                            <div>
                                <div class="number h4 ">6</div>
                                <div>Admin</div>
                            </div>
                            <div>
                                <div class="number h4 ">8</div>
                                <div>Staff</div>
                            </div>
                            <div>
                                <div class="number h4 ">21</div>
                                <div>Teachers</div>
                            </div>
                        </div>
                    </div>
                    <div class="files card col-3 px-4 py-3 ">
                        <div class="card-label h5">Offices <i class="bi bi-building card-icon"></i></div>
                        <div class="d-flex justify-content-between  my-auto">
                            <div>
                                <div class="number h4 ">12</div>
                                <div>Department</div>
                            </div>
                            <div>
                                <div class="number h4 ">8</div>
                                <div>Offices</div>
                            </div>
                            <div>
                                <div class="number h4 ">16</div>
                                <div>Buildings</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-card card m-3 p-3  ">
                    <div class="overflow-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Filename</th>
                                    <th>Date Uploaded</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-danger">
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-danger">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-success">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-danger">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-success">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-danger">
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                                <tr class="table-primary">

                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-archiving" role="tabpanel" aria-labelledby="v-pills-profile-tab">

        </div>
        <div class="tab-pane fade" id="v-pills-monitoring" role="tabpanel" aria-labelledby="v-pills-monitoring-tab">
            <?php require_once APPROOT . "/views/includes/monitoring-content.php" ; ?>
        </div>
        <div class="tab-pane fade" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab">
            <?php require_once APPROOT . "/views/includes/request-content.php" ; ?>
        </div>
        <div class="tab-pane fade" id="v-pills-control" role="tabpanel" aria-labelledby="v-pills-control-tab">
            <?php require_once APPROOT . "/views/includes/control-content.php" ; ?>
        </div>
        <div class="tab-pane fade" id="v-pills-usermanagement" role="tabpanel"
            aria-labelledby="v-pills-usermanagement-tab">
            <?php require_once APPROOT . "/views/includes/usermanagement-content.php" ; ?>
        </div>
    </main>

</div>

<?php require_once APPROOT . "/views/includes/footer.php" ; ?>