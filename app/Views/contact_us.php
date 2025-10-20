<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>contact us</h1>
                        <ul>
                            <li><a href="#"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="#">contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact mt_95 xs_mt_45">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="contact_info">
                    <!-- <span></span> -->
                    <h3>Our Location</h3>
                    <p class="salon-address"><i class="fas fa-map-marker-alt"></i> <?php echo $company['company_address']; ?></p>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="contact_info">
                    <!-- <span></span> -->
                    <h3>Email Us</h3>
                    <p><i class="fas fa-envelope"></i> <?php echo $company['company_email']; ?></p>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="contact_info">
                    <!-- <span><i class="fas fa-phone-alt"></i></span> -->
                    <h3>Call Us</h3>
                    <p><i class="fas fa-phone-alt"></i> <?php echo $company['company_phone']; ?></p>
                </div>
            </div>
        </div>
        <div class="row mt_120 xs_mt_70">
            <div class="col-xl-5 wow fadeInUp" data-wow-duration="1s">
                <div class="contact_map">
                    <?php echo $company['google_map']; ?>
                </div>
            </div>
            <div class="col-lg-7 m-auto wow fadeInUp" data-wow-duration="1s">
                <form class="contact_form" id="contactForm" action="<?php echo base_url('submit-contact-form'); ?>">
                    <h2>Do You have Any Questions?</h2>
                    <div class="row">
                        <div class="col-xl-6">
                            <input type="text" placeholder="Your Name" id="name" name="name" />
                        </div>
                        <div class="col-xl-6">
                            <input type="number" placeholder="Your Phone" id="phone" name="phone" />
                        </div>
                        <div class="col-xl-12">
                            <input type="email" placeholder="Your Email" id="email" name="email" />
                        </div>
                        <div class="col-xl-12">
                            <textarea rows="7" placeholder="Write something Here" id="message" name="message"></textarea>
                            <button type="submit" class="common_btn">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var page_title = "Contact Us";
    $(document).ready(function(){
        $("#contactForm").submit(function(e){
            e.preventDefault();

            if($.trim($("#name").val()) == "") {
                show_toast("Oops!","Enter your name");
            } else if($.trim($("#phone").val()) == "") {
                show_toast("Oops!","Enter your phone");
            } else if($.trim($("#email").val()) == "") {
                show_toast("Oops!","Enter your email");
            } else if($.trim($("#message").val()) == "") {
                show_toast("Oops!","Please write something...");
            } else {
                $.ajax({
                    url: $("#contactForm").attr("action"),
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend:function(){
                        $("#contactForm button[type=submit]").attr("disabled",true).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
                    },
                    success:function(response){
                        if(response.status == 200) {
                            $("#name").val("");
                            $("#phone").val("");
                            $("#email").val("");
                            $("#message").val("");
                            show_toast("Success!",response.message);
                        } else {
                            show_toast("Oops!","Please try again later.");
                        }
                        $("#contactForm button[type=submit]").attr("disabled",false).html('Send Message');
                    }
                });
            }
        })
    });
</script>
<?=$this->endSection()?>