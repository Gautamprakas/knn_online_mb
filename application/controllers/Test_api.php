<?php
class Test_api extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->library('form_validation');
		// $this->load->library('curl');
		$this->load->helper('api_helper');
		//exit();
	}

	public function index(){


	}
	public function getData(){
		$full_name = "Prakash Gautam";
        $mobile_number = "7897680196";
        $user_email = "gautamprakash697@gmail.com";
        $bearer_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJmcmVzaCI6ZmFsc2UsImlhdCI6MTcwMDIwNTM2MCwianRpIjoiYmE4ZDA3MmMtNzIyNy00MTY0LWJmMWYtZWYxZDJmYWZiOGJiIiwidHlwZSI6ImFjY2VzcyIsImlkZW50aXR5IjoiZGV2LnZkYWliaW9zZWNAc3VyZXBhc3MuaW8iLCJuYmYiOjE3MDAyMDUzNjAsImV4cCI6MjAxNTU2NTM2MCwidXNlcl9jbGFpbXMiOnsic2NvcGVzIjpbIndhbGxldCJdfX0.4Hxb8dlYGZlV-M0JiCY3SYMaC50LshKvqMqU3gWwH2Y"; // Replace with your actual bearer token
        $result=initializeNSDL($full_name, $mobile_number, $user_email, $bearer_token);
        $result=json_decode($result);
        $status_code=$result->status_code;
        if ($status_code==200){
        			$url= $result->data->url;
        			echo $url;
					$client_id=$result->data->client_id;
					$result=getUploadLink($client_id,$bearer_token);
					$result=json_decode($result);
					if($result->status_code==200){
						$key=$result->data->fields->key;
						$policy=$result->data->fields->policy;
						$fields_array=(array)$result->data->fields;
						$x_amz_signature=$fields_array['x-amz-signature'];
						$x_amz_date=$fields_array['x-amz-date'];
						$x_amz_credential=$fields_array['x-amz-credential'];
						$x_amz_algorithm=$fields_array['x-amz-algorithm'];
						$cwd=getcwd();
						$file_path=$cwd.'/assets/uploadPdf/147472925132076-2015.pdf';
						$status=uploadPDF($x_amz_signature,$x_amz_date,$x_amz_credential,$key,$policy,$x_amz_algorithm,$file_path);
						echo "Pdf uploaded succed";
						$report=getUserReport($client_id);
						print_r($report);
					}else{
						echo $result->message;
					}
					
        }
        else{
        	echo $result->message;
        }


    }



    public function getReport(){
    	if(isset($_GET['client_id'])){
    		$client_id=$_GET['client_id'];
    		
    	}
    	else{
    		echo "Error while getting client id";
    	}
    }



}