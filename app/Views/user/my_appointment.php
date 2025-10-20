<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>My Appointments</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">My Appointments</a></li>
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
                    <div class="tab-content" id="v-pills-tabContent" data-page="My Appointements">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <h2>You have booked total <?php echo $message; ?></h2>
                            <div class="personal_area">
                                <div class="personal_info">
                                    <div class="table-responsive">
                                        <table class='table table-default table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <td align="center" width="5%"><small>No</small></td>
                                                    <td align="center" width="30%"><small>Appointment Date</small></td>
                                                    <td align="center" width="15%"><small>Service Taken</small></td>
                                                    <td align="center" width="20%"><small>Booked On</small></td>
                                                    <td align="center" width="15%"><small>Status</small></td>
                                                    <td align="right" width="15%"><small>Amount</small></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total = 0;
                                                    if(!empty($appointments)) {
                                                        $no = 0;
                                                        foreach ($appointments as $val) {
                                                            $total = $total + $val['subTotal'];
                                                            if($val["carts"] > 0) {
                                                                $no++;
                                                ?>
                                                                <tr>
                                                                    <td align="center"><?php echo $val["status"] == 3 ? "<strike>" : ""; ?><small><?php echo $no; ?></small><?php echo $val["status"] == 3 ? "</strike>" : ""; ?></td>
                                                                    <td align="center">
                                                                        <?php echo $val["status"] == 3 ? "<strike>" : ""; ?><small>
                                                                            <?php echo date('d M, Y',strtotime($val['bookingDate'])); ?> (<?php echo date('l',strtotime($val['bookingDate']));?>)
                                                                        </small><?php echo $val["status"] == 3 ? "</strike>" : ""; ?>
                                                                    </td>
                                                                    <td align="center">
                                                                        <?php echo $val["status"] == 3 ? "<strike>" : ""; ?><small>
                                                                            <?php echo $val["carts"]; ?> 
                                                                            <a href="javascript:;" onclick="watch_cart(<?php echo $val['id']; ?>)">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        </small><?php echo $val["status"] == 3 ? "</strike>" : ""; ?>
                                                                    </td>
                                                                    <td align="center"><?php echo $val["status"] == 3 ? "<strike>" : ""; ?><small><?php echo date('d M, Y',strtotime($val['addedDate'])); ?></small><?php echo $val["status"] == 3 ? "</strike>" : ""; ?></td>
                                                                    <td align="center"><?php echo $val["status"] == 3 ? "<strike>" : ""; ?>
                                                                        <?php 
                                                                            switch($val["status"]) {
                                                                                case 1:
                                                                                    echo "<small>Booked</small>";
                                                                                    break;
    
                                                                                case 2:
                                                                                    echo "<small>Completed</small>";
                                                                                    break;
    
                                                                                case 3:
                                                                                    echo "<small>Cancelled</small>";
                                                                                    break;
                                                                            }
                                                                        ?><?php echo $val["status"] == 3 ? "</strike>" : ""; ?>
                                                                    </td>
                                                                    <td align="right"><?php echo $val["status"] == 3 ? "<strike>" : ""; ?><small><?php echo $currency." ".number_format($val['subTotal'],2); ?></small><?php echo $val["status"] == 3 ? "</strike>" : ""; ?></td>
                                                                </tr>
                                                <?php
                                                            }
                                                        }
                                                    } 
                                                ?>
                                                <tr>
                                                    <td colspan="5" align="right"><small>TOTAL</small></td>
                                                    <td align="right"><small><b><?php echo $currency." ".number_format($total,2); ?></b></small></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
    function watch_cart(appointment_id)
    {
        $.ajax({
            url: "<?php echo base_url('view-appointment') ?>",
            type: "POST",
            data: {appointment_id: appointment_id},
            beforeSend:function(){
                
            },
            success:function(response){
                if(response.status == 200) {
                    $("#viewAppointment .modal-body").html(response.html);
                    $("#viewAppointment").modal("show");
                }
            }
        })
    }
</script>
<?=$this->endSection()?>