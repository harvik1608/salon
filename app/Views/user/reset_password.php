<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<style>
    .form-check {
        float: right;
    }
</style>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Reset Password</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Reset Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="login mt_120 xs_mt_70">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 m-auto wow fadeInUp" data-wow-duration="1s">
                <div class="login_area">
                    <h3>Reset Password</h3>
                    <!-- <h5>Welcome Back !!</h5> -->
                    <form id="signInForm">
                        <input type="hidden" name="code" value="<?php echo $code; ?>" />
                        <div class="row">
                            <!--<div class="col-xl-12">-->
                            <!--    <div class="login_input">-->
                            <!--        <span><i class="fas fa-lock-alt"></i></span>-->
                            <!--        <input type="password" placeholder="Password" name="password" id="password" />-->
                            <!--        <span class="toggle-password" onclick="togglePassword('password')" style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%); cursor: pointer;"><i class="fas fa-eye" id="eye_icon"></i></span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-lock-alt"></i></span>
                                    <input type="password" placeholder="Enter new password" name="new_password" id="new_password" autocomplete="off" />
                                    <span class="toggle-password" onclick="togglePassword('new_password')" style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%); cursor: pointer;"><i class="fas fa-eye-slash" id="eye_icon"></i></span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-user"></i></span>
                                    <input type="password" placeholder="Enter confirm password" name="confirm_password" id="confirm_password" autocomplete="off" />
                                    <span class="toggle-password" onclick="togglePassword('confirm_password')" style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%); cursor: pointer;"><i class="fas fa-eye-slash" id="eye_icon"></i></span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <button type="submit" class="common_btn">Submit </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var page_title = "";
    $(document).ready(function(){
        $("#signInForm").submit(function(e){
            e.preventDefault();

            if($.trim($("#new_password").val()) == "") {
                show_toast("Oops!","Please enter new password");
            } else if($.trim($("#confirm_password").val()) == "") {
                show_toast("Oops!","Please enter confirm password");
            } else if($.trim($("#new_password").val()) != $.trim($("#confirm_password").val())) {
                show_toast("Oops!","New password & confirm password must be same.");
            } else {
                $.ajax({
                    url: "<?php echo base_url('submit-reset-password'); ?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#signInForm button[type=submit]").attr("disabled",true).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
                    },
                    success:function(response){
                        if(response.status == 200) {
                            show_toast("Success!",response.message);
                            setTimeout(function(){
                                window.location.href = "sign-in";
                            },3000);
                        } else {
                            $("#signInForm button[type=submit]").attr("disabled",false).html('Submit');
                            show_toast("Oops!",response.message);
                        }
                    }
                });
            }
        });
    });
</script>
<?=$this->endSection()?>