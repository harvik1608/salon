<?php
	function preview($data)
    {
        echo "<pre>";
        print_r ($data);
        exit;
    }
    
    function format_date($flag,$date = "")
    {
        switch($flag)
        {
            case 1:
            $date = date("Y-m-d H:i:s");
            break;

            case 2:
            $date = date("d/m/Y",strtotime($date));
            break;

            case 3:
            $date = date("d/m/Y h:i A",strtotime($date));
            break;

            case 4:
            $date = date("M d, Y",strtotime($date));
            break;

            case 5:
            $date = time();
            break;

            case 6:
            $date = date("Y-m-d",strtotime($date));
            break;

            case 7:
            $date = strtotime($date);
            break;

            case 8:
            $date = strtotime(date("Y-m-d"));
            break;

            case 9:
            $date = date("H",strtotime($date));
            break;

            case 10:
            $date = date("H:i:s",strtotime($date));
            break;

            case 11:
            $date = date("h:i A",strtotime($date));
            break;

            case 12:
            $date = strtotime(date("H:i:s"));
            break;

            case 13:
            $date = date("d M, Y",strtotime($date));
            break;

            case 14:
            $date = $date == "" ? date("H:i:s") : date("H:i:s",strtotime($date));
            break;

            case 15:
            $date = date("Y-m-d");
            break;
        }
        return $date;
    }
    
    function timepicker($start = 0,$end = 23,$duration = 5)
    {
        $start  = (int) $start;
        $end    = (int) $end;

        $str = "";
        $no = 0;
        for($i = $start;$i <= $end; $i ++)
        {
            for($j = 0;$j <=59; $j = $j+$duration)
            {
                $no++;
                $show_time = date("h:i A",strtotime($i.":".$j.":00"));
                $hidden_time = date("H:i:s",strtotime($i.":".$j.":00"));
                $hidden_time_m = date("H:i",strtotime($i.":".$j));
                $str .= "<option value=".$hidden_time." name='".$no."'>".$show_time."</option>";
            }
        }
        return $str;
    }

    function callApi($url,$params)
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_POST, 1);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $params);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));

        $apiResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        $response = json_decode($apiResponse,true);
        return $response;
    }

    function company($columns = "")
    {
        $api_data = array("key" => APP_KEY,"tag" => "company","company_id" => COMPANY_ID,"columns" => $columns);
        $response = callApi(API_BASE_URL."api/company",$api_data);
        return $response;
    }

    function company_treatments()
    {
        $treatments = array();
        $api_data = array("key" => APP_KEY,"tag" => "treatments","company_id" => COMPANY_ID);
        $response = callApi(API_BASE_URL."api/treatments",$api_data);
        if(isset($response["status"]) && $response["status"] == RESPONSE_FLAG_SUCCESS)
            $treatments = $response["data"];
        
        return $treatments;
    }
    
    function get_service_prices($service_id)
    {
        $api_data = array("key" => APP_KEY,"tag" => "get_service_price","company_id" => COMPANY_ID,"service_id" => $service_id);
        $response = callApi(API_BASE_URL."api/get_service_price",$api_data);
        $json = [];
        if($response["data"] && !empty($response["data"])) {
            $json = $response["data"];
        }
        return $json;
    }