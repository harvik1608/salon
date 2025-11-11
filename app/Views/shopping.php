<?=$this->extend("include/front_header")?>
<?=$this->section("content")?>
<!-- <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/priority-nav-scroller.css'); ?>"> -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">-->
<style>
    .service_det_tag {
    	width: 750px;
    	overflow-x: auto;
    	white-space: nowrap;
    }
    .tag_list {
    	display: flex;
    	list-style: none;
    	padding: 0;
    }
    .tag_list li {
    	padding: 10px 15px;
    }
    #your_cart {
        float: right;
        font-size: 20px !important;
    }
    .price_cell {
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .price_caption {
        margin-bottom: 5px;
        font-size: 13px;
        font-weight: bold;
    }
    .price_cell span {
        font-size: 13px;
    }
    #op {
        min-height: 1000px; /* or JS to match sidebar height dynamically */
    }

    .price-caption {
        padding: 3px 5px;
        border-radius: 10px;
        color: #ffffff;
    }

    /* Small laptops (screen width ≤ 1024px) */
    @media (max-width: 1024px) {
        .price_caption {
            font-size: 10px;
        }

        .service-title {
            font-size: 10px;
        }

        .price_cell span {
            font-size: 10px !important;
        }
        
        #your_cart {
            width: 20%;
            font-size: 12px !important;
            padding: 8px 12px;
        }
    }

    /* Tablets (screen width ≤ 768px) */
    @media (max-width: 768px) {
        .price_caption {
            font-size: 10px;
        }

        .service-title {
            font-size: 10px;
        }

        .price_cell span {
            font-size: 10px !important;
        }
        
        #your_cart {
            width: 20%;
            font-size: 12px !important;
            padding: 8px 12px;
        }
    }

    /* Mobile phones (screen width ≤ 480px) */
    @media (max-width: 480px) {
        .price_caption {
            font-size: 10px;
        }

        .service-title {
            font-size: 10px;
        }

        .price_cell span {
            font-size: 10px !important;
        }
        
        #your_cart {
            width: 20%;
            font-size: 12px !important;
            padding: 8px 12px;
        }
    }
</style>
<section class="breadcrumb_area" style="background: url(images/breadcrumb_bg.jpg);">
    <input type="hidden" id="current_service_group_id" value="<?php echo $treatments['treatment_id']; ?>" />
    <input type="hidden" id="current_service_group_nm" value="<?php echo $treatments['treatment_name']; ?>" />
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1><?php echo $treatments['treatment_name']; ?></h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> home</a></li>
                            <li><a href="<?php echo base_url('treatments'); ?>">Treatments</a></li>
                            <li><a href="javascript:;"><?php echo $treatments['treatment_name']; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services_details mt_60 xs_mt_70">
    <div class="container">
        <div class="row">
        	<div class="col-lg-4 col-12">
                <div class="service_sidebar" id="">
                    <div class="sidebar_category sidebar_item mb_25">
                        <h3>Our Services</h3>
                        <ul id="our_service">
                        	<?php
                        		if($other_treatments) {
                        			foreach($other_treatments as $other_treatment) {
                        	?>	
                        				<li><a href="javascript:;" onclick="fetch_services(<?php echo $other_treatment['id']; ?>,'<?php echo $other_treatment['name']; ?>')"><span><?php echo $other_treatment['name']; ?></span> <span>(<?php echo $other_treatment['total_services']; ?>)</span></a></li>
                        	<?php
                        			}
                        		} 
                        	?>
                        </ul>
                    </div>
               	</div>
           	</div>
           	<div class="col-lg-8 col-12" id="op">

           	</div>
        </div>
   	</div>
