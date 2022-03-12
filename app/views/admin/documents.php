<?php

require_once APPROOT . "/views/includes/header.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    redirect("users/login");
}

?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>
<?php require_once APPROOT . "/views/includes/admin-main.php"; ?>

<div class="container ">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Owner</th>
      <th scope="col">Last Modified</th>
      <th scope="col">Size</th>
    </tr>
  </thead>
  <tbody class="tableBody">
      <!-- <?php foreach($data as $file_dir) {?>
      <tr>
      <td><?php echo $file_dir?></td>  
      <td><?php echo $file_dir?></td>
      <td><?php echo $file_dir?></td>
      <td><?php echo $file_dir?></td>
    </tr>
    <?php }?> -->
  </tbody>
</table>



 





<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>