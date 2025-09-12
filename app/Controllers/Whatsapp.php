<?php
    namespace App\Controllers;

    use App\Models\CompanyModel;

    class Whatsapp extends BaseController
    {
        protected $helpers = ["custom"];

        public function __construct()
        {
            $session = session();
            $this->userdata = $session->get("userdata");
        }
        
        public function index()
        {
            // $body = [];
            // $body[] = "Harshal Kithoriya";
            // $body[] = "Wednesday, 8th February 2025";
            // $body[] = "Eyebrows - Waxing 12£ | Eyebrows Tint - 10£ | Total: 22£";
            // $body[] = "01:00 PM";
            // callWhatsapp("+916353792059",$body,3);
            
            // $model = new CompanyModel;
            // $company = $model->select("company_name,company_address,company_email,website_url")->where("id",static_company_id())->first();
            // $company_name = $company['company_name'];
            // $company_address = $company['company_address'];
            // $company_email = $company['company_email'];
            // $website_url = $company['website_url'];
            
            // $main_body = "Hello $body[0]<br><br> Thanks for booking appointment on embellish-beauty.co.uk. This is an details of your appointment.<br><br>Appointment date: .<br>
            // If you have any questions about this invoice, simply reply to this email or reach out to our support team for help $company_email<br><br>
            // Cheers,
            // $company_name Team<br>
            // $company_address<br>
            // $company_email<br>
            // $website_url";
            // echo $main_body;
            // exit;

            // $reportData['user']['first_name'] = "Vasudev Jogani";
            // $reportData['month'] = "August";
            // $reportData['totalHours'] = "20";
            // $reportData['totalWages'] = "30";
            
            // $body = "Hello ". $reportData['user']['first_name']."\n"."\n";
            // $body.= "Here is the details about monthly pay"."\n";
            // $body.="Month: ".$reportData['month']."\n";
            // $body.="Total Hours: ".$reportData['totalHours']."\n";
            // $body.="Wages: £".$reportData['totalWages']."\n";
            // callWhatsapp("+44 7767565845",$body,static_company_id());
            

            $emaildata["customer_name"] = "Harshal Kithoriya"; 
            $emaildata["customer_email"] = "vch242516@gmail.com"; 
            $emaildata["customer_phone"] = "9714191947"; 
            $emaildata["customer_note"] = "Hi I booked";
            $emaildata["items"] = array(array("service" => "Hair","duration" => "10 Min.","price" => "20","time" => "10:00"),array("service" => "Waxing","duration" => "20 Min.","price" => "30","time" => "10:00"));
            $emaildata["currency"] = "£";
            $emaildata["total"] = 50;
            $emaildata["is_for_admin"] = 0;
            $emaildata["company_name"] = "Embellish";
            $emaildata["booking_date"] = "2025-09-09";
            $emaildata["company_phone"] = "2025-09-09";
            $emaildata["company_whatsapp"] = "2025-09-09";
            $emaildata["company_email"] = "2025-09-09";
            $emaildata["company_website_url"] = "2025-09-09";
            $emaildata["company_address"] = "2025-09-09";
            $message = view("template/book_appointment",$emaildata);

            $model = new CompanyModel;
            $company = $model->where('id',1)->first();
            $res = send_email("vch242516@gmai.com","Appointment Booking",$message,$company);
            preview($res);
        }
    }