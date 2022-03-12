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
            <li><a href="<?php echo URLROOT ?>/admin/user">User</a></li>
        </ul>
    </aside>

    <main class="main">
        <div class="main__topCards">
            <div class="storage">
                <span class="storage__label">Storage</span>
                <div class="storage__container"><canvas id="myChart"></canvas></div>
                <span class="storage__used">Used Space <span> 39%</span></span>
                <span class="storage__left">Space Left <span>61%</span> </span>
            </div>

            <div class="files">
                <span class="files__label">Files</span>
                <div class="files__flexCol">
                    <span class="files__totalFiles"><span>1364</span> Files</span>
                    <div class="files__flex">
                        <span class="files__docx">1000 <img src="<?php echo URLROOT;?>/public/images/word.png"
                                alt="word icon"> </span>
                        <span class="files__pdf">364 <img src="<?php echo URLROOT;?>/public/images/pdf.png"
                                alt="pdf icon"> </span>
                    </div>
                </div>
            </div>
            <div class="usersCard">
                <div class="usersCard__label">Users</div>
                <div class="usersCard--flex">
                    <div class="usersCard__icon">
                        <img src="<?php echo URLROOT;?>/public/images/user.png" alt="user icon">
                    </div>
                    <div class="usersCard__container">
                        <div class="usersCard__data"> <span>6</span> <span
                                class="usersCard__data--user">Faculties</span>
                        </div>
                        <div class="usersCard__data"> <span>5</span> <span class="usersCard__data--user">
                                Admins</span></div>
                        <div class="usersCard__data"> <span>16</span> <span
                                class="usersCard__data--user">Teachers</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="office">
                <div class="office__label">Office</div>
                <div class="office__flexCont">
                    <div class="office__flex">
                        <div class="office__icon">
                            <img src="<?php echo URLROOT;?>/public/images/office.png" alt="office icon">
                        </div>

                        <div class="office__data"><span class="office__data--number">13</span><span>Offices</span></div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>


<script>

</script>



<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>