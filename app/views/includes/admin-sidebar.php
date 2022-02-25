<main class="d-flex">
    <div clas="d-flex flex-column border shadow vh-100" style="width:200px;">
       <div class="list-group">
               <a href="<?php echo URLROOT ?>/admin/dashboard"
                    <?php if ("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == URLROOT . "/admin/dashboard") { ?>class="list-group-item list-group-item-action border-0 active"
                    <?php } ?>class="list-group-item list-group-item-action border-0" aria-current="true">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
                <a href="<?php echo URLROOT ?>/admin/documents"
                    <?php if ("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == URLROOT . "/admin/documents") { ?>class="list-group-item list-group-item-action border-0 active"
                    <?php } ?>class="list-group-item list-group-item-action border-0">
                    <i class="bi bi-file-richtext"></i>
                    Documents
                </a>
                <a href="<?php echo URLROOT ?>/admin/archive"
                    <?php if ("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == URLROOT . "/admin/archive") { ?>class="list-group-item list-group-item-action border-0 active"
                    <?php } ?> class="list-group-item list-group-item-action border-0">
                    <i class="bi bi-archive"></i>
                    Archive
                </a>
                <a href="<?php echo URLROOT ?>/admin/monitor"
                    <?php if ("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == URLROOT . "/admin/monitor") { ?>class="list-group-item list-group-item-action border-0 active"
                    <?php } ?> class="list-group-item list-group-item-action border-0">
                    <i class="bi bi-layers"></i>
                    Monitor
                </a>
                <a href="<?php echo URLROOT ?>/admin/control"
                    <?php if ("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] == URLROOT . "/admin/control") { ?>class="list-group-item list-group-item-action border-0 active"
                    <?php } ?> class="list-group-item list-group-item-action border-0">
                    <i class="bi bi-ui-radios"></i>
                    Control
                </a>
          
        </div>
    </div>
