<div class="w-100 bg-light " style="height: 100vh;">
    <nav class="navbar navbar-expand-md navbar-light bg-white  mb-3 h-2 ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarCollapse">
                <?php if ($_SERVER["REDIRECT_QUERY_STRING"] === 'url=admin/documents') { ?>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <form action="<?php echo URLROOT; ?>/documents/upload_file" method="post"
                        enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="file" class="form-control" name="file[]" id="file" multiple>
                            <input type="submit" class="btn btn-outline-primary" value="Upload" id="submit">
                        </div>
                    </form>
                </ul>
                <?php }; ?>



                <form action="<?php echo URLROOT; ?>/documents/search" method="post" id="search-form"
                    class="d-flex position-relative">
                    <input class="form-control me-2 position-relative" id="search-box" type="search" name="q"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="card position-absolute" style=" right: 10px; bottom: -100%;" id="results">
                    <div class="card-body">
                        <ul class="dataViewer">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>