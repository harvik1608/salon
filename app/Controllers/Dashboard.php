<?php
    namespace App\Controllers;

    class Dashboard extends BaseController
    {
        protected $helpers = ["custom"];

        public function __construct()
        {
            $session = session();
            $this->userdata = $session->get("userdata");
        }

        public function index()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $params = array("key" => APP_KEY,"tag" => "customer","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"]);
            $response = callApi(API_BASE_URL."api/customer",$params);
            if($response["status"] == 200) {
                $response["customer"] = $response["data"];
                return view('user/dashboard',$response);
            } else {
                return redirect("sign-in");
            }
        }

        public function edit_profile()
        {
            try {
                $post = $this->request->getVar();
                $params = array("key" => APP_KEY,"tag" => "edit_profile","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"],"name" => $post["customer_name"],"phone" => $post["customer_phone"],"email" => $post["customer_email"]);
                $response = callApi(API_BASE_URL."api/edit_profile",$params);
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }   
        }

        public function change_password()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $params = array("key" => APP_KEY,"tag" => "customer","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"]);
            $response = callApi(API_BASE_URL."api/customer",$params);
            if($response["status"] == 200) {
                $data["customer"] = $response["data"];
                $data["current_page"] = "change_password";
                return view('user/change_password',$data);
            } else {
                return redirect("sign-in");
            }
        }

        public function update_password()
        {
            try {
                $post = $this->request->getVar();
                $params = array("key" => APP_KEY,"tag" => "update_password","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"],"new_password" => $post["new_password"],"old_password" => $post["old_password"]);
                $response = callApi(API_BASE_URL."api/update_password",$params);
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }   
        }

        public function add_to_cart()
        {
            try {
                $param = $this->request->getVar();
                $param["key"] = APP_KEY;
                $param["tag"] = "add_to_cart";
                $param["company_id"] = COMPANY_ID;
                $param["customer_id"] = $this->userdata["id"];
                $param["date"] = isset($param["date"]) ? $param["date"] : "";
                $param["datetime"] = date("Y-m-d H:i:s");
                $response = callApi(API_BASE_URL."api/add_to_cart",$param);

                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function my_cart_items()
        {
            try {
                $param = $this->request->getVar();
                // $_date = date("Y-m-d",strtotime("-1 year"));
                $_date = "";
                if(isset($param["date"])) {
                    $_date = $param["date"];
                }
                $api_data = array(
                    "key" => APP_KEY,
                    "tag" => "get_cart_items",
                    "company_id" => COMPANY_ID,
                    "customer_id" => $this->userdata["id"],
                    "date" => $_date,
                );
                $response = callApi(API_BASE_URL."api/get_cart_items",$api_data);
                $response["userdata"] = $this->userdata;
                $response["is_update_only_cart"] = $param['is_update_only_cart'];
                $response["salon_end_time"] = $param["salon_etime"];
                $response["salon_sunday_end_time"] = $param["salon_sunday_etime"];
                $response["choose_date"] = $_date;
                $response["html"] = view("user/my_cart",$response);

                $available_dates = array();
                $api_data = array("key" => APP_KEY,"tag" => "available_dates","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"]);
                $resp = callApi(API_BASE_URL."api/available_dates",$api_data);
                if(isset($resp["status"]) && $resp["status"] == 200) {
                    $status = 200;
                    $available_dates = $resp["data"];
                }
                $response["available_dates"] = $available_dates;

                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function remove_from_cart()
        {
            try {
                $params = $this->request->getVar();
                $params["key"] = APP_KEY;
                $params["tag"] = "remove_from_cart";
                $params["company_id"] = COMPANY_ID;
                $params["customer_id"] = $this->userdata["id"];

                $response = callApi(API_BASE_URL."api/remove_from_cart",$params);
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function book_appointment()
        {
            try {
                $post = $this->request->getVar();
                $date = date("Y-m-d",strtotime($post["appointment_date"]));
                $time = date("H:i:s",strtotime($post["appointment_time"]."+".$post["total_min"]." minutes"));

                $dayName = date('l', strtotime($date));
                $isError = 0;
                $message = "";
                // if($dayName == "Sunday") {
                //     if(strtotime(date("H:i:s",strtotime($time))) > strtotime(date("H:i:s",strtotime($post["salon_sunday_end_time"])))) {
                //         $isError = 1;
                //         $message = "Sorry salon closing time is ".date("h:i A",strtotime($post["salon_sunday_end_time"]));
                //     }
                // } else {
                //     if(strtotime(date("H:i:s",strtotime($time))) > strtotime(date("H:i:s",strtotime($post["salon_end_time"].":00")))) {
                //         $isError = 2;
                //         $message = "Sorry salon closing time is ".date("h:i A",strtotime($post["salon_end_time"]));
                //     }
                // }
                if($isError == 0) {
                    $date = date("Y-m-d",strtotime($post["appointment_date"]));
                    $time = date("H:i:s",strtotime($post["appointment_time"]));
                    if(strtotime($date." ".$time) > strtotime(date("Y-m-d H:i:s"))) {
                        $api_data = array(
                            "key" => APP_KEY,
                            "tag" => "book_appointment",
                            "company_id" => COMPANY_ID,
                            "customer_id" => $this->userdata["id"],
                            "customer_phone" => $post["customer_phone"],
                            "customer_email" => $post["customer_email"],
                            "customer_name" => $post["customer_name"],
                            "customer_note" => $post["customer_note"],
                            "appointment_date" => $post["appointment_date"],
                            "appointment_time" => $post["appointment_time"],
                            "available_staffs" => $post["available_staffs"]
                        );
                        $response = callApi(API_BASE_URL."api/book_appointment",$api_data);
                    } else {
                        $response = array("status" => 400,"message" => "You can't book appointment in past.");
                    }
                } else {
                    $response = array("status" => 400,"message" => $message);
                }
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function my_appointments()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $currency = "£";
            $response = company("currency,isActive,company_logo,banner,banners");
            if(isset($response["status"]) && $response["status"] == 200) {
                $currency = isset($response["data"]["currency"]) ? $response["data"]["currency"] : "";
            }

            $params = array("key" => APP_KEY,"tag" => "my_appointments","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"]);
            $response = callApi(API_BASE_URL."api/my_appointments",$params);
            if($response["status"] == 200) {
                $response["customer"] = $this->userdata;
                $response["appointments"] = $response["data"];
                $response["currency"] = $currency;
                return view('user/my_appointment',$response);
            } else {
                return redirect("sign-in");
            }
        }

        public function view_appointment()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $params = array(
                "key" => APP_KEY,
                "tag" => "view_appointment",
                "company_id" => COMPANY_ID,
                "customer_id" => $this->userdata["id"],
                "appointment_id" => $this->request->getVar('appointment_id')
            );
            $response = callApi(API_BASE_URL."api/view_appointment",$params);
            if($response["status"] == 200) {
                $response["html"] = view("user/view_appointment",$response);
                return $this->response->setJSON($response);
            } else {
                return redirect("sign-in");
            }
        }

        public function my_review()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $params = array(
                "key" => APP_KEY,
                "tag" => "my_review",
                "company_id" => COMPANY_ID,
                "customer_id" => $this->userdata["id"]
            );
            $response = callApi(API_BASE_URL."api/my_review",$params);
            $response["customer"] = $this->userdata;
            return view('user/my_review',$response);
        }

        public function submit_review()
        {
            try {
                if(!isset($this->userdata["id"])) {
                    return redirect("sign-in");    
                }
                $params = array(
                    "key" => APP_KEY,
                    "tag" => "submit_review",
                    "company_id" => COMPANY_ID,
                    "customer_id" => $this->userdata["id"],
                    "comment" => $this->request->getVar('comment'),
                    "rate" => $this->request->getVar('rate'),
                );
                $response = callApi(API_BASE_URL."api/submit_review",$params);
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function available_dates()
        {
            try {
                $status = 201;
                $available_dates = array();
                $api_data = array("key" => APP_KEY,"tag" => "available_dates","company_id" => COMPANY_ID);
                $response = callApi(API_BASE_URL."api/available_dates",$api_data);
                if(isset($response["status"]) && $response["status"] == 200) {
                    $status = 200;
                    $available_dates = $response["data"];
                }
                return $this->response->setJSON(["status" => $status,"available_dates" => $available_dates]);
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }
        
        public function check_discount()
        {
            try {
                $date = date("Y-m-d",strtotime($this->request->getVar('date')));
                $api_data = array("key" => APP_KEY,"tag" => "fetch_available_slots","date" => $date,"company_id" => COMPANY_ID,'customer_id' => $this->userdata["id"]);
                $response = callApi(API_BASE_URL."api/fetch_available_slots",$api_data);
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON(['status' => 400,'message' => $e->getMessage()]);
            }
        }

        public function check_staff_time()
        {
            try {
                $api_data = array("key" => APP_KEY,"tag" => "check_staff_time","staff_ids" => $this->request->getVar('available_staffs'),"company_id" => COMPANY_ID,'customer_id' => $this->userdata["id"],"date" => $this->request->getVar('date'),"time" => $this->request->getVar('time'));
                $response = callApi(API_BASE_URL."api/check-staff-time",$api_data);
                return $this->response->setJSON($response);
            } catch(Throwable $e) {
                 return $this->response->setJSON(['status' => 400,'message' => $e->getMessage()]);
            }
        }

        public function consent_form()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $params = array("key" => APP_KEY,"tag" => "customer","company_id" => COMPANY_ID,"customer_id" => $this->userdata["id"]);
            $response = callApi(API_BASE_URL."api/customer",$params);
            if($response["status"] == 200) {
                $response["customer"] = $response["data"];
                return view('user/consent_form',$response);
            } else {
                return redirect("sign-in");
            }
        }

        public function submit_consent_form()
        {
            if(!isset($this->userdata["id"])) {
                return redirect("sign-in");    
            }
            $post = $this->request->getVar();
            $medical_skin = "";
            if(isset($post["medical_skin"]) && !empty($post["medical_skin"])) {
                $medical_skin = implode(",", $post["medical_skin"]);
            }
            $facial_treatment_before = "";
            if(isset($post["done_facial_treatment_before"]) && !empty($post["done_facial_treatment_before"])) {
                $facial_treatment_before = implode(",", $post["done_facial_treatment_before"]);
            }
            $pregnant_breastfeeding = "";
            if(isset($post["pregnant_breastfeeding"]) && !empty($post["pregnant_breastfeeding"])) {
                $pregnant_breastfeeding = implode(",", $post["pregnant_breastfeeding"]);
            }
            $medical_skin = "";
            if(isset($post["medical_skin"]) && !empty($post["medical_skin"])) {
                $medical_skin = implode(",", $post["medical_skin"]);
            }

            // $params = array(
            //     "key" => APP_KEY,
            //     "tag" => "consent_form",
            //     "company_id" => COMPANY_ID,
            //     "customer_id" => $this->userdata["id"],
            //     "consent_date" => $post["consent_date"],
            //     "signature" => $post["signature"]
            // );
            // $response = callApi(API_BASE_URL."api/submit_consent_form",$params);
            // preview($response);
        }
    }