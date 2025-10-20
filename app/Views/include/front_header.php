<!DOCTYPE html>
<html lang="en">
	<?php
		$session = session();
		$company = company();
		if(isset($company["data"]) && isset($company["data"]["isActive"]) == 1)
		{
			$banner = isset($company["data"]["banners"]) && isset($company["data"]["banners"][0]["avatar"]) ? $company["data"]["banners"][0]["avatar"] : "";
	?>
			<head>
			    <meta charset="Utf-8">
			    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
			    <title><?php echo $company["data"]["company_name"]; ?></title>
			    <link rel="icon" type="image/png" href="<?php echo base_url('public/frontend/images/favicon.png'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/all.min.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.min.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/spacing.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/venobox.min.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/slick.css'); ?>">
			    <!--<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/pointer.css'); ?>">-->
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/animated_barfiller.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/nice-select.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/animate.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/style.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/responsive.css'); ?>">
			    <link rel="stylesheet" href="<?php echo base_url('public/frontend/toast/jquery.toast.css'); ?>">
			    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
			    <link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
				<style>
					body, .jq-toast-single h2, .jq-toast-single, .breadcrumb_text h1 {
						font-family: "Nunito", sans-serif !important;
						font-optical-sizing: auto;
						font-weight: 400;
						font-style: normal;
					}
					.ui-datepicker-month, .ui-datepicker-year, .ui-datepicker-week-end, .ui-state-default, .ui-datepicker-calendar span {
                        font-size: 14px !important;
                        font-family: "Nunito", serif !important;
                    }
					.single_categories h4 {
						font-size: 17px !important;
						text-align: center;
					}
					.topbar_left li p i, .topbar_left li a i, .main_menu .navbar-nav .nav-item .nav-link.active, .main_menu .menu_right li a, .single_slider_text h1 span, .section_heading h5, .main_menu .navbar-nav .nav-item:hover .nav-link {
						color: <?php echo $company["data"]["code"]; ?> !important;
					}
					.main_menu .menu_right li a,.gallery_filter button.active,.gallery_filter button {
						border: 1px solid <?php echo $company["data"]["code"]; ?> !important;
					}
					.single_categories, .section_heading h5::before, .section_heading h5::after, .gallery_filter button.active,.gallery_filter button, .single_counter_center h2,.single_counter_center::before,.single_counter_center::after,.single_team:hover .single_team_text,.single_testimonial,.footer_subscribe,.read_btn,.scroll_btn,.common_btn,.contact_info:hover {
						background: <?php echo $company["data"]["code"]; ?> !important;
					}
					.single_counter_center {
						border: 7px solid <?php echo $company["data"]["code"]; ?> !important;
					}
					.single_testimonial p{
						color: #ffffff !important;
					}
					.single_testimonial:hover .single_testimonial_img {
						border-color:<?php echo $company["data"]["code"]; ?> !important;
					}
					.breadcrumb_overlay {
						background: linear-gradient(180deg, <?php echo $company["data"]["code"]; ?> 0%, rgba(0, 38, 51, 0.6) 57.04%);
					}
					.contact_form input, .contact_form textarea {
						background: #efefef !important;
					}
					#staticBackdrop input,#bookAppointment input  {
						border: 2px solid #e8e8e8 !important;
					}
					#staticBackdrop .form-check {
				        float: right;
				    }
				    .topbar {
				    	background: <?php echo $company["data"]["code"]; ?> !important;
				    }
				    .gallery_item .gal_img_overlay {
				    	background: <?php echo $company["data"]["code"]; ?> !important;
				    }
				    .gallery_item .gal_img_overlay h4 {
				    	font-size: 20px !important;
				    }
				    .breadcrumb_text ul li a:active {
				    	color: <?php echo $company["data"]["code"]; ?> !important;
				    }
				    .empty_cart {
				    	width: 50% !important;
				    }
				    .filled-star, .gallery_item .venobox span, .footer_link p i, .breadcrumb_text ul li a, .breadcrumb_text ul li a::after  {
				    	color: <?php echo $company["data"]["code"]; ?> !important;
				    }
				    .jq-toast-single {
				    	width: 300px !important;
				    }
				    .navbar-brand img {
				    	width: 85% !important;
				    }
				    .main_menu .menu_right li a:hover {
				    	background: <?php echo $company["data"]["code"]; ?>;
    					color: #ffffff !important;
				    }
				    .footer_link p {
				    	text-transform: lowercase;
				    	margin-top: 15px;
				    }
				    .footer_link p a {
				    	color: #FFFFFF !important;
				    }
				    .accordion-button:not(.collapsed) {
				    	background-color: <?php echo $company["data"]["code"]; ?> !important;
				    }
				    .faq .accordion-body span {
				    	background-color: <?php echo $company["data"]["code"]; ?>;
					    padding: 10px;
					    font-size: 14px;
					    color: #ffffff !important;
					    border-left: none !important;
				    }
				    .sidebar_item h3::after {
				    	background: <?php echo $company["data"]["code"]; ?>;
				    }
				    .sidebar_category ul li a:hover {
				    	background: <?php echo $company["data"]["code"]; ?>;
				    }
				    #login_input {
				    	margin-top: 5px;
				    }
				    a[data-current="1"] {
				    	background: <?php echo $company["data"]["code"]; ?> !important;
				    	color: #FFFFFF !important;
				    }
				    .sidebar_category ul li a[data-current="1"] span, .sidebar_category ul li a::after {
				        color: #FFFFFF !important;
				    }
				    #footer-section-1,#footer-section-2,#footer-section-3 {
				        margin-top: 50px;
				    }
				    .dashboard_sidebar, .dashboard_sidebar .nav .nav-link span, .dashboard_sidebar .nav .nav-link::after, .personal_info, .personal_info_edit {
				        background: <?php echo $company["data"]["code"]; ?>;
				    }
				    .dashboard_sidebar .nav .nav-link span {
				        height: 50px;
				        left: -2px;
				    }
				    h4,.personal_info_edit label,.dashboard_sidebar h3, .personal_info h4, .personal_info li, .personal_info span, .personal_info table, .personal_info i, .personal_info .table-striped>tbody>tr:nth-of-type(odd)>* {
				        color: #FFFFFF !important;
				    }
				    .personal_info_edit {
				        /*background: <?php echo $company["data"]["code"]; ?>;*/
				    }
				    .personal_info_address li { 
				        text-transform: unset !important;
				    }
				    .personal_info h4 a, .personal_info_edit h4 a {
				        background: <?php echo $company["data"]["code"]; ?>;
				    }
				    .contact_info h3,.contact_info p {
				        color: #fff !important;
				    }
				    .contact_info span {
				        background: none;
				    }
				    .contact_info {
				        padding-top: 25px !important;
				        margin-top: 10px !important;
				        background: <?php echo $company["data"]["code"]; ?> !important;
				    }
				    .contact_form h2 {
				        margin-bottom: 0px;
				    }
				    .salon-address {
				    	font-size: 12px;
				    }
				    @media (max-width: 575.99px) {
				        .contact_form h2 {
				            margin-top: 25px;
				        }
				    }
				    .login_input .common_btn {
				    	background: #002633 !important;
				    	color: #fff !important;
				    }
				    @media (min-width: 576px) and (max-width: 767.99px) {
                        .main_menu .navbar-toggler {
                            background: <?php echo $company["data"]["code"]; ?>;
                        }
				    }
				    @media (min-width: 576px) and (max-width: 767.99px) {
                        .main_menu {
                            border-bottom: 1px solid <?php echo $company["data"]["code"]; ?>;
                        }
				    }
				    @media (max-width: 575.99px) {
                        .main_menu .navbar-toggler {
                            background: <?php echo $company["data"]["code"]; ?>;
                        }
				    }
				</style>
				<script src="<?php echo base_url('public/frontend/js/jquery-3.6.0.min.js'); ?>"></script>
				<script src="<?php echo base_url('public/frontend/toast/jquery.toast.js'); ?>"></script>
			</head>
			<body data-background="<?php echo $banner; ?>">
				<input type="hidden" id="salon_etime" value="<?php echo $company["data"]["company_etime"]; ?>" />
				<input type="hidden" id="salon_sunday_etime" value="<?php echo $company["data"]["company_sunday_etime"]; ?>" />
				<section class="topbar">
			        <div class="container">
			            <div class="row">
			                <div class="col-xl-12 col-lg-12">
			                    <ul class="topbar_left d-flex flex-wrap">
			                        <li><a href="https://www.google.com/maps/search/<?php echo urlencode($company['data']['company_address']); ?>" target="_blank"><p><i class="fas fa-map-marker-alt"></i> <?php echo $company["data"]["company_address"]; ?></p></a></li>
			                        <li><a href="mailto:<?php echo $company["data"]["company_email"]; ?>"><i class="fas fa-envelope"></i><?php echo $company["data"]["company_email"]; ?></a></li>
			                        <li><a href="tel:<?php echo $company["data"]["company_phone"]; ?>"><i class="fas fa-phone-alt"></i> <?php echo $company["data"]["company_phone"]; ?></a></li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			    </section>
			    <nav class="navbar navbar-expand-lg main_menu">
			        <div class="container">
			            <a class="navbar-brand" href="<?php echo base_url(); ?>">
			                <img src="<?php echo $company["data"]['company_logo']; ?>" alt="BonFax" class="img-fluid w-100">
			            </a>
			            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
			                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			                <i class="fal fa-bars menu_icom"></i>
			                <i class="fal fa-times menu_close"></i>
			            </button>
			            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			                <ul class="navbar-nav m-auto">
			                    <li class="nav-item">
			                        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
			                    </li>
			                    <li class="nav-item">
			                        <a class="nav-link" href="<?php echo base_url('about-us'); ?>">About Us</a>
			                    </li>
			                    <li class="nav-item">
			                        <a class="nav-link" href="<?php echo base_url('treatments'); ?>">Treatments</a>
			                    </li>
			                    <li class="nav-item">
			                        <a class="nav-link" href="<?php echo base_url('offers'); ?>">Offers</a>
			                    </li>
			                    <li class="nav-item">
			                        <a class="nav-link" href="<?php echo base_url('gallery'); ?>">Gallery</a>
			                    </li>
			                    <li class="nav-item">
			                        <a class="nav-link" href="<?php echo base_url('contact-us'); ?>">contact us</a>
			                    </li>
			                </ul>
			                <ul class="menu_right d-flex flex-wrap">
			                	<?php
			                		if($session->get('userdata')) {
			                			echo '<li><a class="reservation" href="'.base_url('dashboard').'">My Account</a></li>';
			                		} else {
			                			echo '<li><a class="reservation" href="'.base_url('sign-in').'">Sign In</a></li>';
			                		}
			                	?>
			                    <!-- <li><a href="dashboard.html"><i class="fas fa-user"></i></a></li> -->
			                </ul>
			            </div>
			        </div>
			    </nav>
			    <?php echo $this->renderSection('content'); ?>
			    <footer class="footer mt_180 xs_mt_130" style="background: url(<?php echo base_url('public/frontend/images/footer_bg.jpg'); ?>">
			        <div class="container">
			            <!--<div class="footer_subscribe">-->
			            <!--    <div class="row justify-content-between">-->
			            <!--        <div class="col-lg-5">-->
			            <!--            <div class="footer_subscribe_text">-->
			            <!--                <h4>Subscribe For Our Newslette</h4>-->
			            <!--                <p>Lorem ipsum dolor sit amet nibh saperet te pri at nam.</p>-->
			            <!--            </div>-->
			            <!--        </div>-->
			            <!--        <div class="col-lg-7">-->
			            <!--            <div class="footer_subscribe_form">-->
			            <!--                <form>-->
			            <!--                    <input type="text" placeholder="Subscribe">-->
			            <!--                    <button type="submit" class="read_btn">Subscribe</button>-->
			            <!--                </form>-->
			            <!--            </div>-->
			            <!--        </div>-->
			            <!--    </div>-->
			            <!--</div>-->
			            <div class="row mt_20 xs_mt_10 pb_80 xs_pb_35 md_padding justify-content-between">
			            	<div class="col-xl-4 col-sm-6 col-md-4 col-lg-2 order-md-4" id="footer-section-1">
			                    <div class="footer_link">
			                        <h4>Working Hours</h4>
			                        <ul>
			                        	<li><a href="javascript:;">Monday To Saturday</a></li>
			                        	<li><a href="javascript:;"><?php echo date('h:i A',strtotime($company["data"]['company_stime']))." To ".date('h:i A',strtotime($company["data"]['company_etime'])); ?></a></li>
			                        	<li><a href="javascript:;">Sunday</a></li>
			                        	<li><a href="javascript:;"><?php echo date('h:i A',strtotime($company["data"]['company_sunday_stime']))." To ".date('h:i A',strtotime($company["data"]['company_sunday_etime'])); ?></a></li>
			                        </ul>
			                    </div>
			                </div>
			                <div class="col-xl-4 col-sm-6 col-md-4 col-lg-2 order-md-4" id="footer-section-2">
			                    <div class="footer_link">
			                        <h4>Useful Link</h4>
			                        <ul>
			                            <li><a href="<?php echo base_url('about-us'); ?>">About Us</a></li>
			                            <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
			                            <li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
			                            <li><a href="<?php echo base_url('parking-instructions'); ?>">Parking Instructions</a></li>
			                        </ul>
			                    </div>
			                </div>
			                <div class="col-xl-4 col-md-6 col-lg-4 order-lg-4" id="footer-section-3">
			                    <div class="footer_link">
			                        <h4>Contact Us</h4>
			                        <p><i class="fas fa-phone-alt"></i> <a href="tel:<?php echo $company["data"]["company_phone"]; ?>"><i class="fas fa-phone-alt"></i> <?php echo $company["data"]["company_phone"]; ?></a></p>
			                        <p><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $company["data"]["company_email"]; ?>"><i class="fas fa-envelope"></i><?php echo $company["data"]["company_email"]; ?></a></p>
			                        <p><i class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/search/<?php echo urlencode($company['data']['company_address']); ?>" target="_blank"><?php echo $company["data"]["company_address"]; ?></a></p>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <hr>
			        <!--<div class="container">-->
			        <!--    <div class="row">-->
			        <!--        <div class="col-12">-->
			        <!--            <div class="footer_copyright">-->
			        <!--                <p>Design & Developed By <a>Henisha Infotech</a></p>-->
			        <!--            </div>-->
			        <!--        </div>-->
			        <!--    </div>-->
			        <!--</div>-->
			    </footer>
			    <div class="scroll_btn">
			        <span><i class="fas fa-arrow-alt-up"></i></span>
			    </div>
			    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		            <div class="modal-dialog modal-dialog-centered">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
		                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		                    </div>
		                    <div class="modal-body">
		                        <form class="reservation_form">
		                        	<div class="row">
			                            <div class="col-xl-12">
			                                <div class="login_input">
			                                    <span><i class="fas fa-user"></i></span>
			                                    <input type="text" placeholder="Your Mobile No." name="username" id="modal_username" />
			                                </div>
			                            </div>
			               <!--             <div class="col-xl-12">-->
			               <!--                 <div class="login_input">-->
			               <!--                     <span><i class="fas fa-lock-alt"></i></span>-->
			               <!--                     <input type="password" placeholder="Password" name="password" id="modal_password" />-->
			               <!--                     <span class="toggle-password" onclick="togglePassword('modal_password')" style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%); cursor: pointer;">-->
										        <!--    <i class="fas fa-eye" id="eye_icon"></i>-->
										        <!--</span>-->
			               <!--                 </div>-->
			               <!--             </div>-->
			                            <!--<div class="col-xl-12">-->
			                            <!--    <div class="login_input">-->
			                            <!--        <div class="form-check">-->
			                            <!--            <a href="< ?php echo base_url('forgot-password'); ?>">Forgot Password?</a>-->
			                            <!--        </div>-->
			                            <!--    </div>-->
			                            <!--</div>-->
			                            <div class="col-xl-12">
			                                <div class="login_input" id="login_input">
			                                    <button type="submit" class="common_btn">Login </button>
			                                </div>
			                            </div>
			                        </div>
		                        </form><br>
		                        <center><p>Don't have an account? <a href="<?php echo base_url('sign-up'); ?>">Create Account</a></p></center>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="modal fade" id="dateAppointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		            <div class="modal-dialog modal-dialog-centered">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Appointment Date</h1>
		                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		                    </div>
		                    <div class="modal-body">
		                        <form class="reservation_form" action="<?php echo base_url('check-appointment-date') ?>">
		                        	<div class='row'>
										<div class="col-xl-12">
											<label><small>Date*</small></label>
						                    <input type="text" name="booking_date" id="booking_date" class="form-control" autocomplete="off" />
						                </div>
						           	</div>
						           	<div class='row'>
							           	<div class="col-xl-12">
							                <div class="login_input">
							                    <button type="submit" class="common_btn">Continue </button>
							                </div>
							            </div>
							       	</div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="modal fade" id="bookAppointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		            <div class="modal-dialog modal-dialog-centered modal-lg">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Appointment</h1>
		                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		                    </div>
		                    <div class="modal-body">
		                        <form class="reservation_form" action="<?php echo base_url('book-appointment') ?>">
		                        	
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="modal fade" id="viewAppointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		            <div class="modal-dialog modal-dialog-centered modal-lg">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Appointment</h1>
		                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		                    </div>
		                    <div class="modal-body">
		                        
		                    </div>
		                </div>
		            </div>
		        </div>
			    <script src="<?php echo base_url('public/frontend/js/bootstrap.bundle.min.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/Font-Awesome.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/venobox.min.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/slick.min.js'); ?>"></script>
			    <!--<script src="<?php echo base_url('public/frontend/js/pointer.js'); ?>"></script>			    -->
			    <script src="<?php echo base_url('public/frontend/js/isotope.pkgd.min.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/jquery.waypoints.min.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/jquery.countup.min.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/animated_barfiller.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/jquery.nice-select.min.js'); ?>"></script>			    
			    <script src="<?php echo base_url('public/frontend/js/sticky_sidebar.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/simplyCountdown.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/wow.min.js'); ?>"></script>
			    <script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
			    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			    <script type="text/javascript">
			    	$(document).ready(function(){
			    		// localStorage.removeItem('booking_date');

			    		if(page_title != "Home") {
			    			let banner = $("body").attr("data-background");
			    			$("section[class=breadcrumb_area]").css("background", "url(" + banner + ")");
			    		}

			    		$("#navbarNavAltMarkup ul li").each(function(){
			    			if($.trim($(this).find("a").text()) == page_title) {
			    				$(this).find("a").addClass("active");
			    			}
			    		});
			    		$("#v-pills-tab button").each(function(){
			    			if($.trim($(this).text()) == $.trim($("#v-pills-tabContent").attr("data-page"))) {
			    				$(this).addClass("active");
			    			}
			    		});
			    		$("#dateAppointment .reservation_form").submit(function(e){
			    			e.preventDefault();
			    			
				            if($.trim($("#booking_date").val()) == "") {
				                show_toast("Oops!","Choose your appointment date.");
				            } else {
				            	if(localStorage.getItem('key') === null) {
								    localStorage.setItem('booking_date', $("#booking_date").val());
								}
				                $("#dateAppointment").modal("hide");
				                fetch_services($("#current_service_group_id").val(),$("#current_service_group_nm").val());
				            }
				        });
			    		$("#staticBackdrop .reservation_form").submit(function(e){
				            e.preventDefault();

				            if($.trim($("#modal_username").val()) == "") {
				                show_toast("Oops!","Enter mobile no.");
				            } else if ($.trim($("#modal_username").val()).length != 11) {
				                show_toast("Oops!","Mobile number must start with 0 and be 10 digits");
				            } else {
				                $.ajax({
				                    url: "<?php echo base_url('submit-sign-in'); ?>",
				                    type: "post",
				                    data: new FormData(this),
				                    processData: false,
				                    contentType: false,
				                    beforeSend:function(){

				                    },
				                    success:function(response){
				                        if(response.status == 200) {
				                            window.location.reload();
				                        } else {
				                            show_toast("Oops!",response.message);
				                        }
				                    }
				                });
				            }
				        });
				        $("#bookAppointment .reservation_form").submit(function(e){
				            e.preventDefault();
				            var isError = 1;
				            $("#cartTbl tbody tr").each(function(){
				            	if($(this).attr("data-final") == "yes") {
				            		isError = 0;
				            	}
				            });
				            if(isError == 0) {
				            	if($.trim($("#appointment_date").val()) == "") {
					                show_toast("Oops!","Choose appointment date.");
					            } else if($.trim($("#appointment_time").val()) == "") {
					                show_toast("Oops!","Choose appointment time.");
					            } else if($.trim($("#customer_name").val()) == "") {
					            	show_toast("Oops!","Enter your name");
					            } else if($.trim($("#customer_phone").val()) == "") {
					            	show_toast("Oops!","Enter your mobile no.");
					            } else if($.trim($("#customer_phone").val()).length != 11) {
					            	show_toast("Oops!","Mobile number must start with 0 and be 10 digits");
					            } else {
					            	if($("#available_staffs").val() != "") {
							            $.ajax({
						                    url: $("#bookAppointment .reservation_form").attr("action"),
						                    type: "post",
						                    data: new FormData(this),
						                    processData: false,
						                    contentType: false,
						                    beforeSend:function(){
						                    	$("#bookAppointment .reservation_form button[type=submit]").attr("disabled",true).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
						                    },
						                    success:function(response){
						                        if(response.status == 200) {
						                        	localStorage.removeItem('booking_date');
						                        	show_toast("Success!",response.message);
						                        	setTimeout(function(){
						                        		window.location.href = "<?php echo base_url('my-appointments') ?>";
						                        	},3000);
						                        } else {
						                        	$("#bookAppointment .reservation_form button[type=submit]").attr("disabled",false).html('Book');
						                        	show_toast("Oops!",response.message);
						                        }
						                    }
						                });
						          	} else {
						          		show_toast("Oops!","The chosen time is already booked.");
						          	}
					          	}
				            } else {
				            	if($.trim($("#appointment_date").val()) == "") {
				            		show_toast("Oops!","Choose appointment date.");
				            	} else {
				            		show_toast("Oops!","Sorry You can't procced.");
				            	}
				            }
				      	});
			    	});
			    	function show_toast(title,msg,hideAfter = 3000)
			    	{
			    		$.toast({
						    heading: title,
						    text: msg,
						    position: 'bottom-center',
						    stack: false,
						    hideAfter: hideAfter
						});
			    	}
			    	function togglePassword(element) {
					    const passwordInput = document.getElementById(element);
					    const eyeIcon = document.getElementById('eye_icon');
					    
					    if (passwordInput.type === "password") {
					        passwordInput.type = "text";
					        eyeIcon.classList.remove('fa-eye-slash');
					        eyeIcon.classList.add('fa-eye');
					    } else {
					        passwordInput.type = "password";
					        eyeIcon.classList.remove('fa-eye');
					        eyeIcon.classList.add('fa-eye-slash');
					    }
					}
			    </script>
			</body>
	<?php
		}
	?>
</html>