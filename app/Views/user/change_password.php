<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Change Password</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dashboard mt_120 xs_mt_70">
    <div class="container">
        <div class="row">
            <?= $this->include('user/sidebar') ?>
            <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                <div class="dashboard_content">
                    <div class="tab-content" id="v-pills-tabContent" data-page="Change Password">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">
                            <h2>Change Password</h2>
                            <div class="dashboard_c_password">
                                <div class="personal_info_edit">
                                    <form id="profileForm">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="personal_info_edit_single">
                                                    <label>current password</label>
                                                    <input type="password" placeholder="Current Password" name="old_password" id="old_password" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="personal_info_edit_single">
                                                    <label>new password</label>
                                                    <input type="password" placeholder="New Password" name="new_password" id="new_password" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="personal_info_edit_single">
                                                    <label>confirm password</label>
                                                    <input type="password" placeholder="Conform Password" name="confirm_password" id="confirm_password" />
                                                    <button type="submit" class="common_btn">save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var page_title = "";
    $(document).ready(function(){
        $("#profileForm").submit(function(e){
            e.preventDefault();

            e.preventDefault();

            if($.trim($("#old_password").val()) == "") {
                show_toast("Oops!","Enter your current password.");
            } else if($.trim($("#new_password").val()) == "") {
                show_toast("Oops!","Enter your new password.");
            } else if($.trim($("#confirm_password").val()) == "") {
                show_toast("Oops!","Enter your confirm password.");
            } else if($.trim($("#new_password").val()) != $.trim($("#confirm_password").val())) {
                show_toast("Oops!","New password & confirm password must be same.");
            } else {
                $.ajax({
                    url: "<?php echo base_url('update-password'); ?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend:function(){

                    },
                    success:function(response){
                        if(response.status == 200) {
                            show_toast("Success!",response.message);
                            $("#old_password,#new_password,#confirm_password").val("");
                        } else {
                            show_toast("Oops!",response.message);
                        }
                    }
                });
            }
        })
    });
</script>
<?=$this->endSection()?>