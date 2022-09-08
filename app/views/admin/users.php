<?php require_once(APPROOT . "/includes/header.php");?>
<div class="users d-flex bg-light" style="height: 100vh;">
    <?php include_once(APPROOT . "/includes/sidebar.php");?>
    <div class="p-3 w-100 h-100">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Users</h1>
            <?php include_once(APPROOT . "/includes/logout_button.php");?>
        </div>
        <div class="d-flex">
            <button class="btn btn-sm btn-primary" id="createUserBtn" data-bs-toggle="modal"
                data-bs-target="#createUserModal">Create user</button>
            <form id="searchUserForm" method="post" class="col-3 mx-3">
                <input type="text" name="keyword" id="keyword" class="form-control form-control-sm"
                    placeholder="Search user">
            </form>
        </div>

        <div class="users mt-3" style="max-height: calc(100vh - 160px); overflow-y:scroll;">
            <table class="table bg-white rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"># Of Request</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach($data as $user) {?>
                    <tr>
                        <td scope="row"><?php echo $user->user_id?></td>
                        <td><?php if(isset($user->request_count)) {echo $user->request_count;} else { echo "0"; };?>
                        </td>
                        <td><?php echo $user->firstname?></td>
                        <td><?php echo $user->lastname?></td>
                        <td><?php echo $user->email?></td>
                        <td>
                            <a href="<?php echo URLROOT?>/admin/edit_user?user_id=<?php echo $user->user_id?>"
                                class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo URLROOT?>/admin/confirm_delete?user_id=<?php echo $user->user_id?>"
                                id="deleteBtn" class="btn btn-sm btn-danger">Delete</a>
                            <a href="<?php echo URLROOT?>/admin/change_pass" class="btn btn-secondary btn-sm">Change
                                Password</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="createUserModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5>Insert new user</h5>
                        <button type="button" class="close btn btn-danger btn-sm"
                            data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo URLROOT?>/admin/create_user" method="post">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="firstname" id="firstname" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control form-control-sm ">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="usertype" hidden>User Type</label>
                                <input type="text" name="type" id="type" class="form-control form-control-sm"
                                    value="user" hidden>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-sm btn-secondary col-12">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(APPROOT . "/includes/footer.php");?>