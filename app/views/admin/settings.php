<?php require_once APPROOT . "/views/includes/header.php"; ?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>

<form action="http://localhost/DAMS/admin/save_settings" method="post" class="w-100 position-relative p-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="encryption" role="switch" id="encryption"
            <?php if ($data["settings"] == "true") { ?> checked <?php }; ?> value="false">
        <label class="form-check-label" for="flexSwitchCheckChecked">Encrypt All Documents</label>
    </div>

    <input type="submit" class="btn btn-primary position-absolute" value="Save Settings" style="bottom: 1rem;">
</form>
<?php echo $data["settings"]; ?>
<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>