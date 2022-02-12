<?php require_once APPROOT . "/views/includes/header.php"; ?>
<h1>Backup</h1>
<form action="<?php echo URLROOT; ?>/archive/backup_start" method="POST">
    <input type="text" name="backup" id="backup" hidden>
    <input type="submit" value="Backup">
</form>

<?php require_once APPROOT . "/views/includes/footer.php"; ?>