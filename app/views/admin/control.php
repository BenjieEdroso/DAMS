<?php

require_once APPROOT . "/views/includes/header.php";

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  redirect("users/login");
}
?>
<?php require_once APPROOT . "/views/includes/admin-sidebar.php"; ?>
<div class="control">
    <div class="top-nav">
        <a href="#" class="share-files"> <i class="material-icons send-icon">send</i> Share files to</a>
        <form action="#" method="get">
            <div class="search-container">
                <i class="material-icons search-icon">search</i>
                <input type="text" name="search" id="search" class="search">
            </div>
        </form>
    </div>
    <div class="top-links top-links-control">
        <ul>
            <li><a href="#">Recent</a></li>
            <li><a href="#">All</a></li>
            <li><span>Sort by:</span>
                <select name="sort" id="sort">
                    <option value="#">Date</option>
                </select>
            </li>

        </ul>
    </div>
    <div class="control-cards">
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-word.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-pdf-box.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-word.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-pdf-box.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-word.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-pdf-box.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-word.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-pdf-box.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-word.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-pdf-box.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-word.png" alt="">
            </div>
        </div>
        <div class="control-card">
            <div class="card-text">
                <span class="card-title">OJT Application Form</span>
                <span class="card-shared">Share to: <span>Ms. Jane</span></span>
                <span class="card-office">Office: <span>OSA</span></span>
                <span class="card-access">Access until: <span>03/22/2022</span></span>
                <span class="card-control">User can: <select name="control" id="control">
                        <option value="Edit">Edit</option>
                    </select></span>
            </div>
            <div>
                <img src="<?php echo URLROOT?>/images/file-pdf-box.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/includes/admin-main-footer.php"; ?>
<?php require_once APPROOT . "/views/includes/footer.php"; ?>