<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>My Dashboard</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">My Dashboard</a></li>
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
                    <div class="tab-content" id="v-pills-tabContent" data-page="Personal Info">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <h2>Welcome <?php echo $customer['name']; ?>!</h2>
                            <div class="personal_area">
                                <div class="personal_info">
                                    <h4>Personal Information <a class="info_edit_btn">edit</a></h4>
                                    <ul class="personal_info_address">
                                        <li><span>Name:</span> <?php echo $customer['name']; ?></li>
                                        <li><span>email:</span> <?php echo $customer['email']; ?></li>
                                        <li><span>phone:</span> <?php echo $customer['phone']; ?></li>
                                    </ul>
                                </div>
                                <!-- <div class="personal_biography mt_50">
                                    <h2>Note</h2>
                                    <p>< ?php echo $customer['note']; ?></p>
                                </div> -->
                                <div class="personal_info_edit">
                                    <h4>Personal Information <a class="info_edit_cancel_btn">cancel</a></h4>
                                    <form id="profileForm">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="personal_info_edit_single">
                                                    <label>Name</label>
                                                    <input type="text" placeholder="Name" name="customer_name" id="customer_name" value="<?php echo $customer['name']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="personal_info_edit_single">
                                                    <label>Mobile No.</label>
                                                    <input type="number" placeholder="Mobile no." name="customer_phone" id="customer_phone" value="<?php echo $customer['phone']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="personal_info_edit_single">
                                                    <label>email</label>
                                                    <input type="text" placeholder="Email" name="customer_email" id="customer_email" value="<?php echo $customer['email']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="personal_info_edit_single">
                                                    <button type="submit" class="common_btn">save</button>
                                                </div>
                                            </div>
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
        $("#profileForm").submit(function(e){
            e.preventDefault();

            e.preventDefault();

            if($.trim($("#customer_name").val()) == "") {
                show_toast("Oops!","Enter your name");
            } else if($.trim($("#customer_email").val()) == "") {
                show_toast("Oops!","Enter your email");
            } else if($.trim($("#customer_phone").val()) == "") {
                show_toast("Oops!","Enter your mobile no.");
            } else {
                $.ajax({
                    url: "<?php echo base_url('edit-profile'); ?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend:function(){

                    },
                    success:function(response){
                        if(response.status == 200) {
                            show_toast("Success!",response.message);
                            setTimeout(function(){
                                window.location.reload();
                            },3000);
                        } else {
                            show_toast("Oops!",response.message);
                        }
                    }
                });
            }
        });
        $(".info_edit_btn").click(function(){
            $(".personal_info").hide();
            $(".personal_info_edit").show();
        });
        $(".info_edit_cancel_btn").click(function(){
            $(".personal_info").show();
            $(".personal_info_edit").hide();
        });
    });
</script>
<?=$this->endSection()?>