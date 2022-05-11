<?php require_once APPROOT . "/views/includes/header.php" ; ?>
<div class="d-flex">
    <?php require_once APPROOT . "/views/includes/dashboard-aside.php" ; ?>
    <div class="col-10 p-3">
        <div class="d-flex">
            <div class="d-flex col-3">
                <img src="<?php echo URLROOT?>/images/1.png" width="40" height="40">
                <div class="col-6 ms-3">
                    <p class="h6 text-uppercase">Request Submitted</p>
                    <p class="small">You have submitted an SEDAMS request </p>
                    <p class="small">Date: 2022-05-05 17:13:46.618437</p>
                </div>
            </div>
            <div class="d-flex col-3">
                <img src="<?php echo URLROOT?>/images/2.png" width="40" height="40">
                <div class="col-6 ms-3">
                    <p class="h6 text-uppercase">Processing Request</p>
                    <p class="small">Your request is already in review</p>
                    <p class="small">Date: 2022-05-05 17:13:57.367411</p>
                </div>
            </div>
            <div class="d-flex col-3">
                <img src="<?php echo URLROOT?>/images/successful.png" width="40" height="40">
                <div class="col-6 ms-3">
                    <p class="h6 text-uppercase">Request Successfull</p>
                    <p class="small">Your request was successful</p>
                </div>
            </div>
            <div class="d-flex col-3">
                <img src="<?php echo URLROOT?>/images/4.png" width="40" height="40">
                <div class="col-6 ms-3">
                    <p class="h6 text-uppercase">Rate your Request</p>
                    <p class="small">How was your request?</p>
                </div>
            </div>
        </div>
        <div class="d-flex monitor-container">

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/includes/footer.php" ; ?>