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
                        <h1>Forgot Password</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Forgot Password</a></li>
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
                    <h3>Forgot Password</h3>
                    <!-- <h5>Welcome Back !!</h5> -->
                    <form id="signInForm">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-envelope"></i></span>
                                    <input type="text" placeholder="Enter email" name="username" id="username" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <div class="form-check">
                                        <a href="<?php echo base_url('sign-in'); ?>">Login?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <button type="submit" class="common_btn">Reset Password </button>
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

            if($.trim($("#username").val()) == "") {
                show_toast("Oops!","Please enter email");
            } else {
                $.ajax({
                    url: "<?php echo base_url('submit-forgot-password'); ?>",
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