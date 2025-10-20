<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<style>
    .offer_date {
        font-size: 13px;
        padding-left: 10px;
        padding-top: 5px;
        font-weight: bold;
    }
    .faq .accordion-body span {
        border-left: 5px solid #faa392;
        padding: 5px;
        margin: 10px;
        text-align: center;
        border-radius: 5px;
    }
</style>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Offers</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Offers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq xs_mt_70">
    <div class="container">
        <?php
            if($offers) {
                $no = 0;
                foreach($offers as $offer) {
                    $no++;
        ?>  
                    <div class="row xs_mt_45">
                        <div class="col-xl-12 col-lg-9 m-auto wow fadeInUp" data-wow-duration="1s">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo $no; ?>. <?php echo $offer['name']; ?> <small class="offer_date">(<?php echo date('d M, Y',strtotime($offer['sdate']))." To ".date('d M, Y',strtotime($offer['edate'])); ?>)</small>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Book your appointment between <?php echo date('d M, Y',strtotime($offer['sdate']))." To ".date('d M, Y',strtotime($offer['edate'])); ?> to get <b><?php echo $offer['percentage']; ?>%</b> discount on below services.</p><br>
                                            <table width="100%">
                                                <tbody>
                                                    <?php
                                                        foreach ($offer['service_groups'] as $group) {
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <?php 
                                                                        echo "<b>".strtoupper($group['name'])."</b>"; 
                                                                        if (isset($offer['formatted'][$group['id']])) {
                                                                            echo '<table width="100%"><tbody>';
                                                                            foreach ($offer['formatted'][$group['id']] as $sub) {
                                                    ?>
                                                                                <tr>
                                                                                    <td style="padding-left: 20px;"><small>=> <?php  echo $sub['name']; ?></small></td>
                                                                                </tr>
                                                    <?php
                                                                            }
                                                                            echo '</tbody></table>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        } 
                                                    ?>
                                                </tbody>
                                            </table>
                                            <br><br>
                                            <a class="read_btn" href="<?php echo base_url('treatments'); ?>">Book Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            } else {
        ?>
                <section class="gallery_page mt_115 xs_mt_70">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-10 m-auto wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                                <div class="section_heading mb_35">
                                    <h3>No any offer available.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <?php
            }
        ?>
    </div>
</section>

<script type="text/javascript">
    var page_title = "Offers";
</script>
<?=$this->endSection()?>