</div>
<!-- <script src="<?php echo base_url('public/frontend/js/priority-nav-scroller.js'); ?>"></script> -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>-->
<script type="text/javascript">
	document.title = "<?php echo $treatments['treatment_name']; ?>";
    var page_title = "<?php echo $treatments['treatment_name']; ?>";
    var treatment_id = <?php echo $treatments['treatment_id']; ?>;
    var is_logged_in = <?php echo $is_logged_in; ?>;
    var is_all_dates_blank = <?php echo $is_all_dates_blank; ?>;
    var available_dates = new Array();
    if(is_all_dates_blank == 1) {
        available_dates = $.parseJSON('<?php echo ($available_dates); ?>');
    }
    $(document).ready(function(){
        $("#appointment_date").datepicker({
            minDate: new Date()
        });
        fetch_services(treatment_id,page_title);
        $(document).on("click","#your_cart",function(){
            my_cart();
        });
        $(document).on("change","#appointment_date",function(){
            check_discount();
        });
        // if(is_all_dates_blank == 1) {
        //     apply_datepicker(available_dates,"#booking_date");
        // } else {
        //     show_toast("Oops!","No any staff available for appointment.");
        // }
        $(document).on("change","#appointment_time",function(){
            $.ajax({
                url: "<?php echo base_url('check-staff-time'); ?>",
                type: "POST",
                data: {
                    date: $("#appointment_date").val(),
                    time: $("#appointment_time").val(),
                    available_staffs: $("#available_staffs").val(),
                },
                success:function(response){
                    $("#available_staffs").val(response.data);
                }
            });
        });
    });
    function fetch_services(service_group_id,name,flag = 0)
    {
        // if(is_all_dates_blank == 1) {
            if(is_logged_in == 1) {
                // if (localStorage.getItem('booking_date') !== null) {
                    $("#our_service li").each(function(){
                        if($.trim($(this).find("a span:eq(0)").text()) == name) {
                            $(this).find("a").attr("data-current",1);
                        } else {
                            $(this).find("a").attr("data-current",0);
                        }
                    });
                    $.ajax({
                        url: "<?php echo base_url('fetch-services'); ?>",
                        type: "GET",
                        data: {
                            date: $("#booking_date").val(),
                            service_group_id:service_group_id,
                            service_group_name: name,
                            flag: flag
                        },
                        success:function(response){
                            $("#op").html(response.html);
                            remove_empty_rows();
                        }
                    });
                // } else {
                //     $("#dateAppointment").modal("show");
                // }
            } else {
                $("#staticBackdrop").modal("show");
            }
        // }
    }
    function remove_empty_rows()
    {
        $("#op table tbody tr").each(function(){
            var isError = 0;
            $(this).find("td").each(function(){
                if($.trim($(this).text()) != "") {
                    isError = 1;
                }
            });
            if(isError == 0) {
                $(this).remove();
            }
        });
    }
    function add_to_cart(service_id,id,service_name,caption,price,duration,flag = 0,retail_price = 0,special_price = 0)
    {
        var discount_amount = 0;        
        if($.trim(special_price) != "") {
            discount_amount = special_price;
        }
        var booking_date;
        if (localStorage.getItem('booking_date') !== null) {
            booking_date = localStorage.getItem('booking_date');
        }
        $.ajax({
            url: "<?php echo base_url('add-to-cart'); ?>",
            type: "POST",
            data: {
                caption: caption,
                amount: retail_price,
                duration: duration,
                service_id: service_id,
                service_name: service_name,
                service_group_id: id,
                date: booking_date,
                discount_amount: discount_amount
            },
            success:function(response){
                if(response.status == 200) {
                    show_toast("Success",response.message);
                    $(".total_item").html("(Total service in your cart : "+response.data+")");
                } else {
                    show_toast("Oops!",response.message);
                }
            }
        });
    }
    function my_cart(is_modal_opened = 0,is_update_only_cart = 0)
    {
        var booking_date;
        if (localStorage.getItem('booking_date') !== null) {
            booking_date = localStorage.getItem('booking_date');
        }
        $.ajax({
            url: "<?php echo base_url('my-cart-items'); ?>",
            type: "GET",
            data:{
                date: booking_date,
                salon_etime: $("#salon_etime").val(),
                salon_sunday_etime: $("#salon_sunday_etime").val(),
                is_update_only_cart: is_update_only_cart
            },
            success:function(response){
                if(is_update_only_cart == 1) {
                    if($("#cartTbl tbody tr").length == 2) {
                        $("#bookAppointment .reservation_form #cart_body").html(response.html);
                        var imgSrc = $(".empty_cart").attr("src");
                        $("#bookAppointment .reservation_form").html('<center><img src="'+imgSrc+'" class="empty_cart"><br><a class="read_btn" onclick="close_modal()">Continue Booking</a></center>');
                    } else {
                        $("#bookAppointment .reservation_form #cart_body").html(response.html);
                    }
                } else {
                    $("#bookAppointment .reservation_form").html(response.html);
                    if(is_modal_opened == 0) {
                        apply_datepicker(response.available_dates);
                        $("#appointment_date").val(booking_date);
                        $("#bookAppointment").modal("show");
                    }
                }
                calc_total_amt();
            }
        });
    }
    function calc_total_amt() 
    {
        $("#payable_amount").val($("#total_bill").attr("data-bill"));
    }
    function remove_from_cart(cart_id)
    {
        if(confirm("Are you sure to remove this service?")) {
            $.ajax({
                url: "<?php echo base_url('remove-from-cart'); ?>",
                type: "GET",
                data: { 
                    cart_id:cart_id 
                },
                success:function(response){
                    if(response.status == 200) {
                        $(".total_item").html("(Total service in your cart : "+response.data+")");
                        show_toast("Success",response.message);
                        my_cart(1,1);
                        $("#appointment_date").trigger("change");
                    }
                }
            });
        }
    }
    function close_modal()
    {
        $("#bookAppointment input").val("");
        $("#bookAppointment").modal("hide");
    }
    function check_discount()
    {
        $.ajax({
            url: "<?php echo base_url('check-discount'); ?>",
            type: "GET",
            data: {
                date: $("#appointment_date").val()
            },
            beforeSend:function(){
                $(".fetch_slots").html("Fetching slots... please wait.");
            },
            success:function(response){
                updated_my_cart($("#appointment_date").val(),response);
            }
        });
    }
    function updated_my_cart(booking_date,responseData)
    {
        $.ajax({
            url: "<?php echo base_url('my-cart-items'); ?>",
            type: "GET",
            data:{
                date: booking_date,
                salon_etime: $("#salon_etime").val(),
                salon_sunday_etime: $("#salon_sunday_etime").val(),
                is_update_only_cart: 1
            },
            success:function(response){
                $(".fetch_slots").html("");
                $("#bookAppointment .reservation_form #cart_body").html(response.html);
                calc_total_amt();
                fill_time(responseData);
            }
        });
    }
    function fill_time(responseData)
    {
        var available_staffs = "";
        if(responseData.data.staff_ids) {
            available_staffs = responseData.data.staff_ids;
        }
        $("#available_staffs").val(available_staffs);
        
        var timing = '<option value="">Choose Time</option>';
        if(responseData.data.slots) {
            if(responseData.data.slots.length > 0) {
                for(var i = 0; i < responseData.data.slots.length; i++) {
                    timing += '<option value="'+responseData.data.slots[i].stime+'">'+responseData.data.slots[i].stime+'</option>';
                }
            }
        }
        $("#appointment_time").html(timing);
    }
    function apply_datepicker(available_dates,selector = "#appointment_date")
    {
        var enabledDates = [];
        if(available_dates.length > 0) {
            for(var i = 0; i < available_dates.length; i ++) {
                enabledDates.push(available_dates[i]);   
            }
        }
        function enableSpecificDates(date) {
            var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
            return [enabledDates.includes(formattedDate)];
        }
        $(selector).datepicker({
            minDate: new Date(),
            beforeShowDay: enableSpecificDates
        });
    }
</script>
<?=$this->endSection()?>