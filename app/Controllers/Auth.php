<?php
    namespace App\Controllers;

    class Auth extends BaseController
    {
        protected $helpers = ["custom"];

        public function __construct()
        {
            $session = session();
            $this->userdata = $session->get("userdata");
        }

        public function sign_in()
        {
            if(isset($this->userdata["id"])) {
                return redirect("dashboard");    
            }
            return view('user/sign_in');
        }

        public function submit_sign_in()
        {
            try {
                $post = $this->request->getVar();
                $post["password"] = isset($post["password"]) ? $post["password"] : "";
                $params = array("key" => APP_KEY,"tag" => "sign_in","company_id" => COMPANY_ID,"username" => $post["username"],"password" => $post["password"]);
                $response = callApi(API_BASE_URL."api/sign_in",$params);
                if($response["status"] == 200) {
                    $session = session();
                    $session->set('userdata',$response["data"]);
                }
                return $this->response->setJSON($response); 
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function sign_up()
        {
            if(isset($this->userdata["id"])) {
                return redirect("dashboard");    
            }
            return view('user/sign_up');
        }

        public function submit_sign_up()
        {
            try {
                $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
                $secret = "6LemTvYrAAAAAD5XQdoUTRRcH4tErfID-24emPex";
                $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptchaResponse}");
                $responseData = json_decode($verify);
                if($responseData->success) {
                    $post = $this->request->getVar();
                    $params = array("key" => APP_KEY,"tag" => "sign_up","company_id" => COMPANY_ID,"name" => $post["name"],"phone" => $post["phone"],"email" => $post["email"],"password" => $post["password"],'gender' => $post["gender"]);
                    $response = callApi(API_BASE_URL."api/sign_up",$params);
                    if($response["status"] == 200) {
                        $session = session();
                        $session->set('userdata',$response["data"]);
                    }
                    return $this->response->setJSON($response);
                } else {
                    return $this->response->setJSON([
                        'status' => 400,
                        'message' => "Google captcha is not verified."
                    ]);   
                }
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
            // try {
            //     $post = $this->request->getVar();
            //     $params = array("key" => APP_KEY,"tag" => "sign_up","company_id" => COMPANY_ID,"name" => $post["name"],"phone" => $post["phone"],"email" => $post["email"],"password" => $post["password"],'gender' => $post["gender"]);
            //     $response = callApi(API_BASE_URL."api/sign_up",$params);
            //     if($response["status"] == 200) {
            //         $session = session();
            //         $session->set('userdata',$response["data"]);
            //     }
            //     return $this->response->setJSON($response); 
            // } catch(Throwable $e) {
            //      return $this->response->setJSON([
            //         'status' => 400,
            //         'message' => $e->getMessage()
            //     ]);
            // }
        }

        public function forgot_password()
        {
            if(isset($this->userdata["id"])) {
                return redirect("dashboard");    
            }
            return view('user/forgot_password');
        }

        public function submit_forgot_password()
        {
            try {
                $post = $this->request->getVar();
                $params = array("key" => APP_KEY,"tag" => "forgot_password","company_id" => COMPANY_ID,"username" => $post["username"]);
                $response = callApi(API_BASE_URL."api/forgot_password",$params);
                return $this->response->setJSON($response); 
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }
        
        public function reset_password()
        {
            if(isset($this->userdata["id"])) {
                return redirect("dashboard");  
            }
            if(isset($_GET["code"]) && trim($_GET["code"]) != "") {
                $data["code"] = $_GET["code"];
                $params = array("key" => APP_KEY,"tag" => "check_code_exist","code" => $data["code"]);
                $response = callApi(API_BASE_URL."api/check_code_exist",$params);
                if(isset($response["status"]) && $response["status"] == 200) {
                    return view('user/reset_password',$data);
                } else {
                    return redirect("sign-in"); 
                }
            }
        }
        
        public function submit_reset_password()
        {
            try {
                $post = $this->request->getVar();
                $params = array("key" => APP_KEY,"tag" => "submit_reset_password","code" => $post["code"],"new_password" => $post["new_password"],"confirm_password" => $post["confirm_password"]);
                $response = callApi(API_BASE_URL."api/submit_reset_password",$params);
                return $this->response->setJSON($response); 
            } catch(Throwable $e) {
                 return $this->response->setJSON([
                    'status' => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }

        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect("sign-in");
        }
    }