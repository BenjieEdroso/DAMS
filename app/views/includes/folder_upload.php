<form action="<?php echo URLROOT; ?>/archive/folder_upload" method="post" enctype="multipart/form-data" class="folderUploadForm" >
    <label for="folder" class="custom_link w-100 h-100 px-3 py-2">Folder Upload</label>
    <input type="file" class="opacity-0 position-absolute" name="folder[]" id="folder" webkitdirectory multiple directory="" >
    <input type="submit" value="submit" hidden>
</form>