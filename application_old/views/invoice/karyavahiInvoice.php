<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>BSA Office Notice</title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: 40px; left: 30px; }
	    }
	</style>
	
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  /* Crore */
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>
	<div id="printcontent">
	<div id="page-wrap" style="border:0px solid #333;">
<?php 
		$kno = $this->uri->segment(3);
		$this->db->where("karvahi_number",$kno);
		$knof = $this->db->get("karyavahi")->row();
		$this->db->where("teacher_id",$knof->teacher_id);
		$school_info=$this->db->get("school_teachers")->row();
?>		
		<table style="width: 100%">
			<tr>
				
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;">कार्यालय जिला बेसिक शिक्षा अधिकारी जनपद हमीरपुर   </h1><br>
					<br></br>
			        <h2 align="left" >
						पत्रांक / बेसिक / <?php echo $knof->karvahi_number;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;/ 16-17&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
						&nbsp; &nbsp;&nbsp;&nbsp;
						&nbsp; &nbsp;&nbsp;&nbsp;
						&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; दिनांक :<?php echo $knof->kdate;?>
			        </h2>
			        <br>
			        </br>
			        <h2 align="center" style="font-variant:small-caps;">कारण बताओ नोटिस 
						
			        </h2>
			        <h3 align="center" style="font-variant:small-caps;">
						<br></br>
			        </h3>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block;">
            <table> 
                    <tr>
                    	<td style="border:none; line-height: 15px;">
                    		<h2>कु0 /श्री /श्रीमती : <strong><?php echo $school_info->teacher_name;?></strong></h2>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 15px;">
                    		<h2><strong><?php echo $school_info->school_name;?></strong></h2>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 15px;">
                        	<h2><strong><?php echo $school_info->block;?></strong></h2>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 15px;">
                        	<br></br>
                        </td>
                    </tr>
            </table>
			</div>
           
		
		</div>
		<div><font size = "3">
		<p style="text-align:justify">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;जनपद  के शैक्षिक गुणवत्ता के सम्बन्ध में  कलेक्ट्रेट में स्थापित कंट्रोल रूम के दूरभाष 0511-270624,270618,270619,270621
		        से दिनांक  <?php echo $knof->kdate;?> समय <?php echo $knof->ktime;?> को आप के विद्यालय के दूरभाष नंबर  <?php echo $school_info->teacher_mobile1;?>,
		        <?php echo $school_info->teacher_mobile_2;?>, पर वार्ता की गई जिसमे पाया गया की  
		        <?php echo $knof->reason;?>.यह आप की घोर लापरवाही एवं उदासीनता का घोतक है |<br></br>
              
		&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;अतः आप को निर्देशित किया जाता है की आप उक्त के सम्बन्ध में साक्ष्य सहित अपना स्पष्टीकरण 07 दिवस में प्रस्तुत करना सुनिश्चित करे 
		अन्यथा की स्तिथि में सम्पूर्ण उत्तरदायित्व  आप का मानते हुए आप के विरुद्ध विभागीय अनुशासनात्मक कार्यवाही अमल में लायी जाये गी जिसका सम्पूर्ण उत्तरदायित्व आप का होगा | </p>		
    </font></div>
    <br></br>
    <br></br>
     <table style="width: 100%">
                <tr>
                   
                   <td><br></br></td> </tr>
              
               
                <tr>
                   
                    <td style="line-height: 15px;"><h2 align="right">(राजेश कुमार श्रीवास  )&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
                </tr>
                <tr>
                    
                    <td style="line-height: 15px;"><h2 align="right">जिला बेसिक शिक्षा अधिकारी </h2></td>
                </tr>
                <tr>
                    <td class="meta-head" style="line-height: 15px;"><h2 align="right">हमीरपुर  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
                   
                </tr>
              
                </tr>
            </table>
           
            <table style="width: 100%">
			<tr>
				
				<td ><font size = "3">
        	 &nbsp; &nbsp;&nbsp;&nbsp; <b> प्रष्टोकन/बेसिक /नोटिस  <?php echo $knof->karvahi_number;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ 16-17&nbsp; &nbsp;&nbsp;&nbsp;
					दिनांक :<?php echo $knof->kdate;?>
			</b></font> </td>
			</tr>
			<tr>
			<td><font size = "3">
		&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;प्रतिलिपि :-निम्नलिखित  को सूचनार्थ एवं अवश्यक कार्यवाही हेतु प्रेषित है -<br>
		&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;1).जिलाधिकारी  महोदय ,हमीरपुर  की सेवा में सादर अवलोकनार्थ प्रेषित |<br>
		&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;2).मंडलीय सहायक शिक्षा निदेशक बेसिक हमीरपुर  मंडल, हमीरपुर  |<br>
		&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;3).खंड शिक्षा अधिकारी विकास खंड <?php echo $school_info->block;?> |<br>
			</br>
			</td>
			</tr> 
			  <tr>
                   
                   <td><br></td>
                </tr>
			
                <tr>
                   
                    <td style="line-height: 15px;"><h2 align="right">(राजेश कुमार श्रीवास  )&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  </h2></td>
                </tr>
                <tr>
                   
                    <td style="line-height: 15px;"><h2 align="right">जिला बेसिक शिक्षा अधिकारी  </h2></td>
                </tr>
                <tr>
                   
                    <td style="line-height: 15px;"><h2 align="right">हमीरपुर &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                    	</h2>
					</td>
                </tr>
               
            </table> 
            
            	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print
        </button>
    </div>     
</body>

</html>