
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>जिला प्रसाशन, पिथौरागढ़</title>
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
					<!--<h2 align="center" style="text-transform:uppercase;font-size: 90%;font-weight: bold;"><?php echo $info->shop_name; ?></h2>
			        <h3 align="center" style="font-variant:small-caps;font-size: 80%;font-weight: bold;">
						<?php echo "पिथौरागढ़";//." ".$info->address_2." ".$info->city; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;font-size: 80%;font-weight: bold;">
						<?php echo "उत्तराखंड"/*." - ".$info->pin*/; ?>
			        </h3>-->
			        <h2 align="center"  style="text-transform:uppercase;font-size: 90%;font-weight: bold;">जिला शिकायत प्रकोष्ठ </h2>
			        <h3 align="center" style="font-variant:small-caps;font-size: 80%;font-weight: bold;">पिथौरागढ़</h3>
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
				<th>शिकायत संख्या</th>
				<td><?php echo $detail->complain_number;?></td>
			</tr>
             
             <tr>
             	<th>नाम</th>
				<td><?php echo $detail->complainer_name;?></td>
			</tr>

			<tr>
				<th>मोबाइल</th>
				<td><?php echo $detail->mobile_number;?></td>
			</tr>
			
            
            <tr>
				<th>पता</th>
				<td><?php echo $detail->address;?></td>
			</tr>

			<tr>
				<td colspan="2"><br>
                  15 दिन की अवधि में शिकायत निस्तारण न होने की दशा में नंबर पर संपर्क करें !
				</td>
			</tr>
		

		</table>





	
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
	        <button id="printbtn" class="btn" type="button" onclick="window.print();" >
		        	 Print
		    </button>
	    </center>

    </div>
</body>