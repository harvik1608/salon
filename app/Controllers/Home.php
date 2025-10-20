<?php
    namespace App\Controllers;
    
    use App\Models\CustomerModel;
    use App\Models\AppointmentModel;
    use App\Models\CartModel;
    use App\Models\EntryModel;
    use App\Models\Staff;

    class Home extends BaseController
    {
        protected $helpers = ["custom"];

        public function index()
        {
            $api_data = array("key" => APP_KEY,"tag" => "home","company_id" => COMPANY_ID);
            $response = callApi(API_BASE_URL."api/home",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $data["company"] = $response["data"];

                $api_data = array("key" => APP_KEY,"tag" => "our_reviews","company_id" => COMPANY_ID);
                $response = callApi(API_BASE_URL."api/our_reviews",$api_data);
                $data["reviews"] = $response;
                return view('index',$data);
            }
        }

        public function about_us()
        {
            $response = company("about_company,isActive,company_logo,banner,banners");
            $data["privacy_policy"] = $response["data"]["about_company"];
            $data["banner"] = $response["data"]["banner"];
            $data["title"] = "About Us";

            return view('privacy_policy',$data);
        }

        public function treatments()
        {
            $api_data = array("key" => APP_KEY,"tag" => "treatments","company_id" => COMPANY_ID);
            $response = callApi(API_BASE_URL."api/treatments",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $data["treatments"] = $response["data"];
                return view('treatments',$data);
            }
        }

        public function offers()
        {
            $api_data = array("key" => APP_KEY,"tag" => "offers","company_id" => COMPANY_ID);
            $response = callApi(API_BASE_URL."api/offers",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $data["offers"] = $response["data"]["offers"];
                return view('offers',$data);
            }
        }

        public function treatment($slug = "")
        {
            if($slug != "")
            {
                $data["is_logged_in"] = 0;

                $session = session();
                if($session->get("userdata")) {
                    $data["is_logged_in"] = 1;
                } 
                // preview($data["is_logged_in"]);
                $api_data = array("key" => APP_KEY,"tag" => "treatment","company_id" => COMPANY_ID,'slug' => $slug);
                $response = callApi(API_BASE_URL."api/treatment",$api_data);
                if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
                {
                    $data["treatments"] = $response["data"];

                    $data["other_treatments"] = array();
                    $api_data = array("key" => APP_KEY,"tag" => "treatments","company_id" => COMPANY_ID);
                    $response = callApi(API_BASE_URL."api/treatments",$api_data);
                    if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS) {
                        $data["other_treatments"] = $response["data"];
                    }
                    $data["available_dates"] = "";
                    $api_data = array("key" => APP_KEY,"tag" => "available_dates","company_id" => COMPANY_ID);
                    $response = callApi(API_BASE_URL."api/available_dates",$api_data);
                    if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
                    {
                        if(isset($response["data"]) && count($response["data"]) > 0) {
                            $data["available_dates"] = json_encode($response["data"]);
                        }
                    }
                    $data["is_all_dates_blank"] = 1;
                    if($data["available_dates"] == "") {
                        $data["is_all_dates_blank"] = 0;
                    }
                    return view('shopping',$data);
                } else 
                    return redirect()->route('treatments');
            } else 
                return redirect()->route('treatments');
        }

        public function fetch_services()
        {
            try {
                $post = $this->request->getVar();
                $data['services'] = array();
                $data['currency'] = "";
                $date = date("Y-m-d",strtotime($post["date"]));

                $api_data = array("key" => APP_KEY,"tag" => "sub_treatments","company_id" => COMPANY_ID,"service_id" => $post["service_group_id"],"date" => $date);
                $response = callApi(API_BASE_URL."api/sub_treatments",$api_data);
                if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
                {
                    $data['services'] = $response["data"]["sub_treatments"];
                    $data['currency'] = $response["data"]["currency"];
                }
                $data['service_group_name'] = $post['service_group_name'];
                $data['flag'] = $post['flag'];
                $data["total_item_in_cart"] = 0;
                $session = session();
                if($session->get("userdata")) {
                    $response = callApi(API_BASE_URL."api/get_total_item_from_cart",["key" => APP_KEY,"tag" => "get_total_item_from_cart","company_id" => COMPANY_ID,"customer_id" => $session->get("userdata")["id"]]);
                    if(isset($response["status"]) && $response["status"] == 200) {
                        $data["total_item_in_cart"] = $response["data"];
                    }
                } 
                $html = view('service_list',$data);
                return $this->response->setJSON(["status" => 200,"html" => $html]);
            } catch(Throwable $e) {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function gallery()
        {
            $data["photos"] = array();
            $api_data = array("key" => APP_KEY,"tag" => "photos","company_id" => COMPANY_ID);
            $response = callApi(API_BASE_URL."api/photos",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS) {
                $data["photos"] = $response["data"];
                $data["banner"] = isset($response["company"]) ? $response["company"] : [];
            }
            return view('gallery',$data);
        }

        public function contact_us()
        {
            $data["company"] = array();
            $api_data = array("key" => APP_KEY,"tag" => "company","company_id" => COMPANY_ID,"columns" => "company_address,company_phone,company_email,isActive,company_logo,banner,facebook_link,google_link,instagram_link,code,banners,google_map");
            $response = callApi(API_BASE_URL."api/company",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
                $data["company"] = $response["data"];

            return view('contact_us',$data);
        }

        public function privacy_policy()
        {
            $response = company("privacy_policy,isActive,company_logo,banner,banners");
            $data["privacy_policy"] = $response["data"]["privacy_policy"];
            $data["title"] = "Privacy Policy";
            return view('privacy_policy',$data);
        }

        public function parking_instructions()
        {
            $response = company("parking_instructions,isActive,company_logo,banner,banners");
            $data["privacy_policy"] = $response["data"]["parking_instructions"];
            $data["title"] = "Parking Instructions";
            return view('privacy_policy',$data);
        }

        public function all_sub_services()
        {
            $post = $this->request->getVar();

            $data['services'] = array();
            $data['currency'] = "";

            $api_data = array("key" => APP_KEY,"tag" => "sub_treatments","company_id" => COMPANY_ID,"service_id" => $post["serviceId"]);
            $response = callApi(API_BASE_URL."api/sub_treatments",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $data['services'] = $response["data"]["sub_treatments"];
                $data['currency'] = $response["data"]["currency"];
            }
            $data['service_name'] = $post['serviceNm'];
            $data['flag'] = $post['flag'];

            $html = view('sub_service_list',$data);
            echo json_encode(array("status" => 1,"content" => $html));
            exit;
        }

        public function add_service_in_cart()
        {
            $post = $this->request->getVar();
            $message = "";
            $date = format_date(15);
            $html = "";
            $post["appointmentDate"] = $date;
            $api_data = array(
                "key" => APP_KEY,
                "tag" => "check_staff",
                "company_id" => COMPANY_ID,
                "date" => $date,
                "service_id" => $post["serviceId"],
                "serviceNm" => $post["serviceNm"],
                "appointmentDate" => $post["appointmentDate"],
                "stime" => $post["stime"],
                "duration" => $post["duration"]
            );
            $response = callApi(API_BASE_URL."api/check_staff",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $data['staffs']         = $response["data"]["staffs"];
                $data['service_name']   = $post['serviceNm'];
                $data['service_id']     = $post['serviceId'];
                $data['service_sub_id'] = $post['serviceSubId'];
                $data['caption']        = $post['caption'];
                $data['price']          = $post['price'];
                $data['stime']          = $post["stime"];
                $data['duration']       = $post["duration"];
                $data['no']             = $post['no'];
                $data['ntime']          = $post['ntime'];
                $data['etime']          = $response['data']['etime'];
                $data['staffId']        = 0;
                $data['flag']           = $post['flag'];
                $data['currency']       = $response['data']['currency'];

                $html = view('add_service_in_cart',$data);

                if((int) $post['no'] == 0)
                    $_times = timepicker("15","19");
                else 
                    $_times = "";

                $status = 1;
            } else {
                $status = 0;
                $message = isset($response["message"]) ? $response["message"] : "Oops! Something went wrong."; 
                $_times = "";
            }
            $available_dates = [];
            $api_data = array("key" => APP_KEY,"tag" => "available_dates","company_id" => COMPANY_ID);
            $response = callApi(API_BASE_URL."api/available_dates",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                if(isset($response["data"]) && count($response["data"]) > 0) {
                    $available_dates = $response["data"];
                }
            }
            echo json_encode(array("status" => $status,"times" => $_times,"content" => $html,"message" => $message,"available_dates" => $available_dates));
            exit;
        }

        public function book_appointment_from_website()
        {
            $post = $this->request->getVar();
            preview($post);
            $post["uniq_id"] = strtotime(date("Y-m-d"));
            
            $api_data = array(
                "key" => APP_KEY,
                "tag" => "book_appointment_from_website",
                "company_id" => COMPANY_ID,
                "uniq_id" => $post["uniq_id"],
                "customer_phone" => $post["customer_phone"],
                "customer_email" => $post["customer_email"],
                "customer_name" => $post["customer_name"],
                "customer_note" => $post["customer_note"],
                "available_staffs" => $post["staff_ids"],
                "appointment_date" => $post["appointment_date"],
                "appointment_time" => $post["appointment_time"],
                "service_item" => json_encode($post["service_item"]),
                "service_duration" => json_encode($post["service_duration"]),
                "service_amount" => json_encode($post["service_amount"]),
                "sub_service_name" => json_encode($post["sub_service_name"]),
                "service_name" => json_encode($post["service_name"]),
                "service_sub_item" => json_encode($post["service_sub_item"]),
            );
            $response = callApi(API_BASE_URL."api/book_appointment_from_website",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $ret_arr["status"] = 1;
                $ret_arr['message'] = "Appointment booked successfully.";
            } else {
                $ret_arr["status"] = 0;
                $ret_arr['message'] = "Something went wrong please try again later.";   
            }
            echo json_encode($ret_arr);
            exit;    
        }
        
        public function fetch_slots()
        {
            $post = $this->request->getVar();
            
            $api_data = array(
                "key" => APP_KEY,
                "tag" => "fetch_slots",
                "date" => date("Y-m-d",strtotime($post['date'])),
                "service_id" => $post["service_id"],
                "company_id" =>  COMPANY_ID,
                "duration" => $post["duration"]
            );
            $response = callApi(API_BASE_URL."api/fetch_slots",$api_data);
            if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            {
                $ret_arr["status"] = $response["status"];
                $ret_arr['slots'] = $response["data"]["slots"];
                $ret_arr['staff_ids'] = $response["data"]["staff_ids"];
            } else {
                $ret_arr["status"] = 201;
                $ret_arr['slots'] = [];
                $ret_arr['staff_ids'] = "";
            }
            echo json_encode($ret_arr);
            exit;
        }

        public function submit_contact_form()
        {
            $post = $this->request->getVar();
            $post['key'] = APP_KEY;
            $post['tag'] = "send_inquiry";
            $post['company_id'] = COMPANY_ID;
            $response = callApi(API_BASE_URL."api/send_inquiry",$post);
            return $this->response->setJSON($response);
        }
    }
