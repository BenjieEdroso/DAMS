<div class="w-100 bg-light " style="height: 100vh;">
    <nav class="navbar navbar-expand-md navbar-light bg-white  mb-3 h-2 ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarCollapse">
                <?php if ($_SERVER["REDIRECT_QUERY_STRING"] === 'url=admin/documents') { ?>
                <ul class="navbar-nav w-100 me-auto mb-2 mb-md-0 d-flex justify-content-between">
                    <button class="btn btn-primary new position-relative"><i class="bi bi-plus-square"></i></button>
                    <ul class="list-group newItemList position-absolute ms-5 col-2">
                        <button type="button" class="list-group-item list-group-item-action createNewFolderBtn">Folder</button>
                        <button type="button" class="p-0 list-group-item list-group-item-action fileUploadBtn pe-auto" >
                        <form action="<?php echo URLROOT; ?>/archive/file_upload" method="post"
                        enctype="multipart/form-data" class="fileUploadForm" >
                            <input type="file"  name="file[]" id="file" multiple  class="fileInput px-3 py-2  col-12">
                            <input type="submit" value="Upload"  class="position-absolute fileUploadSubmitBtn"   style="display:none; border: none; background: none;">
                        </form>
                        </button>
                        <button type="button" class="p-0 list-group-item list-group-item-action folderUploadBtn">
                        <form action="<?php echo URLROOT; ?>/archive/folder_upload" method="post"
                        enctype="multipart/form-data" class="folderUploadForm"  >
                            <input type="file"  name="folder[]" id="folder" webkitdirectory multiple class="folderInput px-3 py-2  col-12" >
                            <input type="submit" value="Upload" class="position-absolute folderUploadSubmitBtn" style="display:none; border: none; background: none;">    
                        </form>
                        </button>
                    </ul>

                   

                   

                    <form action="<?php  echo URLROOT;?>/archive/create_folder" method="post" class="createNewFolder card p-3 position-absolute ms-5">
                        <div class="fw-bold mb-3">
                            <label for="folderName" class="mb-2">New folder</label>
                            <input type="text" name="folderName" id="folderName" class="form-control">
                        </div>

                        <div class="input-group">
                            <button type="button" class="newFolderCancelBtn btn btn-secondary me-3">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>

                    <!-- <form action="<?php echo URLROOT; ?>/archive/archive_file" method="post"
                        enctype="multipart/form-data" >
                        <div class="col-6 mb-3" >
                            <div class="input-group">
                            <label for="folderName" class="input-group-text">Upload to</label>
                            <select name="folderName" id="folderName" class="form-select ">
                                <option selected value="#" id="#">Option1</option>
                                <option value="#" id="#">Option2</option>
                            </select>
                            </div>
                        </div> 
                        <div class="">
                        <div class="input-group">
                            <input type="file" class="form-control" name="file[]" id="file" multiple>
                            <input type="submit" class="btn btn-outline-primary" value="Upload" id="submit">
                        </div>
                        </div>
                    </form>  -->

                    <a class="btn btn-primary mx-3" href="<?php echo URLROOT; ?>/documents/search">Search</a>
                </ul>
                <?php }; ?>




            </div>
        </div>
    </nav>