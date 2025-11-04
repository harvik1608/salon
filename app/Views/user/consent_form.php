<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-signature/1.2.1/jquery.signature.css">
<style>
    .personal_info_edit_single label,p {
        color: #fff !important;
    }
    .common-btn {
        background: #0da2e2 !important;
    }
    .login_input input {
        padding: 0px;
    }
</style>
<section class="breadcrumb_area">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Consent Form</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="javascript:;">Consent Form</a></li>
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
                            <div class="personal_area">
                                <div class="personal_info">
                                    <form id="consentForm">
                                        <h4>Facial Treatment Client Information Form</h4>
                                        <div class="row mt-3">
                                            <div class="col-xl-4">
                                                <div class="personal_info_edit_single">
                                                    <label>Name</label>
                                                    <input type="text" placeholder="Name" name="customer_name" id="customer_name" value="<?php echo $customer['name']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="personal_info_edit_single">
                                                    <label>Phone</label>
                                                    <input type="number" placeholder="Mobile no." name="customer_phone" id="customer_phone" value="<?php echo $customer['phone']; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="personal_info_edit_single">
                                                    <label>Date</label>
                                                    <input type="date" name="consent_date" id="consent_date" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="personal_info_edit_single">
                                                    <label>Medical & Skin History<br><small>Please tick if you currently have or have had any of the following :</small></label>
                                                    <div class="login_input">
                                                        <div class="form-check gender-section">
                                                            <input class="form-check-input" type="checkbox" value="diabetes" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Diabetes</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="heart_condition" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Heart Condition</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="epilepsy" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Epilepsy</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="skin_disorder" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Skin Disorder <small>(e.g., eczema, psoriasis, dermatitis)</small></label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="active_acne_open_cuts" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Active Acne / Open Cuts</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="recent_surgery" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Recent Surgery <small>(last 6 months)</small></label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="retin_a" name="medical_skin[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Use of Retin-A / Accutane / Steroid Creams</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-3">
                                                <div class="personal_info_edit_single">
                                                    <label>Allergies (please list):</label>
                                                    <input type="text" name="allergies" id="allergies" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-3">
                                                <div class="personal_info_edit_single">
                                                    <label>Other:</label>
                                                    <input type="text" name="other" id="other" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="personal_info_edit_single">
                                                    <label>Have you had any facial treatments before?</label>
                                                    <div class="login_input">
                                                        <div class="form-check gender-section">
                                                            <input class="form-check-input" type="radio" value="Y" name="done_facial_treatment_before" />
                                                            <label class="form-check-label" for="flexCheckDefault">Yes</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="radio" value="N" name="done_facial_treatment_before" />
                                                            <label class="form-check-label" for="flexCheckDefault">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-3">
                                                <div class="personal_info_edit_single">
                                                    <label>If yes, when and what type?</label>
                                                    <input type="text" name="done_facial_treatment_before_comment" id="done_facial_treatment_before_comment" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-3">
                                                <div class="personal_info_edit_single">
                                                    <label>Current skincare products used</label>
                                                    <input type="text" name="current_skincare_product" id="current_skincare_product" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="personal_info_edit_single">
                                                    <label>Are you pregnant or breastfeeding?</label>
                                                    <div class="login_input">
                                                        <div class="form-check gender-section">
                                                            <input class="form-check-input" type="radio" value="Y" name="pregnant_breastfeeding" />
                                                            <label class="form-check-label" for="flexCheckDefault">Yes</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="radio" value="N" name="pregnant_breastfeeding" />
                                                            <label class="form-check-label" for="flexCheckDefault">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-3">
                                                <div class="personal_info_edit_single">
                                                    <label>Any current medication or supplements?</label>
                                                    <input type="text" name="current_medication" id="current_medication" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="personal_info_edit_single">
                                                    <label>Skin type (circle) :</small></label>
                                                    <div class="login_input">
                                                        <div class="form-check gender-section">
                                                            <input class="form-check-input" type="checkbox" value="dry" name="skin_type[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Dry</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="oily" name="skin_type[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Oily</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="combination" name="skin_type[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Combination</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="sensitive" name="skin_type[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Sensitive</label>
                                                        </div>
                                                        <div class="form-check gender-section mt-1">
                                                            <input class="form-check-input" type="checkbox" value="normal" name="skin_type[]" />
                                                            <label class="form-check-label" for="flexCheckDefault">Normal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="mt-5">Facial Treatment Consent & Agreement</h4>
                                            <p>I understand that facial treatments at Elsa Hair and Beauty are designed to improve the appearance and condition of the skin. Results may vary depending on my skin type and condition.</p>
                                            <p class="mt-2">I confirm that:</p>
                                            <ul type="disc">
                                                <li><small>-> I have disclosed all relevant medical and skin conditions.</small></li>
                                                <li><small>-> I understand the treatment process and possible side effects, such as redness, sensitivity, or mild irritation.</small></li>
                                                <li><small>-> I have been advised to follow the aftercare instructions provided.</small></li>
                                                <li><small>-> I agree that all payments made are non-refundable once the service has begun.</small></li>
                                                <li><small>-> I release Elsa Hair and Beauty and its staff from any liability for reactions that occur due to undisclosed conditions or failure to follow aftercare advice.</small></li>
                                            </ul>
                                            <p class="mt-4"><b>Aftercare Advice (for client to keep)</b></p>
                                            <ul type="disc">
                                                <li><small>-> Avoid makeup or exfoliating products for 24 hours.</small></li>
                                                <li><small>-> Keep skin hydrated and protected with SPF.</small></li>
                                                <li><small>-> Avoid direct sunlight, sauna, or steam for 48 hours.</small></li>
                                                <li><small>-> Use gentle cleansers and moisturizers</small></li>
                                            </ul>
                                            <p class="mt-4">Your signature :</p>
                                            <canvas id="signature" width="500" height="100" style="border: 2px solid #000; background:#fff;"></canvas>
                                            <br>
                                            <button id="clear" type="button">Clear</button>
                                            <p class="mt-2">Date: <?php echo date('d M, Y');?></p>
                                            <!-- <button id="save" type="button">Save</button> -->
                                            <img id="preview" style="display:none; margin-top:10px; border:1px solid #ccc; width:200px;">
                                            <div class="col-xl-12 mt-3">
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
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<script>
  const canvas = document.getElementById("signature");
  const signaturePad = new SignaturePad(canvas);

  function resizeCanvas() {
    // Fix scaling for high DPI displays
    const ratio = Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    signaturePad.clear();
  }

  window.addEventListener("resize", resizeCanvas);
  resizeCanvas(); // call once at load

  // Adjust offset manually (fixes misaligned drawing)
  canvas.addEventListener("mousedown", e => e.preventDefault());
  canvas.addEventListener("touchstart", e => e.preventDefault());

  document.getElementById("clear").addEventListener("click", () => {
    signaturePad.clear();
  });

  document.getElementById("save").addEventListener("click", () => {
    if (signaturePad.isEmpty()) {
      alert("Please provide a signature first.");
    } else {
      const dataURL = signaturePad.toDataURL();
      document.getElementById("preview").src = dataURL;
      document.getElementById("preview").style.display = "block";
    }
  });
</script>

<script type="text/javascript">
    var page_title = "";
    $(document).ready(function(){
        $("#consentForm").submit(function(e){
            e.preventDefault();

            if (signaturePad.isEmpty()) {
                show_toast("Oops!","Please provide a signature first.");
            } else {
                const form = e.target;
                const formData = new FormData(form);
                formData.append("signature", signaturePad.toDataURL("image/png")); // add signature
                $.ajax({
                    url: "<?php echo base_url('submit-consent-form'); ?>",
                    type: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend:function(){

                    },
                    success:function(response){
                        alert(response);
                        // if(response.status == 200) {
                        //     show_toast("Success!",response.message);
                        //     setTimeout(function(){
                        //         window.location.reload();
                        //     },3000);
                        // } else {
                        //     show_toast("Oops!",response.message);
                        // }
                    }
                });
            }

            // if($.trim($("#customer_name").val()) == "") {
            //     show_toast("Oops!","Enter your name");
            // } else if($.trim($("#customer_email").val()) == "") {
            //     show_toast("Oops!","Enter your email");
            // } else if($.trim($("#customer_phone").val()) == "") {
            //     show_toast("Oops!","Enter your mobile no.");
            // } else {
            //     $.ajax({
            //         url: "<?php echo base_url('edit-profile'); ?>",
            //         type: "post",
            //         data: new FormData(this),
            //         processData: false,
            //         contentType: false,
            //         beforeSend:function(){

            //         },
            //         success:function(response){
            //             if(response.status == 200) {
            //                 show_toast("Success!",response.message);
            //                 setTimeout(function(){
            //                     window.location.reload();
            //                 },3000);
            //             } else {
            //                 show_toast("Oops!",response.message);
            //             }
            //         }
            //     });
            // }
        });
    });
</script>
<?=$this->endSection()?>