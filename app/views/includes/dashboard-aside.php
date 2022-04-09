     <aside class="sidebar p-3 vh-100 col-2 position-relative">
         <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <a class="nav-link active text-white" id="v-pills-dashboard-tab" data-bs-toggle="pill"
                 href="dashboard#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i
                     class="bi bi-speedometer2 pe-3"></i>Dashboard</a>
             <a class="nav-link text-white" id="v-pills-archiving-tab" data-bs-toggle="pill"
                 href="archiving#v-pills-archiving" role="tab" aria-controls="v-pills-archiving" aria-selected="false">
                 <i class="bi bi-archive pe-3"></i>Archiving</a>
             <a class="nav-link text-white" id="v-pills-monitoring-tab" data-bs-toggle="pill" href="#v-pills-monitoring"
                 role="tab" aria-controls="v-pills-monitoring" aria-selected="false"> <i
                     class="bi bi-activity pe-3"></i>Monitoring</a>
             <a class="nav-link text-white" id="v-pills-request-tab" data-bs-toggle="pill" href="#v-pills-request"
                 role="tab" aria-controls="v-pills-request" aria-selected="false"> <i
                     class="bi bi-send-plus pe-3"></i>Request</a>
             <a class="nav-link text-white" id="v-pills-control-tab" data-bs-toggle="pill" href="#v-pills-control"
                 role="tab" aria-controls="v-pills-control" aria-selected="false"> <i
                     class="bi bi-ui-radios pe-3"></i>Control</a>
             <a class="nav-link text-white" id="v-pills-usermanagement-tab" data-bs-toggle="pill"
                 href="#v-pills-usermanagement" role="tab" aria-controls="v-pills-usermanagement" aria-selected="false">
                 <i class="bi bi-people pe-3"></i>User
                 management</a>
         </div>

         <a href="<?php echo URLROOT?>/users/signout" class="btn text-white position-absolute bottom-0">Logout</a>
     </aside>