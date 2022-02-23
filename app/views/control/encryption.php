<?php require_once APPROOT . "/views/includes/header.php"; ?>
<div class="viewContent">
    <h1>Encryption</h1>
    <ul>

        <?php foreach ($data as $file) { ?>
        <li> <?php echo $file->file_id . $file->file_name . $file->file_tmpName . $file->file_error . $file->file_size . $file->file_date ?>
            <a href="<?php echo URLROOT ?>/control/encrypt_with_password?file_name=<?php echo $file->file_name ?>"
                class="encrypt-button">Encrypt
                with a password</a>
        </li>
        <?php }; ?>
    </ul>
</div>

<div class="myModal">
    <span class="close">Close</span>
    <form action="<?php echo URLROOT ?>/control/encryption" method="post">
        <div>
            <input type="text" name="file_name" id="file_name" hidden value="<?php echo $data["get_file_name"]; ?>">
        </div>

        <div>
            <label for="enc_pass">Password</label>
            <input type="password" name="enc_pass" id="enc_pass">
        </div>

        <div>
            <label for="enc_pass">Confirm Password</label>
            <input type="password" name="conf_enc_pass" id="conf_enc_pass">
        </div>

        <div>
            <input type="submit" value="Encrypt">
        </div>
    </form>



</div>

<?php require_once APPROOT . "/views/includes/footer.php"; ?>