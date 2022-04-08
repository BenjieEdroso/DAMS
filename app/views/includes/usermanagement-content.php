<div class="d-flex mx-3 my-3 position-relative">
    <button class="btn btn-primary"><i class="bi bi-person-plus-fill me-2"></i>New User</button>
    <form action="#" method="get" class="col-4 ms-5">
        <div class="position-relative">
            <i class="bi bi-search position-absolute top-50 ms-4  translate-middle text-primary"></i>
            <input type="text" name="q" id="q" class="form-control rounded-pill ps-5 text-primary">
        </div>
    </form>
</div>
<div class="monitoring-main mx-3 my-5">
    <nav class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-recents-tab" data-bs-toggle="tab" href="#nav-recents" role="tab"
           aria-controls="nav-recents" aria-selected="true">Recent</a>
        <a class="nav-link" id="nav-alluser-tab" data-bs-toggle="tab" href="#nav-alluser" role="tab"
           aria-controls="nav-alluser" aria-selected="false">All</a>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-recents" role="tabpanel" aria-labelledby="nav-recents-tab">
            <div class="d-flex flex-wrap">
                <div class="card p-3">
                    <div class="d-flex">
                        <div>
                            <div class="h5">Jane Doe</div>
                            <div>Office: OSA</div>
                            <div>Birthday: June 30, 2000</div>
                            <div>Username: JDOSA312</div>
                        </div>
                        <div class="ms-5">
                            <img src="<?php echo URLROOT?>/images/profile.png" alt="profile-image" class="profile-image rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-alluser" role="tabpanel" aria-labelledby="nav-alluser-tab">
                <div>
                    <h1>All</h1>
                </div>
        </div>

    </div>
</div>