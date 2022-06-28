<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<?php if(!isset($_SESSION["email"])) {
    redirect("users/login");
}?>
<div class="d-flex" style="width: 100%">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <main class="dashboard tab-content col-10" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
            aria-labelledby="v-pills-home-tab">
            <div>
                <div class="w-100 custom-navbar p-2 text-white d-flex">
                    <div class="col-6">
                        <form id="searchForm" method="get" class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search"
                                    aria-label="Text input with segmented dropdown button" name="q" id="query">
                                <button type="submit" class="btn btn-light"><i class="bi bi-search search-icon"
                                        id="searchBtn"></i></button>

                            </div>
                            <div class="col-3 ms-3">
                                <div class="position-relative">
                                    <i
                                        class="bi bi-funnel-fill filter default-color position-absolute top-50  translate-middle"></i>
                                    <select class="form-select default-color" aria-label="Default select" name="filter"
                                        id="filter">
                                        <option selected="" value="file_name">Filename</option>
                                        <option value="file_category">Code</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="p-3 custom-height position-relative">
                    <div class="d-flex ">
                        <div class="card border bg-white p-3 col-3 master-list-mh">
                            <div class="position-relative">
                                <h6>Master List</h6>
                                <img src="<?php echo URLROOT?>/images/icons8-list-96.png" width="50"
                                    class="position-absolute end-0 top-0">
                            </div>
                            <div class="overflow-scroll hide-scroll">
                                <?php if (isset($data)) { foreach($data["master_list"] as $category) { ?>
                                <div><?php echo $category->category?></div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="cards-top d-flex px-2 justify-content-between ">
                            <div class="files card mx-2 col-6 px-4 py-3 ">
                                <div class="card-label h5">Files <i class="bi bi-file-earmark-text-fill card-icon"></i>
                                </div>
                                <div class="d-flex justify-content-between   my-auto">
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
                            <div class="files card mx-2 col-6 px-4 py-3 ">
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
                            <div class="files card mx-2 col-6 px-4 py-3 ">
                                <div class="card-label h5">Offices <i class="bi bi-building card-icon"></i></div>
                                <div class="d-flex justify-content-between  my-auto">
                                    <div>
                                        <div class="number h4 ">12</div>
                                        <div>Dept.</div>
                                    </div>
                                    <div>
                                        <div class="number h4 ">8</div>
                                        <div>Offices</div>
                                    </div>
                                    <div>
                                        <div class="number h4 ">16</div>
                                        <div>Bldg.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="storage card   col-3 px-4 py-3 position-absolute custom-position">
                        <div class="card-label h5">
                            Storage
                            <i class="bi bi-hdd-fill card-icon"></i>
                        </div>
                        <span>Free Space: <?php echo $data["un_used"]?></span>
                        <span>Used Space: <?php echo $data["used"]?></span>
                    </div>
                </div>


                <!-- <div class="table-card card m-3 p-3  ">
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

                </div> -->
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