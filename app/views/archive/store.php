<?php require_once APPROOT . "/views/includes/header.php"; ?>
<form action="<?php echo URLROOT; ?>/archive/store_file" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" id="file" multiple>
    <input type="submit" value="Upload">
</form>
<label for="sort">Sort by: </label>
<form action="<?php echo URLROOT; ?>/archive/sort" id="sortForm" method="POST">
    <select name="sort" id="sort" value="Sort By:">
        <option value="alpha" selected>Name</option>
        <option value="id">ID</option>
        <option value="date">Upload Date</option>
    </select>

    <input type="submit" value="Submit" hidden>
</form>
<?php echo $data["upload_msg"]; ?>
<ul>
    <?php foreach ($data as $file) { ?>
    <li class="list-item">
        <?php echo $file->file_id . $file->file_name . $file->file_tmpName . $file->file_error . $file->file_size . $file->file_date ?>
    </li>
    <?php } ?>
</ul>







<?php require_once APPROOT . "/views/includes/footer.php"; ?>