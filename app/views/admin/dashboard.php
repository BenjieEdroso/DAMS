<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<div class="d-flex">
    <aside class="sidebar p-3 vh-100 col-2">
        <ul class="sidebar-links list-group">
            <li class="list-group-item   border-0 p-0"><a href="#"
                    class="sidebar-link text-white p-auto text-decoration-none px-3 py-2 d-block"><i
                        class="bi bi-speedometer2 pe-3"></i>Dashboard</a></li>
            <li class="list-group-item   border-0 p-0"><a href="#"
                    class="sidebar-link text-white p-auto text-decoration-none px-3 py-2 d-block">
                    <i class="bi bi-archive pe-3"></i>Archiving</a></li>
            <li class="list-group-item   border-0 p-0"><a href="#"
                    class="sidebar-link text-white p-auto text-decoration-none px-3 py-2 d-block">
                    <i class="bi bi-activity pe-3"></i>Monitoring</a></li>
            <li class="list-group-item   border-0 p-0"><a href="#"
                    class="sidebar-link text-white p-auto text-decoration-none px-3 py-2 d-block">
                    <i class="bi bi-send-plus pe-3"></i> Request</a></li>
            <li class="list-group-item   border-0 p-0"><a href="#"
                    class="sidebar-link text-white p-auto text-decoration-none px-3 py-2 d-block">
                    <i class="bi bi-ui-radios pe-3"></i>Control</a></li>
            <li class="list-group-item   border-0 p-0"><a href="#"
                    class="sidebar-link text-white p-auto text-decoration-none px-3 py-2 d-block">
                    <i class="bi bi-people pe-3"></i>User management</a>
            </li>
        </ul>
    </aside>
    <main class="col-10">
        <div class="cards-top d-flex p-3">
            <div class="storage card  col-3 px-4 py-3">
                <div class="h5">Storage</div>
                <div class="chart-size">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="files card col-3 px-4 py-3 ">
                <div class="card-label h5">Files <i class="bi bi-file-earmark-text-fill card-icon"></i></div>
                <div class="d-flex justify-content-between  my-auto">
                    <div>
                        <div class="number h4 ">1364</div>
                        <div>Total</div>
                    </div>
                    <div>
                        <div class="number h4 ">364</div>
                        <div>docx</div>
                    </div>
                    <div>
                        <div class="number h4 ">1000</div>
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
    </main>
</div>
<?php require_once APPROOT . "/views/includes/footer.php" ; ?>