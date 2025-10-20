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
                        <h1>Sign In</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Sign In</a></li>
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
                    <h3>Login</h3>
                    <!-- <h5>Welcome Back !!</h5> -->
                    <form id="signInForm">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-user"></i></span>
                                    <input type="text" placeholder="Your Mobile No." name="username" id="username" />
                                </div>
                            </div>
                            <!--<div class="col-xl-12">-->
                            <!--    <div class="login_input">-->
                            <!--        <span><i class="fas fa-lock-alt"></i></span>-->
                            <!--        <input type="password" placeholder="Password" name="password" id="password" />-->
                            <!--        <span class="toggle-password" onclick="togglePassword('password')" style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%); cursor: pointer;"><i class="fas fa-eye" id="eye_icon"></i></span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-xl-12">-->
                            <!--    <div class="login_input">-->
                            <!--        <div class="form-check">-->
                            <!--            <a href="< ?php echo base_url('forgot-password'); ?>">Forgot Password?</a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-xl-12 mt-2">
                                <div class="login_input">
                                    <button type="submit" class="common_btn">Login</button>
                                </div>
                            </div>
                        </div>
                    </form><br>
                    <p>Don't have an account? <a href="<?php echo base_url('sign-up'); ?>">Create Account</a></p>
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

            if($.trim($("#username").val()) == "") {
                show_toast("Oops!","Enter mobile no.");
            } else if ($.trim($("#username").val()).length != 11) {
                show_toast("Oops!","Mobile no. must start with 0 and be 10 digits");
            } else {
                $.ajax({
                    url: "<?php echo base_url('submit-sign-in'); ?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#signInForm button[type=submit]").attr("disabled",true).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
                    },
                    success:function(response){
                        if(response.status == 200) {
                            window.location.href = "dashboard";
                        } else {
                            $("#signInForm button[type=submit]").attr("disabled",false).html('Click Here');
                            show_toast("Oops!",response.message);
                        }
                    }
                });
            }
        });
    });
</script>
<?=$this->endSection()?>