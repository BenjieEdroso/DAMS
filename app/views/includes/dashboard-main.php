   <main class="tab-content col-10" id="v-pills-tabContent">
       <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-home-tab">
           <?php require_once APPROOT . "/views/includes/dashboard-content.php" ; ?>
       </div>
       <div class="tab-pane fade" id="v-pills-archiving" role="tabpanel" aria-labelledby="v-pills-profile-tab">
           <?php require_once APPROOT . "/views/includes/archiving-content.php" ; ?>
       </div>
       <div class="tab-pane fade" id="v-pills-monitoring" role="tabpanel" aria-labelledby="v-pills-monitoring-tab">
           <?php require_once APPROOT . "/views/includes/monitoring-content.php" ; ?>
       </div>
       <div class="tab-pane fade" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab">
           <?php require_once APPROOT . "/views/includes/request-content.php" ; ?>
       </div>
   </main>