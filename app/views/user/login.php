<?php require_once(APPROOT."/includes/header.php")?>
<div class="d-flex justify-content-center align-items-center login bg-light">
    <form action="<?php echo URLROOT?>/users/login" class="col-3 border p-4 rounded" method="POST">
        <div class="mb-2">
            <h4>Log in</h4>
        </div>
        <div class="mb-2">
            <label class="form-label text-muted " for="email">Email address</label>
            <input type="email" id="email" class="form-control form-control-sm" name="email" />
        </div>
        <div class="mb-2">
            <label class="form-label text-muted " for="password">Password</label>
            <input type="password" id="password" class="form-control form-control-sm" name="password" />
        </div>
        <div>
            <button type="submit" class="btn btn-success btn-sm col-12 mt-3">Sign in</button>
        </div>
    </form>
</div>
<?php require_once(APPROOT . "/includes/footer.php");?>