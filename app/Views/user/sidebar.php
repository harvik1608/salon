<div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
    <div class="dashboard_sidebar" id="sticky_sidebar">
        <div class="dashboard_sidebar_img">
            <img src="<?php echo base_url('public/frontend/images/salon_user.png') ?>" alt="user" class="img-fluid w-100">
            <!-- <label for="upload"><i class="far fa-camera"></i></label>
            <input type="file" id="upload" hidden> -->
        </div>
        <h3><?php echo $customer['name']; ?></h3>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <button class="nav-link" id="v-pills-home-tab" onclick="window.location.href='<?php echo base_url('dashboard'); ?>'">
                <span><i class="fas fa-user"></i></span> Personal Info
            </button>
            <button class="nav-link" id="v-pills-profile-tab" onclick="window.location.href='<?php echo base_url('my-appointments'); ?>'">
                <span><i class="fas fa-heart"></i></span> My Appointements
            </button>
            <button class="nav-link" id="v-pills-messages-tab" onclick="window.location.href='<?php echo base_url('my-review'); ?>'">
                <span><i class="fas fa-star"></i></span> My Review
            </button>
            <button class="nav-link" id="v-pills-settings-tab" onclick="window.location.href='<?php echo base_url('change-password'); ?>'">
                <span><i class="fas fa-unlock-alt"></i></span> Change Password
            </button>
            <button type="button" onclick="window.location.href='<?php echo base_url('logout'); ?>'" class="nav-link">
                <span><i class="fas fa-sign-out-alt"></i></span> Logout
            </button>
        </div>
    </div>
</div>