<?php
    namespace App\Controllers;

    use App\Models\Staff;
    use App\Models\CompanyModel;

    class Auth extends BaseController
    {
        protected $helpers = ["custom"];
        public function index()
        {
            return view('auth/sign_in');
        }

        public function check_sign_in()
        {
            $session = session();
            $post = $this->request->getVar();
            
            $model = new Staff;
            $where = array('email' => $post['email'],'password' => md5($post['password']));
            $userdata = $model->where($where)->first();
            if($userdata) {
                if($userdata['is_active'] == 1) {
                    $session->set('companyId',1);

                    $model = new CompanyModel;
                    $company = $model->where('id',1)->first();
                    $session->set('company',$company);

                    $session->set('userdata',$userdata);
                    echo json_encode(array("status" => 1,"message" => "","href" => base_url("dashboard")));
                } else {
                    echo json_encode(array("status" => 0,"message" => "Your account is inactive by Admin."));
                }
            } else {
                echo json_encode(array("status" => 0,"message" => "Email or password is wrong"));
            }
        }

        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect()->route('admin');
        }
    }
