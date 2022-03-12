<?php

require_once APPROOT . "/views/includes/header.php";
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  redirect("users/login");
}

?>

<!-- <nav class="nav">
      <form action="<?php echo URLROOT; ?>/uploads/uploadFile" method="post" enctype="multipart/form-data" class="upload_form">
        <input type="file" name="file[]" id="file" multiple>
        <input type="submit" value="Upload"id="submit">
      </form>

      <a href="<?php echo URLROOT; ?>/users/signout" class="nav__signout">Sign out</a>
  </nav> -->
<!-- onkeyup="showResult(this.value)"  name="q" id="q"-->
<!-- <div class="flex">
    <aside class="sidebar">
    <form action="<?php echo URLROOT . "/files/search"; ?>" method="get" name="search_form" class="sidebar__form">
      <input type="text"    placeholder="Search" class="sidebar__search">
      <input type="submit" disabled class="sidebar__disabled">
    </form>
    <form action="<?php echo URLROOT; ?>/expiration/set_delete_time" method="get">
       <label for="expiration">Input how long a document should be archived.
        <input type="number" name="expiration" id="expiration" class="sidebar__expiration">
          <select name="expirationDate" id="expirationDate">
            <option value="Days">Day/s</option>
            <option value="Weeks">Week/s</option>
            <option value="Months">Month/s</option>
            <option value="Years">Year/s</option>
          </select>
      </label>
      <input type="submit" name="submit"  value ="Set" class="">
    </form>

  </aside>
  <main class="main">
     <?php if (!empty($data["upload_msg"])) { ?> <div class="alert alert-success alert-dis fade show" role="alert"><?php echo $data["upload_msg"]; ?></div> <?php } ?>
      <div class="file">
       <form action="<?php echo URLROOT; ?>/files/save" method="POST">
        <input type="hidden" name="file_name" value="<?php if (isset($data["file_name"])) {
                                                        echo $data["file_name"];
                                                      } else {
                                                        echo "";
                                                      } ?>">
        <input type="text" name="edited_name" id="edited_name" value="<?php if (isset($data["file_name"])) {
                                                                        echo str_replace(".pdf", "", $data["file_name"]);
                                                                      } else {
                                                                        echo "";
                                                                      } ?>">
        <input type="submit" value="Save">
       </form>
    
   
    
      </div>
  </main>
  </div> -->
<!-- <main class="">
  <aside class="vh-100 bg-dark text-light p-3" style="width:280px">
    <div class="d-flex align-items-center">
      <img src="<?php echo URLROOT; ?>/images/chmsc_logo.png" alt="chmsc logo" width="50" height="50">
      <h6 class="mx-2">Document Archiving and Monitoring System</h6>
    </div>
    <hr>
   
  </aside>
</main> -->

<div class="sidebar--flex">
    <aside class="sidebar">
        <div class="sidebar__logo">
            <img src="<?php echo URLROOT;?>/images/logo.png" alt="chmsc logo">
            <span class="sidebar__title">DAMS</span>
        </div>
        <ul class="sidebar__nav">
            <li><a href="<?php echo URLROOT ?>/admin/dashboard">Dashboard</a></li>
            <li><a href="<?php echo URLROOT ?>/admin/archive">Archiving</a></li>
            <li><a href="<?php echo URLROOT ?>/admin/monitor">Monitoring</a></li>
            <li><a href="<?php echo URLROOT ?>/admin/control">Control</a></li>
            <li><a href="<?php echo URLROOT ?>/admin/user">User Management</a></li>
        </ul>
    </aside>

    <main class="main">
        <div class="main__topCards">
            <div class="main__storage">
                <span class="main__storage--label">Storage</span>
                <div class="main__storage--container"><canvas id="myChart"></canvas></div>
                <span class="main__storage--used">Used Space <span> 39%</span></span>
                <span class="main__storage--left">Space Left <span>61%</span> </span>
            </div>

            <div class="main__files"> </div>
            <div class="main__users"> </div>
            <div class="main__offices"> </div>
        </div>
    </main>
</div>


<script>

</script>



<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>