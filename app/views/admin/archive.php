<?php require_once(APPROOT . "/includes/header.php");?>
<h1>Archive</h1>
<form method="get" id="searchArchive">
    <div class="input-group mb-3 input-group-sm">
        <input type="text" class="form-control form-control-sm" placeholder="Search a document"
            aria-label="Search a document" aria-describedby="basic-addon2" id="searchField">
    </div>
</form>
<div id="archiveTable">
    <table class="table archive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">File Name</th>
                <th scope="col">File Type</th>
                <th scope="col">File Temp Name</th>
                <th scope="col">File Error</th>
                <th scope="col">File Size</th>
                <th scope="col">File Date Upload</th>
                <th scope="col">File Date Modified</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php foreach($data as $archive) {?>
            <tr class="result-row">
                <th scope="row"><?php echo $archive->file_id?></th>
                <td class="overflow-hidden custom-text" style="width: 275.13px;">
                    <?php echo $archive->file_name?></td>
                <td class="overflow-hidden"><?php echo $archive->file_type?></td>
                <td class="overflow-hidden"><?php echo $archive->file_tmp_name?></td>
                <td class="overflow-hidden"><?php echo $archive->file_error?></td>
                <td class="overflow-hidden"><?php echo $archive->file_size?></td>
                <td class="overflow-hidden"><?php echo $archive->file_date_uploaded?></td>
                <td class="overflow-hidden"><?php echo $archive->file_date_modified?></td>
            </tr>
            <?php }?>

        </tbody>
    </table>


</div>

<?php require_once(APPROOT . "/includes/footer.php");?>