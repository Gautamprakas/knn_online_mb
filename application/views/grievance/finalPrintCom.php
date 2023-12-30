
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>KNN ENGINEERING MIS</title>
		<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
		<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style1.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	<style type="text/css">
		
		th:after{
			content: " : ";
		}

		/*table tr td{
			border: none;

			
		}
		table tr th{
			border: none;
			
		}	*/
	</style>
	<style type="text/css" media="print">
	    @page 
	    {
	        size: auto;   /* auto is the initial value */
	        margin-bottom: 0mm;  /* this affects the margin in the printer settings */
	    }
        
	</style>
	
</head>

<body>

	<div id="page-wrap" style="margin:auto; width:80%;">
		<?php 
		       $res = $this->db->where("username","Admin")
		                       ->get("general_settings");
	           $info = $res->row();
?>		
		<table style="width:100%; margin: auto">
			<tr>
				<td style="border: none;">
					<h2 align="center" style="text-transform:uppercase;font-size: 90%;font-weight: bold;"><?php echo "कानपुर नगर निगम"; ?></h2>
			        <h3 align="center" style="font-variant:small-caps;font-size: 80%;font-weight: bold;">
						<?php echo "कानपुर";//." ".$info->address_2." ".$info->city; ?>
			        </h3>
			        <!--<h3 align="center" style="font-variant:small-caps;font-size: 80%;font-weight: bold;">
						<?php echo "उत्तर प्रदेश"/*." - ".$info->pin*/; ?>
			        </h3>-->
			        <h3 align="center" style="font-variant:small-caps;font-size: 70%;font-weight: bold;">
						<?php if(strlen($info->phone_number > 0 )){echo "फ़ोन : ".$info->phone_number." ";} ?>
			            <?php //echo "मोबाइल : ".$info->mobile_number; ?>
			        </h3>
				</td>
			</tr>
		</table>
		
  <hr><br>      
		<div style="clear:both"></div>
	<?php $studentId = $this->uri->segment(3); //echo $studentId;?>	
<?php
	$this->db->where("complain_number",$studentId);
	$detail = $this->db->get("complain_record")->row();	
?>
		
		<table  id="items" align="center" style="width:100%;margin: auto;font-size :85%;font-weight: 400">
			<!--<tr>
				<th>Application Number </th>
				<td><?php //echo $detail->application_number; ?></td>
				<th>DESIGNATION</th>
				<td><?php //echo $detail->designation; ?></td>
			</tr>-->
			
			<tr>
				<th>दिनांक</th>
				<td><?php echo date("m-d-Y");?></td>
			</tr>

			<tr>
				<th>कार्य संख्या</th>
				<td><?php echo $detail->complain_number;?></td>
			</tr>

			<!-- <tr>
				<th>क्रमांक</th>
				<td><?php //echo $detail->age;?></td>
			</tr> -->


			<tr>
				<th>Zone</th>
				<td><?php echo $detail->tehsil;?></td>
			</tr>

			<tr>
				<th>Ward</th>
				<td><?php echo $detail->block_name;?></td>
			</tr>

			<tr>
				<th>पत्रावली संख्या</th>
				<td><?php echo $detail->father_name;?></td>
			</tr>

			<tr>
				<th>कार्य का नाम</th>
				<td><?php echo $detail->subject;?></td>
			</tr>

			<tr>
				<th>विवरण</th>
				<td><?php echo $detail->complain;?></td>
			</tr>

             <tr>
             	<th>प्रस्तावक</th>
				<td><?php echo $detail->complainer_name;?></td>
			</tr>

			<tr>
				<th>कार्य का अग्रान</th>
				<td><?php echo $detail->pincode;?></td>
			</tr>

			<tr>
				<th>Aagraan(Sanctioned Cost)</th>
				<td><?php echo $detail->mobile_number;?></td>
			</tr>

			<tr>
				<th>Approval Date</th>
				<td><?php echo $detail->gender;?></td>
			</tr>
			

			<tr>
				<th>Budget Head</th>
				<td><?php echo $detail->address;?></td>
			</tr>

		
			<tr><td colspan="2">
				
			</td></tr>
			
			<tr style="border: none;">
				<!--<th style="border: none;">
				
					<div style="width: 220px; height: 148px; /*border: 1px solid #ccc;*/">
						<?php /*if(strlen($detail->uploaded_file) > 0 ){?>
							<img alt="<?php echo $detail->complainer_name;?>" height="148" width="138" src="<?php echo base_url("/assets/complain/$detail->uploaded_file"); */?>" />
						<?php //}?>
					</div>
					
				</th>
				<td style="border: none;">
					<!--<div style="width: 140px; height: 150px;">
						<?php // echo $detail->complain;?>
					</div>-->
				<!--</td>-->

				<?php if( $detail->cur_status != "Redressed" && $detail->cur_status != "UnRedressed"): ?>
				<td   valign="bottom" style="text-align: center;padding-top: 5%" colspan="2">
					<?php /*if($this->uri->segment(4) == "lskajdfasiuf09e4iuorivmnsldfosuteioruetoi"):?>
						Your admission is not confirmed in Lakshya Academy. You have to submit this printout to institute and take approval 
						of admission than you can be use facilities of Lakshya Academy.
					<?php elseif($this->uri->segment(4) == "lkfjsaodif0w9809sodiuf4rifsd9f80w934oiwoifu"):?>
						<h4 style="color: #019a61;">Your Registration is confirmed with Lakshya Academy.</h4>
					<?php endif;*/?>
					
					<strong style="font-weight: bold;">भवदीय</strong>
		        	<br/>
					कानपुर नगर निगम
					<br/>
				</td>
			<?php endif; ?>
			</tr>


		</table>




