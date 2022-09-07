<?php require_once(APPROOT."/includes/header.php")?>
<?php include_once(APPROOT . "/includes/homepage_header.php");?>
<div class="request-page bg-light p-3" style="height: 100vh;">

    <div class="d-flex justify-content-between align-items-center">
        <h4>Request History</h4>
    </div>

    <div class="my-request">
        <?php foreach($data["requests"] as $request) {?>
        <div class="card border p-3 mb-3">
            <span>Request id #: <span class="fw-bold"><?php echo $request->id?></span></span>
            <div>File Name: <?php echo $request->file_name?></div>
            <span>Status : <span
                    class="badge <?php if($request->status === "approved") {?> bg-success<?php } else {?> bg-warning <?php }?>"><?php echo $request->status?></span></span>
            <?php if($request->status === "approved") {?> <a
                href="<?php echo URLROOT?>/request/download?file=<?php echo $request->file_name?>"
                class="btn btn-sm btn-primary col-1 mt-3">Download</a> <?php }?>
        </div>
        <?php }?>

    </div>
</div>
<?php require_once(APPROOT."/includes/footer.php")?>