<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
</head>

<body>
    <span><?php echo $data->file_id?></span>
    <h4><?php echo $data->file_name;?></h4>
    <div><?php echo format_size($data->file_size)?></div>
    <div><?php echo $data->file_type?></div>
    <div><?php echo $data->file_date_uploaded?></div>
    <div><?php echo $data->file_date_modified?></div>
    <a href="<?php _if($data->status === "pending", "#", "http://localhost/DAMS/doc/request?id=$data->file_id");?>"
        class="btn btn-sm btn-primary request-btn <?php if($data->status === "pending") { ?> btn-warning pe-none disabled  <?php }?> <?php if($data->status === "approved") {?> btn-success disabled pe-none<?php }?>"
        data-id="<?php echo $data->file_id?>" <?php if($data->status === "pending" || $data->status === "approved") {?>
        disabled
        <?php }?>><?php if($data->status === "pending") { ?>Pending<?php } elseif($data->status === "approved") {?>
        Approved <?php } else { ?> Request this file
        <?php }?>
    </a>


    <script src="<?php echo URLROOT?>/js/jquery.min.js"></script>
    <script src="<?php echo URLROOT?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT?>/js/main.js"></script>
</body>

</html>