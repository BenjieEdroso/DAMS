<?php require_once(APPROOT . "/includes/header.php");?>
<div class="doc bg-light" style="height: 100vh;">
    <?php include_once(APPROOT . "/includes/homepage_header.php");?>
    <div class="card rounded bg-white col-6 mx-auto p-3 position-absolute top-50 start-50 translate-middle">
        <span><?php echo $data->file_id?></span>
        <h4><?php echo $data->file_name;?></h4>
        <div><?php echo format_size($data->file_size)?></div>
        <div><?php echo $data->file_type?></div>
        <div><?php echo $data->file_date_uploaded?></div>
        <div><?php echo $data->file_date_modified?></div>
        <a href="<?php _if($data->status === "pending", "#", "http://localhost/DAMS/doc/request?id=$data->file_id");?>"
            class="btn btn-sm mt-3 btn-primary request-btn <?php if($data->status === "pending") { ?> btn-warning pe-none disabled  <?php }?> <?php if($data->status === "approved") {?> btn-success disabled pe-none<?php }?>"
            data-id="<?php echo $data->file_id?>"
            <?php if($data->status === "pending" || $data->status === "approved") {?> disabled
            <?php }?>><?php if($data->status === "pending") { ?>Pending<?php } elseif($data->status === "approved") {?>
            Approved <?php } else { ?> Request this file
            <?php }?>
        </a>
    </div>
</div>
<?php require_once(APPROOT . "/includes/footer.php");?>