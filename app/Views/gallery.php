<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<style>
    img {
        object-fit: revert !important;
    }
</style>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Gallery</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Gallery</a></li>
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
            	if($photos) {
            		foreach($photos as $photo) {
           	?>
           				<div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1s">
			                <div class="gallery_item">
			                    <a class="venobox" data-gall="gallery01" href="<?php echo $photo['name']; ?>">
			                        <img src="<?php echo $photo['name']; ?>" alt="gallery1" class="img-fluid w-100">
			                        <!-- <div class="gal_img_overlay">
			                            <h4>Faciale Massage</h4>
			                            <p>Duis auteirure dolor in reprehenderit</p>
			                        </div> -->
			                        <span><i class="fas fa-eye"></i></span>
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
    var page_title = "Gallery";
</script>
<?=$this->endSection()?>