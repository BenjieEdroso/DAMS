<?php

require_once APPROOT . "/views/includes/header.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  redirect("users/login");
}
?>

<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>
<div class="monitor">
    <div class="monitor-nav top-nav">
        <form action="#" method="get">
            <div class="search-container">
                <i class="material-icons search-icon">search</i>
                <input type="text" name="search" id="search" class="search">
            </div>
        </form>
    </div>
    <div class="monitor-main">
        <div class="top-links">
            <ul>
                <li><a href="#">All</a></li>
                <li><a href="#">Successful</a></li>
                <li><a href="#">Processing</a></li>
                <li><a href="#">Unsuccessful</a></li>
            </ul>
        </div>
        <div class="cards">
            <div class="card card-pending">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-pending">
                    Pending
                </span>
            </div>
            <div class="card card-inprogress">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-inprogress">
                    In progress
                </span>
            </div>
            <div class="card card-success">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-success">
                    Success
                </span>
            </div>
            <div class="card card-inprogress">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-inprogress">
                    In progress
                </span>
            </div>
            <div class="card card-success">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-success">
                    Success
                </span>
            </div>
            <div class="card card-pending">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-pending">
                    Pending
                </span>
            </div>
            <div class="card card-success">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-success">
                    Success
                </span>
            </div>
            <div class="card card-pending">
                <div class="card-title">
                    OJT-Form Application
                </div>
                <div class="requested-form">
                    Requested from: <span>OSA Office</span>
                </div>
                <div class="purpose">
                    Purpose: <span> OJT/Internship</span>
                </div>
                <div class="date-coverage">
                    Date Coverage: <span> 03/10/2022 - 03/12/2022</span>
                </div>
                <div class="tracking">
                    Tracking #: <span> 032123123</span>
                </div>
                <span class="status status-pending">
                    Pending
                </span>
            </div>

        </div>
    </div>
</div>
<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>