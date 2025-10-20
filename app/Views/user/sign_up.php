<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<style>
    .form-check {
        float: right;
    }
    .login_area h3 {
        text-align: center;
    }
    form select {
        width: 100%;
        padding: 12px 68px;
        outline: none;
        resize: none;
        border: 1px solid #E4E7E9;
        border-radius: 3px;
        font-size: 16px;
        font-weight: 300;
        -webkit-border-radius: 3px;
    }
    .gender-section {
        float: left !important;
    }
    .gender-section:first-of-type {
        margin-left: 30%;
    }
    .gender-section:nth-of-type(2) {
        margin-left: 20px;
    }
    
    .login_area h3 {
        font-size: 30px !important;
    }
    /* Small laptops (screen width ≤ 1024px) */
    @media (max-width: 1024px) {
        .gender-section:first-of-type {
            margin-left: 25%;
        }
    }

    /* Tablets (screen width ≤ 768px) */
    @media (max-width: 768px) {
        .gender-section:first-of-type {
            margin-left: 25%;
        }
    }

    /* Mobile phones (screen width ≤ 480px) */
    @media (max-width: 480px) {
        .gender-section:first-of-type {
            margin-left: 25%;
        }
    }
</style>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Sign Up</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Sign Up</a></li>
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
                    <h3></h3>
                    <!-- <h5>Make Your account !!</h5> -->
                    <form id="signUpForm">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- <input type="radio" name="gender" id="gender" value="F" />Female -->
                                <div class="login_input">
                                    <div class="form-check gender-section">
                                        <input class="form-check-input" type="radio" value="F" name="gender" id="flexCheckDefault" checked />
                                        <label class="form-check-label" for="flexCheckDefault">Female</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="form-check gender-section">
                                        <input class="form-check-input" type="radio" value="M" name="gender" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Male</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-user"></i></span>
                                    <input type="text" placeholder="Enter name" name="name" id="name" autofocus />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-envelope"></i></span>
                                    <input type="text" placeholder="Enter email" name="email" id="email" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-mobile"></i></span>
                                    <input type="text" placeholder="Enter mobile" name="phone" id="phone" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <span><i class="fas fa-lock-alt"></i></span>
                                    <input type="password" placeholder="Enter password" name="password" id="password" />
                                    <span class="toggle-password" onclick="togglePassword('password')" style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%); cursor: pointer;"><i class="fas fa-eye-slash" id="eye_icon"></i></span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="login_input">
                                    <button type="submit" class="common_btn">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </form><br>
                    <p>Already have an account? <a href="<?php echo base_url('sign-in'); ?>">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var page_title = "";
    $(document).ready(function(){
        $(".login_area h3").html("Welcome to "+document.title);

        $("#signUpForm").submit(function(e){
            e.preventDefault();

            if($.trim($("#name").val()) == "") {
                show_toast("Oops!","Enter your name");
            } else if($.trim($("#phone").val()) == "") {
                show_toast("Oops!","Enter your mobile no.");
            } else if ($.trim($("#phone").val()).length != 11) {
                show_toast("Oops!","Mobile no. must start with 0 and be 10 digits");
            } else if($.trim($("#password").val()) == "") {
                show_toast("Oops!","Enter your password");
            } else if($.trim($("#password").val()).length < 6) {
                show_toast("Oops!","Password must be 6 characters long.");
            } else {
                $.ajax({
                    url: "<?php echo base_url('submit-sign-up'); ?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#signUpForm button[type=submit]").attr("disabled",true).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
                    },
                    success:function(response){
                        if(response.status == 200) {
                            window.location.href = "dashboard";
                        } else {
                            $("#signUpForm button[type=submit]").attr("disabled",false).html('Click Here');
                            show_toast("Oops!",response.message);
                        }
                    }
                });
            }
        });
    });
</script>
<?=$this->endSection()?>