<?php
function sms($number,$msg)
{  $url="http://bulksms.pranimation.in/api/sendmsg.php?user=dmkanpurdehatf&pass=kanpur@123&sender=BSAKND&phone=".$number."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
	//$url = "http://mysms.sms7.biz/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authkey."&message=".urlencode($message)."&senderId=".$senderID."&routeId=1&mobileNos=".$number."&smsContentType=english";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$output=curl_exec($ch);
	curl_close($ch);
}




function checkBalSms()
{ 
$url = "http://bulksms.pranimation.in/api/checkbalance.php?user=dmkanpurdehat&pass=kanpur@123";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);
curl_close($ch);
return $output;
}

function calDistance($lat1, $lon1, $lat2, $lon2) {
	$theta = $lon1 - $lon2;
	$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
	$miles = acos($miles);
	$miles = rad2deg($miles);
	$result['miles'] = $miles * 60 * 1.1515;
	$result['feet'] = $result['miles'] * 5280;
	$result['yards'] = $result['feet'] / 3;
	$result['kilometers'] = $result['miles'] * 1.609344;
	$result['meters'] = $result['kilometers'] * 1000;
	return $result;
}


function getAge($dob) {
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	return $diff->format('%yYears, %mMonths, %dDays');
}

function highlightText($text, $keywords) {
	$color = "yellow";
	$background = "red";
	foreach($keywords as $keyword) {
		$highlightWord = "<strong style='background:".$background.";color:".$color."'>" . $keyword . "</strong>";
		$text = preg_replace ("/" . trim($keyword) . "/", $highlightWord, $text);
	}
	$keywords = array("Coding 4 Developers","Coding for developers");
	echo highlightText($text, $keywords);
	return $text;
}




function email( $toMail , $info , $type){

   require 'application/libraries/phpmailer/mail.php';
   $sendFrom = "edmpithoragarh@gmail.com";
   $password = "anjdin#@123";
   $senderName = "Grievance Solution Pithoragarh";
   $sendTo = $toMail;
   $receiverName = "";
   switch( $type ){

   	  case "forward" :  $subject = 'A complaint(complaint id : '.$info["cno"].') has been received against your department.';
                        $body    = '<p>Dear Sir / Madam,</p>
									<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;A complaint (complaint number : '.$info["cno"].' ) has been received against your department.</p>
									<p>Please Take necessary action immediately .</p>
									<p>For further info please click the following link.</p>
									<p><a href="http://pithoragarh.vdsai.com/pithoragarh_grievance" target="_blank">Grievance Solution Pithoragarh</a></p><p>&nbsp;</p>
									<p style="text-align: right;">Regards<br>
									Grievance Redressal Cell<br>
									District Administration<br>
									Pithoragarh<br></p>';
                        break;

      case "reminder" : $subject = 'Complaint id : '.$info["cno"].' is pending for disposal, only 3 days are left for disposal.';
                        $body    = '<p>Dear Sir / Madam,</p>
									<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Complaint id : <span style="text-decoration: underline;">'.$info["cno"].'&nbsp;</span> is pending for disposal, only 3 days are left for disposal. Please expedite before date <span style="text-decoration: underline;">'.$info["due_date"].'</span> .</p>
									<p>For further info please click the following link.</p>
									<p><a href="http://pithoragarh.vdsai.com/pithoragarh_grievance" target="_blank">Grievance Solution Pithoragarh</a></p><p>&nbsp;</p>
									<p style="text-align: right;">Regards<br>
									Grievance Redressal Cell<br>
									District Administration<br>
									Pithoragarh<br></p>';
                        break;

      case "warning" :  $subject = 'Disposal time for complaint id : '.$info["cno"].' has lapsed.';
                        $body    = '<p>Dear Sir / Madam,</p>
									<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Disposal time for complaint id : <span style="text-decoration: underline;">'.$info["cno"].'</span> has lapsed. Please consider this as notice from the District magistrate and appropriate action will be initiated against you for non-compliance.</p>
									<p>For further info please click the following link.</p>
									<p><a href="http://pithoragarh.vdsai.com/pithoragarh_grievance" target="_blank">Grievance Solution Pithoragarh</a></p>
									<p>&nbsp;</p>
									<p style="text-align: right;">Regards<br>
									Grievance Redressal Cell<br>
									District Administration<br>
									Pithoragarh<br></p>';
                        break;                             
      
      default :  $subject = "";
                 $body = "";
                 break;                  
   }
   if(!empty($subject)){
   	 try{
   	 	return myMail($sendFrom,$password,$senderName,$sendTo,$receiverName,$subject,$body);
   	 }catch(Exception $e){
   	 	return "Fail To Send Mail";
   	 }
   }else{
   	 return "config error";
   }
}


