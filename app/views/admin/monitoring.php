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
            <div class="col-6 d-flex flex-column msg-cont bg-light p-3 rounded-3">
                <div class="col-10 me-auto mb-5">
                    <p class="text-secondary small text-start"><span class="badge bg-secondary">Office</span> 05:23 PM,
                        May
                        06,
                        2022</p>

                    <div class="shadow-sm  msg-rec p-4 text-secondary bg-white">
                        <pre class="sb">May 5, 2022

Dear Glenn Simon Latonero,

Thank you for your request dated May 05, 2022 under Executive Order No. 2 (s. 2016) on Freedom of Information in the Executive Branch, for Digital copy of road crash/ related data sets from ONEISS.

We received your request on May 05, 2022 and will respond on or before May 26, 2022 05:13:46 PM, in accordance with the Executive Order's implementing rules and regulations.

Should you have any questions regarding your request, kindly contact me using the reply function on the eFOI portal at https://www.foi.gov.ph/requests/aglzfmVmb2ktcGhyHQsSB0NvbnRlbnQiEERPSC03MDE5NDkxMTE1MTUM, for request with ticket number #DOH-701949111515.

Thank you.

Respectfully,

FOI Receiving Officer
FOI Officer
</pre>
                    </div>
                </div>
                <div class="col-10 ms-auto">
                    <p class="text-secondary small text-end"><span class="badge bg-secondary">You</span> 05:23 PM, May
                        05,
                        2022</p>

                    <div class="shadow-sm msg p-4 text-white bg-primary">
                        <pre class="sb">Dear Glenn Simon Latonero
                        
Please be informed that we have endorsed your request to the Epidemiology Bureau for action. Kindly
await for their response, thank you
</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/includes/footer.php" ; ?>