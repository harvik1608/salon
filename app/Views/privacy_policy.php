<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1><?php echo $title; ?></h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;"><?php echo $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about_page">
    <div class="about_page_welcome mt_60 xs_mt_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="about_page_welcome_text">
                        <?php echo $privacy_policy; ?>
                    </div>
                </div>
           	</div>
       	</div>
   	</div>
</section>
<script type="text/javascript">
    var page_title = "About Us";
</script>
<?=$this->endSection()?>