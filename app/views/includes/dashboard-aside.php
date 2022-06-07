     <aside class="sidebar p-3 vh-100 col-2 position-relative">
         <div class="d-flex align-items-center my-3">
             <img src="<?php echo URLROOT?>/images/chmsu-logo.png" width="80" height="80"
                 alt="Carlos Hilado Memorial State College">
             <div>
                 <h5 class="text-white m-0">DAMS</h5>
                 <p class="ms-2 small-text text-dark mb-1">Carlos Hilado Memorial State University</p>
                 <p class="ms-2 small-text m-0 text-secondary">SEDAMS</p>
             </div>
         </div>
         <ul class="nav flex-column ">
             <li><a class="btn col-12" href="<?php echo URLROOT?>/admin/dashboard">Dashboard</a></li>
             <li><a class="btn col-12 sidebar-archiving" href="<?php echo URLROOT?>/admin/archiving">Archiving</a></li>
             <li><a class="btn col-12" href="<?php echo URLROOT?>/admin/monitoring">Monitoring</a></li>
             <li><a class="btn col-12" href="<?php echo URLROOT?>/admin/request">Request</a></li>
             <li><a class="btn col-12" href="<?php echo URLROOT?>/admin/control">Control</a></li>
             <li><a class="btn col-12" href="<?php echo URLROOT?>/admin/usermanagement">User
                     Management</a>
             </li>
         </ul>
         <a href="<?php echo URLROOT?>/users/signout" class="btn text-white position-absolute bottom-0">Logout</a>
     </aside>