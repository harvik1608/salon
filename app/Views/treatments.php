<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<style>
    .gallery_item {
        height: 250px !important;
    }
</style>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Treatments</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Treatments</a></li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery_page mt_95 xs_mt_45">
    <div class="container">
        <div class="row">
            <?php
                if($treatments) {
                    foreach($treatments as $treatment) {
            ?>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                            <div class="gallery_item">
                                <a class="" href="<?php echo base_url('treatment/'.$treatment['slug']); ?>">
                                    <img src="<?php echo $treatment['avatar']; ?>" alt="gallery1" class="img-fluid w-100">
                                    <div class="gal_img_overlay"><h4 class="treatment-name"><?php echo $treatment['name']; ?></h4></div>
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
<script type="text/javascript">
    var page_title = "Treatments";
</script>
<?=$this->endSection()?>