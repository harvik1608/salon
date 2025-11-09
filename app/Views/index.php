<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<style>
    .gallery_item {
        height: 250px !important;
    }
    .full-filled-star {
        color: #e8e8e8;
    }
</style>
<section class="banner">
    <div class="row banner_slider">
        <?php
            if(isset($company["banners"]) && !empty($company["banners"])) {
                foreach($company["banners"] as $row) {
        ?>
                    <div class="col-12">
                        <div class="single_slider" style="background: url(<?php echo $row['avatar']; ?>);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-md-8">
                                        <div class="single_slider_text wow fadeInUp" data-wow-duration="1s">
                                            <h5></h5>
                                            <h1>Welcome To <br><span><?php echo $company['company_name']; ?></span></h1>
                                            <p></p>
                                            <ul class="d-flex flex-wrap">
                                                <li>
                                                    <a class="common_btn" href="<?php echo base_url('treatments') ?>">Book Appointment</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            } 
        ?>
    </div>
</section>
<section class="gallery_page mt_115 xs_mt_70">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-10 m-auto wow fadeInUp" data-wow-duration="1s">
                <div class="section_heading mb_35">
                    <h5>Our Services</h5>
                    <h3>Explore Services</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                if(isset($company["groups"]) && !empty($company["groups"])) {
                    foreach($company["groups"] as $row) {
            ?>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                            <div class="gallery_item">
                                <a href="javascript:;" onclick="window.location.href='<?php echo base_url('treatment/'.$row['slug']); ?>'">
                                    <img src="<?php echo $row['avatar']; ?>" alt="gallery1" class="img-fluid w-100">
                                    <div class="gal_img_overlay">
                                        <h4><?php echo $row['name']; ?></h4>
                                        <!-- <p>Duis auteirure dolor in reprehenderit</p> -->
                                    </div>
                                    <!-- <span><i class="fas fa-eye"></i></span> -->
                                </a>
                            </div>
                        </div>
            <?php
                    }
                } 
            ?>
        </div>
    </div>
</section>
<!--<section class="gallery mt_85 xs_mt_35">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-5 col-md-10 col-lg-5 wow fadeInUp" data-wow-duration="1s">-->
<!--                <div class="section_heading heading_left mb_35 xs_mb_30">-->
<!--                    <h5>Our Gallery</h5>-->
<!--                    <h3>Let's See Our Gallery</h3>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-7 col-lg-7 wow fadeInUp" data-wow-duration="1s">-->
<!--                <div class="gallery_filter">-->
<!--                    <button class="active" type="button" data-filter="*">Show all</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row grid">-->
<!--            <?php-->
<!--                if(isset($company["groups"]) && !empty($company["groups"])) {-->
<!--                    foreach($company["groups"] as $row) {-->
<!--            ?>-->
<!--                        <div class="col-lg-4 col-sm-6 hair message wow fadeInUp" data-wow-duration="1s">-->
<!--                            <div class="gallery_item">-->
<!--                                <a class="venobox" data-gall="gallery01" href="<?php echo $row['avatar']; ?>">-->
<!--                                    <img src="<?php echo $row['avatar']; ?>" alt="gallery1" class="img-fluid w-100">-->
<!--                                    <div class="gal_img_overlay">-->
<!--                                        <h4><?php echo $row['name']; ?></h4>-->
<!--                                    </div>-->
<!--                                    <span><i class="fas fa-eye"></i></span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--            <?php-->
<!--                    } -->
<!--                }-->
<!--            ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="counter_section mt_105 xs_mt_55 " style="background: url(<?php echo base_url('public/frontend/images/counter_bg.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                <div class="single_counter">
                    <div class="single_counter_center">
                        <h2>
                            <span class="counter"><?php echo $company['total_treatment']; ?></span>
                        </h2>
                    </div>
                    <p>Service Groups</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                <div class="single_counter">
                    <div class="single_counter_center">
                        <h2>
                            <span class="counter"><?php echo $company['total_sub_treatment']; ?></span>
                        </h2>
                    </div>
                    <p>Services</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                <div class="single_counter">
                    <div class="single_counter_center">
                        <h2>
                            <span class="counter"><?php echo $company['total_staff']; ?></span>
                        </h2>
                    </div>
                    <p>Our Staffs</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                <div class="single_counter">
                    <div class="single_counter_center">
                        <h2>
                            <span class="counter"><?php echo $company['total_customer']; ?></span>
                        </h2>
                    </div>
                    <p>Happy Customers</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    if(isset($reviews["status"]) && $reviews["status"] == 200 && !empty($reviews["data"])) {
        foreach($reviews["data"] as $review) {
?> 
            <section class="testimonial mt_115 xs_mt_70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-md-10 m-auto wow fadeInUp" data-wow-duration="1s">
                            <div class="section_heading mb_35">
                                <h5>our testimonial</h5>
                                <h3>What Our Clients Says</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row testi_slider wow fadeInUp" data-wow-duration="1s">
                        <div class="col-xl-4">
                            <div class="single_testimonial">
                                <div class="single_testimonial_img">
                                    <img src="<?php echo base_url('public/frontend/images/default_review.jpg'); ?>" alt="client" class="img-fluid w-100">
                                </div>
                                <div class="single_testimonial_text">
                                    <p class="rating">
                                        <?php
                                            for($i = 1;$i <= 5; $i ++) {
                                                if($i <= $review['star']) {
                                                    echo '<i class="fas fa-star full-filled-star"></i>';
                                                } else {
                                                    echo '<i class="fas fa-star"></i>';
                                                }
                                            } 
                                        ?>
                                        <!-- <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i> -->
                                    </p>
                                    <p class="cliect_comment"><?php echo $review['comment']; ?></p>
                                    <h3 class="title"><?php echo $review['name']; ?></h3>
                                    <!-- <p class="designation">Sr. UX/UI Designer</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    } 
?>
<script type="text/javascript">
    var page_title = "Home";
</script>
<?=$this->endSection()?>