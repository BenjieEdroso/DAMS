<?php require_once APPROOT . "/views/includes/header.php"; ?>
<ul>
    <?php foreach ($data as $file) { ?>
    <li><a
            href="<?php echo URLROOT; ?>/archive/download?file_name=<?php echo $file->file_name ?>"><?php echo $file->file_name; ?></a>
    </li>
    <?php } ?>
</ul>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>