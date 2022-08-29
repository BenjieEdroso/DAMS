<?php require_once(APPROOT."/includes/header.php")?>
<div class="request-page">
    <h1>Your requests are</h1>
    <div class="my-request">
        <?php foreach($data["requests"] as $request) {?>
        <div class="card border p-3">
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