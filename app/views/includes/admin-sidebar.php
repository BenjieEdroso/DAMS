<main class="d-flex  " >
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-success vh-100 " style="width: 220px;">
        <a href="<?php echo URLROOT?>/pages/admin"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <i class="bi bi-list"></i>
            <span class="fs-6 mx-2 fw-bold">DAMS</span>
            <img src="<?php echo URLROOT;?>/images/chmsc_logo.png" alt="chmsc logo" width="40" height="40">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="mb-1">
                <a href="<?php echo URLROOT?>/admin/dashboard"
                    <?php if("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] == URLROOT."/admin/dashboard"){?>class="btn btn-light text-start col-12"
                    <?php }?>class="btn btn-success col-12 text-start" aria-current="page">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-1">
                <a href="<?php echo URLROOT?>/admin/documents"
                    <?php if("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] == URLROOT."/admin/documents"){?>class="btn btn-light text-start col-12"
                    <?php }?>class="btn btn-success text-start col-12">
                    <i class="bi bi-file-richtext"></i>
                    Documents
                </a>
            </li>
            <li class="mb-1">
                <a href="<?php echo URLROOT?>/admin/archive"
                    <?php if("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] == URLROOT."/admin/archive"){?>class="btn btn-light text-start col-12"
                    <?php }?> class="btn btn-success text-start col-12">
                    <i class="bi bi-archive"></i>
                    Archive
                </a>
            </li>
            <li class="mb-1">
                <a href="<?php echo URLROOT?>/admin/monitor"
                    <?php if("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] == URLROOT."/admin/monitor"){?>class="btn btn-light text-start col-12"
                    <?php }?> class="btn btn-success text-start col-12">
                    <i class="bi bi-layers"></i>
                    Monitor
                </a>
            </li>
            <li class="mb-1">
                <a href="<?php echo URLROOT?>/admin/control"
                    <?php if("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] == URLROOT."/admin/control"){?>class="btn btn-light text-start col-12"
                    <?php }?> class="btn btn-success text-start col-12">
                    <i class="bi bi-ui-radios"></i>
                    Control
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>