<?php if( 1!=1 &&  ($detail->cur_status == "Redressed" || $detail->cur_status == "UnRedressed")): ?>
		<table  id="items" align="center" style="width:100%;  margin:0px; padding-left:5%; alignment-adjust:center;border-spacing: 0px 16px; " cellspacing="2px">
			<tr>
				<th>FORWARD TO</th>
				<td><?php echo $detail->department;?></td>
				<th>ON DATE</th>
				<td><?php echo $detail->assign_date;?></td>
			</tr>
			<tr>
				<th> ASSINGED OFFICER</th>
				<td><?php echo $detail->officer_name;?></td>
				<th>SOLVED BY OFFICER ON</th>
				<td><?php echo $detail->solved_date;?></td>
			</tr>
            
			<tr>
				<th>OFFICER EXPLAINATION</th>
				<td colspan="3"><?php echo $detail->explaination;?></td>
			</tr>

			<tr>
				<th>STATUS</th>
				<td><?php echo $detail->cur_status;?></td>
				<th>ON DATE</th>
				<td><?php echo $detail->decision_date;?></td>
			</tr>
			
			<tr style="border: none;">
				<th style="border: none;">
				
					<div style="width: 220px; height: 148px; /*border: 1px solid #ccc;*/">
						<?php if(strlen($detail->uploaded_file_bydep) > 0){?>
							<img alt="<?php echo $detail->officer_name;?>" height="148" width="138" src="<?php echo base_url("/assets/complain/$detail->uploaded_file_bydep");?>" />
						<?php }?>
					</div>
					
				</th>
				<td style="border: none;">
					<!--<div style="width: 140px; height: 150px;">
						<?php  echo $detail->complain;?>
					</div>-->
				</td>
				<td colspan="2" width="50%" valign="bottom">
					<?php /*if($this->uri->segment(4) == "lskajdfasiuf09e4iuorivmnsldfosuteioruetoi"):?>
						Your admission is not confirmed in Lakshya Academy. You have to submit this printout to institute and take approval 
						of admission than you can be use facilities of Lakshya Academy.
					<?php elseif($this->uri->segment(4) == "lkfjsaodif0w9809sodiuf4rifsd9f80w934oiwoifu"):?>
						<h4 style="color: #019a61;">Your Registration is confirmed with Lakshya Academy.</h4>
					<?php endif;*/?>
					
					<br/>
					<br/><br/>
					<strong>Regards</strong>
					<br/>
				कानपुर नगर निगम
					<br/>
				</td>
			</tr>
		</table>
<?php endif; ?>		
		<br>
		<br>
		<center>
<style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>
<button id="printbtn" class="btn" type="button" 
onclick="window.open('<?php echo base_url("grievanceController/finalPrintCom2/$detail->complain_number");?>','_blank');" >
	        	 Print
	        </button>
	    </center>
    </div>
	
</body>