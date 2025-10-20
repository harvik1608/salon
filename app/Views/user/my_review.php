<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>My Review</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">My Review</a></li>
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
                            <h2>My Review</h2>
                            <div class="dashboard_c_password">
                                <div class="personal_info_edit">
                                    <form id="profileForm">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="personal_info_edit_single">
                                                    <label>Comment</label>
                                                    <textarea placeholder="Write your comment here..." name="comment" id="comment"><?php echo isset($data["comment"]) ? $data["comment"] : ''; ?></textarea>
                                                </div>
                                            </div>
                                            <center>
                                                <p class="review_star">
                                                    <?php
                                                        $rate = isset($data["star"]) ? $data["star"] : 0;
                                                        for($i = 1; $i <= 5; $i ++) {
                                                            if($i <= $rate) {
                                                                echo '<i class="fas fa-star filled-star" aria-hidden="true" data-no="'.$i.'"></i>';
                                                            } else {
                                                                echo '<i class="fas fa-star" aria-hidden="true" data-no="'.$i.'"></i>';
                                                            }
                                                        } 
                                                    ?>
                                                </p>
                                            </center>
                                            <br><br>
                                            <button type="submit" class="common_btn">Submit</button>
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
        $(".review_star i").click(function(){
            var html = "";
            for(let i = 1;i <= 5; i ++) {
                if(i <= parseInt($(this).attr("data-no"))) {
                    html += '<i class="fas fa-star filled-star" aria-hidden="false" data-no="'+i+'"></i>';
                } else {
                    html += '<i class="fas fa-star" aria-hidden="false" data-no="'+i+'"></i>';
                }
            }
            $(".review_star").html(html);
        });
        $("#profileForm").submit(function(e){
            e.preventDefault();

            if($.trim($("#comment").val()) == "") {
                show_toast("Oops!","Write your comment.");
            } else if($(".review_star i.filled-star").length == 0) {
                show_toast("Oops!","Give your rate");
            } else {
                $.ajax({
                    url: "<?php echo base_url('submit-review'); ?>",
                    type: "post",
                    data:{
                        comment: $("#comment").val(),
                        rate: $(".review_star i.filled-star").length 
                    },
                    beforeSend:function(){
                        $("#profileForm button[type=submit]").attr("disabled",true).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
                    },
                    success:function(response){
                        show_toast("Success!",response.message);
                        $("#profileForm button[type=submit]").attr("disabled",false).html('Submit');
                    }
                });
            }
        })
    });
</script>
<?=$this->endSection()?>