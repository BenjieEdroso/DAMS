   <main class="tab-content col-10" id="v-pills-tabContent">
       <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-home-tab">
           <?php require_once APPROOT . "/views/includes/dashboard-content.php" ; ?>
       </div>
       <div class="tab-pane fade" id="v-pills-archiving" role="tabpanel" aria-labelledby="v-pills-profile-tab">
           <div class="d-flex mx-3 my-3 position-relative">
               <form action="#" method="post" class="form col-3">
                   <input class="form-control text-primary" type="file" id="files" name="files[]" multiple>
               </form>
               <form action="#" method="get" class="col-4 ms-5">
                   <div class="position-relative">
                       <i class="bi bi-search position-absolute top-50 ms-4  translate-middle text-primary"></i>
                       <input type="text" name="q" id="q" class="form-control rounded-pill ps-5 text-primary">
                   </div>
               </form>
               <div class="dropdown position-absolute end-0">
                   <button class="rounded-circle px-2 py-1 settings text-primary" type="button" id="dropdownMenuButton"
                       data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="bi bi-gear"></i>
                   </button>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <li><a class="dropdown-item" href="#">Action</a></li>
                       <li><a class="dropdown-item" href="#">Another action</a></li>
                       <li><a class="dropdown-item" href="#">Something else here</a></li>
                   </ul>
               </div>
           </div>
           <div class="card mx-3 px-3">
               <table class="table ">
                   <thead>
                       <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Code</th>
                           <th scope="col">Name</th>
                           <th scope="col">Date uploaded</th>
                           <th scope="col">Date last modified</th>
                           <th scope="col">Date to expire</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <th scope="row">1</th>
                           <td>FORM-1</td>
                           <td>OJT-Appplication.docx</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                       </tr>
                       <tr>
                           <th scope="row">2</th>
                           <td>FORM-1</td>
                           <td>OJT-Appplication.docx</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                       </tr>
                       <tr>
                           <th scope="row">3</th>
                           <td>FORM-1</td>
                           <td>OJT-Appplication.docx</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                       </tr>
                       <tr>
                           <th scope="row">4</th>
                           <td>FORM-1</td>
                           <td>OJT-Appplication.docx</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                       </tr>
                       <tr>
                           <th scope="row">5</th>
                           <td>FORM-1</td>
                           <td>OJT-Appplication.docx</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                           <td>04/07/2022 13:00:00</td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>
       <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
           Lorem
           ipsum, dolor sit amet consectetur adipisicing elit. Repellat, dolores blanditiis labore praesentium sunt
           aperiam adipisci voluptatem minus tempore voluptatibus, aspernatur illum temporibus! Rem, quidem?
           Reiciendis
           ex explicabo perferendis nobis.</div>
       <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
           Lorem
           ipsum dolor sit amet consectetur adipisicing elit. Harum consectetur voluptates inventore adipisci
           quaerat
           asperiores ab blanditiis excepturi sunt, assumenda est ad voluptatum, iste provident?</div>
   </main>