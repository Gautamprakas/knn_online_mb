<?php 

function initializeNSDL($full_name, $mobile_number, $user_email, $bearer_token) {

        $url = 'https://kyc-api.surepass.io/api/v1/esign/initialize';

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $bearer_token
        ];

        $data = [
            'pdf_pre_uploaded' => true,
            'callback_url'=> "https://www.google.com",
            'config' => [
                'auth_mode' => '1',
                'reason' => 'Contract',
                'positions' => [
                    '1' => [
                        [
                            'x' => 10,
                            'y' => 20
                        ]
                    ],
                    '2' => [
                        [
                            'x' => 0,
                            'y' => 0
                        ]
                    ]
                ]
            ],
            'prefill_options' => [
                'full_name' => $full_name,
                'mobile_number' => $mobile_number,
                'user_email' => $user_email
            ]
        ];

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Execute cURL session
        $response = curl_exec($ch);
		return $response;
}


function getUploadLink($clientID,$bearer_token){


		$url="https://kyc-api.surepass.io/api/v1/esign/get-upload-link";
		$headers=[
			'Content-Type: application/json',
			'Authorization: Bearer '.$bearer_token

		];
		$data=[
			"client_id" =>$clientID

		];
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response=curl_exec($ch);
        return $response;

        
        
    }

function uploadPDF($x_amz_signature,$x_amz_date,$x_amz_credential,$key,$policy,$x_amz_algorithm,$file_path){

	$url="https://surepass-esign.s3.amazonaws.com/";
	$fields = [
    'key' => $key,
    'policy' => $policy,
    'x-amz-credential' =>$x_amz_credential ,
    'x-amz-date' => $x_amz_date,
    'x-amz-algorithm' => $x_amz_algorithm,
    'x-amz-signature' => $x_amz_signature,
    'file' => new CURLFile($file_path),
];
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);

	if ($response === false) {
	    return 'Curl error: ' . curl_error($ch);
	    curl_close($ch);
	} else {
	    return $response;
	    curl_close($ch);
	}

}


function getStatus($clientID,$bearer_token){
	$url="https://kyc-api.surepass.io/api/v1/esign/status/".$clientID;
	$headers=[
		'Content-Type:application/json',
		'Authorization:Bearer '.$bearer_token
	];
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response=curl_exec($ch);
	if ($response==false){
		return "Curl error".curl_error($ch);
	}
	return $response;
	curl_close($ch);
	

}

function getUserReport($clientID){

	$url="https://kyc-api.surepass.io/api/v1/esign/report/".$clientID;
	$headers=[
		'Content-Type:application/json',
		'Authorization:Bearer '.BEARER_TOKEN
	];
	$data=[
		"categories"=>["name_match"]

	];
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);

	if ($response === false) {
	    return 'Curl error: ' . curl_error($ch);
	    curl_close($ch);
	} else {
	    return $response;
	    curl_close($ch);
	}
}
