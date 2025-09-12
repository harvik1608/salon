<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/main.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/js-snackbar.css?v=1.3'); ?>" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/bootstrap_datetimepicker.css'); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <title>Beauty Parlour</title>
        <style>
            body, .app-header__logo {
                font-family: "Nunito", serif !important;
				font-weight: 400;
				font-style: normal;
            }
            .error {
                color: #FF0000 !important;
                font-weight: bold;
            }
            .btn .fa {
                margin-right: 0px !important;
            }
            .app-header, .app-header__logo {
                background-color: #736cc7;
            }
            .app-menu__item.active {
                border-left-color: #736cc7;
            }
            .app-menu__item:focus, .app-menu__item:hover {
                border-left-color: #736cc7 !important;
            }
            .app-sidebar__toggle:focus, .app-sidebar__toggle:hover {
                background-color: #736cc7;
            }
            .btn-success, .page-item.active .page-link, .badge-success, .btn-success:hover {
                background-color: #736cc7;
                border-color: #736cc7;
            }
            .form-control:focus {
                border-color: #736cc7;
            }
            .fa-edit {
                margin-right: 0px !important;
            }
            .fc-state-active {
                background-color: #736cc7;
            }
            .btn-primary {
                background-color: #736cc7;
                border-color: #736cc7;
            }
            .btn-primary:hover {
                background-color: #736cc7;
                border-color: #736cc7;
            }
            a {
                color: #736cc7;
            }
        </style>
        <script src="<?php echo base_url('public/admin/js/jquery-3.3.1.min.js'); ?>"></script>
    </head>
    <!-- sidenav-toggled -->
    <body class="app sidebar-mini ">
        <?php
            $session = session();
            $userdata = $session->get('userdata');
        ?>
        <header class="app-header">
            <a class="app-header__logo" href="javascript:;">
                <select class="form-control" name="global_company_id" id="global_company_id" style="margin-top: 6px;">
                    <?php
                        $companies = get_companies(); 
                        if(!empty($companies)) {
                            foreach($companies as $company) {
                                if($session->get('companyId') == $company['id']) {
                                    echo '<option value="'.$company['id'].'" selected>'.$company['company_name'].'</option>';
                                } else {
                                    echo '<option value="'.$company['id'].'">'.$company['company_name'].'</option>';
                                }
                            }
                        }
                    ?>
                </select>
            </a>
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <ul class="app-nav">
                <li class="dropdown"><br>
                    
                </li>
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                        <!-- <li><a class="dropdown-item" href="< ?php echo base_url('extra-info'); ?>"><i class="fa fa-user fa-lg"></i> Extra Info.</a></li> -->
                        <!-- <li><a class="dropdown-item" href="<?php echo base_url('change-password'); ?>"><i class="fa fa-user fa-lg"></i> Change Password</a></li> -->
                        <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </header>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <!-- <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"> -->
                <div>
                    <p class="app-sidebar__user-name"><?php echo$userdata['fname']." ".$userdata['lname']; ?></p>
                    <p class="app-sidebar__user-designation"><?php echo $userdata['email']; ?></p>
                </div>
            </div>
            <ul class="app-menu">
                <?php
                    if(check_permission("appointments")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('dashboard'); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label"><small>Dashboard</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("staffs")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('staffs'); ?>">
                                <i class="app-menu__icon fa fa-users"></i>
                                <span class="app-menu__label"><small>Staffs</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("staff_timing")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('staff_timings'); ?>">
                                <i class="app-menu__icon fa fa-clock-o"></i>
                                <span class="app-menu__label"><small>Staff Timings</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("groups")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('service_groups'); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label"><small>Service Groups</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("sub_services")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('services'); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label"><small>Services</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("customers")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('customers'); ?>">
                                <i class="app-menu__icon fa fa-users"></i>
                                <span class="app-menu__label"><small>Customers</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("payment_types")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('payment_types'); ?>">
                                <i class="app-menu__icon fa fa-dollar"></i>
                                <span class="app-menu__label"><small>Payment Types</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("discount_types")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('discount_types'); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label"><small>Discount Types</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("weekend_discount")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('discounts'); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label"><small>Weekday Discounts</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("daily_reports")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('daily-reports'); ?>">
                                <i class="app-menu__icon fa fa-dashboard"></i>
                                <span class="app-menu__label"><small>Daily Reports</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("gallery")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('photos'); ?>">
                                <i class="app-menu__icon fa fa-photo"></i>
                                <span class="app-menu__label"><small>Gallery</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("review")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('reviews'); ?>">
                                <i class="app-menu__icon fa fa-comment"></i>
                                <span class="app-menu__label"><small>Reviews</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("companies")) {
                ?>
                        <li>
                            <a class="app-menu__item" href="<?php echo base_url('companies'); ?>">
                                <i class="app-menu__icon fa fa-bank"></i>
                                <span class="app-menu__label"><small>Companies</small></span>
                            </a>
                        </li>
                <?php
                    }
                    if(check_permission("whatsapp")) {
                ?>
                        <!--<li>-->
                        <!--    <a class="app-menu__item" href="http://153.92.209.139/salon-admin2-php/whatsapp.php?c=vaavayan147evadad5468u8mty6554" target="_blank">-->
                        <!--        <i class="app-menu__icon fa fa-comment"></i>-->
                        <!--        <span class="app-menu__label"><small>Whatsapp</small></span>-->
                        <!--    </a>-->
                        <!--</li>-->
                <?php
                    }
                ?>
            </ul>
        </aside>
        <main class="app-content">
            <?= $this->renderSection('main_content'); ?>
        </main>
        <!-- <script src="< ?php echo base_url('public/calendar/vendor/modernizr/modernizr.custom.js'); ?>"></script> -->
        <script src="<?php echo base_url('public/admin/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/admin/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/admin/js/bootstrap-datetimepicker.js'); ?>"></script>
        <script src="<?php echo base_url('public/admin/js/main.js'); ?>"></script>
        <script src="<?php echo base_url('public/admin/js/plugins/pace.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/admin/js/js-snackbar.js?v=1.3'); ?>"></script>
        <script src="<?php echo base_url('public/admin/js/plugins/chart.js'); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                if($("span.alert-success").length) {
                    toast($("span.alert-success").html(),"success");
                }
                if($("span.alert-danger").length) {
                    toast($("span.alert-danger").html(),"danger");
                }
                $("ul.app-menu li").each(function(){
                    if($.trim($(this).find("span").text()) != "") {
                        if(page_title == $.trim($(this).find("span").text()))
                            $(this).find("a").addClass("active");
                        else 
                            $(this).find("a").removeClass("active");
                    }
                });
                $("#global_company_id").change(function(){
                    $.ajax({
                        url: "<?php echo base_url('set-company-info'); ?>",
                        type: 'post',
                        data: {
                            company_id: $(this).val(),
                            company_nm: $.trim($("#global_company_id option:selected").text())
                        },
                        success:function(response){
                            window.location.reload();
                        }
                    });
                });
                if($("#barChartDemo").length) {
                    $.ajax({
                        url: "<?php echo base_url("bar-chart"); ?>",
                        dataType: "json",
                        success:function(response){
                            var ctxl = $("#barChartDemo").get(0).getContext("2d");
                            var lineChart = new Chart(ctxl).Bar(response);
                        }
                    });
                    $.ajax({
                        url: "<?php echo base_url("pie-chart"); ?>",
                        dataType: "json",
                        success:function(response){
                            var ctxl = $("#pieChartDemo").get(0).getContext("2d");
                            var pieChart = new Chart(ctxl).Pie(response);
                        }
                    });
                }
            });
            function remove_row(url,flag = 0,error_msg = "Are you sure to remove this row?")
            {
                if(flag == 0) {
                    if(confirm(error_msg)) {
                        $.ajax({
                            url: url,
                            type: "post",
                            dataType: "json",
                            data: {
                                "_method": "DELETE"
                            },
                            success:function(response) {
                                if(response.status == 200)
                                    window.location.reload();
                            }
                        });
                    }
                } else if(flag == 1) {
                    if(confirm("Are you sure to approve this vendor?")) {
                        $.ajax({
                            url: url,
                            type: "get",
                            dataType: "json",
                            success:function(response) {
                                if(response.status == 200)
                                    window.location.reload();
                            }
                        });
                    }
                }
            }
            function toast(message,status)
            {
                SnackBar({
                    message: message,
                    status: status,
                    position: "bc"
                });
            }
        </script>
    </body>
</html>