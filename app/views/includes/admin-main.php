<div class="w-100 bg-light">
    <nav class="navbar navbar-expand-md navbar-light bg-white  mb-3 h-2 ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarCollapse">
                <?php if($_SERVER["REDIRECT_QUERY_STRING"] === 'url=admin/documents') {?>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <form action="<?php echo URLROOT;?>/files/upload_file" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="file" class="form-control" name="file[]" id="file" multiple>
                            <input type="submit" class="btn btn-outline-primary" value="Upload" id="submit">
                        </div>
                    </form>
                </ul>
                <?php };?>
                <?php if(isset($_SESSION["upload_msg"])){ ?>
                <div class="alert alert-success w-50 upload-alert" role="alert"
                    style="line-height: 15px; padding: 10px 15px; margin: 0 15px;">
                    <?php print_r($_SESSION["upload_msg"]);?>
                </div>
                <?php }?>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>