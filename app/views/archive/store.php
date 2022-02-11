<?php require_once APPROOT . "/views/includes/header.php"; ?>
<form action="<?php echo URLROOT; ?>/archive/store_local" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" id="file" multiple>
    <input type="submit" value="Upload">
</form>

<?php print_r($data["upload_msg"]); ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>