<?php require_once(APPROOT . "/includes/header.php");?>
<div class="requests d-flex bg-light">
    <?php include_once(APPROOT . "/includes/sidebar.php");?>

    <div class="h-full w-100 p-3">
        <div class="d-flex justify-content-between">
            <h3>Requests</h3>
            <div>
                <h6 class="d-inline me-3"><?php echo $_SESSION["user"];?></h6>
                <a href="<?php echo URLROOT?>/admin/logout" class="btn btn-sm btn-secondary">Logout</a>
            </div>
        </div>
        <div class="">
            <table class="table w-full mx-auto bg-white rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Status</th>
                        <th scope="col">File name</th>
                        <th scope="col">Requested by</th>
                        <th scope="col">Date requested</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $request) {?>
                    <tr>
                        <th scope="row"><?php echo $request->id?></th>
                        <td><span
                                class="alert p-1 fw-bold text-white text-size<?php if($request->status === "pending") { ?> bg-warning<?php }?>"><?php echo $request->status?></span>
                        </td>
                        <td><?php echo $request->file_name?></td>
                        <td><?php echo "$request->firstname $request->lastname"?></td>
                        <td><?php echo $request->date_requested?></td>
                        <td>
                            <div class="d-flex gap-3">
                                <form action="<?php echo URLROOT?>/request/approve" method="post">
                                    <input type="number" name="id" id="id" hidden value="<?php echo $request->id?>">
                                    <input type="text" name="status" id="status" hidden value="approved">
                                    <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                </form>
                                <form action="<?php echo URLROOT?>/request/refuse" method="post">
                                    <input type="number" name="id" id="id" hidden value="<?php echo $request->id?>">
                                    <input type="text" name="status" id="status" hidden value="refused">
                                    <button type="submit" class="btn btn-danger btn-sm">Refuse</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once(APPROOT . "/includes/footer.php");?>