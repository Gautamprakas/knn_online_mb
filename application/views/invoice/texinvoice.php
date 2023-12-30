<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Sale Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	
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
<?php $info = $this->db->get("general_settings")->row();?>
	<div id="page-wrap">

		<textarea id="header">Recharge Clip</textarea>
		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;">
					<!-- 
					
					 -->
					 
				</td>
				<td style="border: none;">
					<h1 align="center" style="font-variant:small-caps;"><?php echo $info->shop_name; ?></h1>
			        <h4 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1." ".$info->address_2; ?>
			        </h4>
			        <h4 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo $info->city." ".$info->state." Mobile : ".$info->mobile_number; ?>
			        </h4>
			         <h4 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->fax_number > 0 )){echo "Company's VAT TIN : ".$info->fax_number." ";} ?>
			           
			        </h4>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
		
		<div style="clear:both"></div>
		
		<div id="customer" >
        	<div style="display:inline-block; float:left">
            <table>
            	<?php 
            	$this->db->where("invoice_no",$bill_no);
            	$print = $this->db->get("day_book")->row();
            	$customer_number = $print->paid_by;
            	$this->db->where("customer_number",$customer_number);
            	$customer = $this->db->get("customer")->row();
            	if($customer):?>
                    <tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;"><strong>Name : </strong><?php echo $customer->customer_Name;?></td>
                    </tr>
                     <tr>
                    	<td style="border:none;"><strong>Customer ID : </strong><?php echo $customer->customer_number;?></td>
                    </tr>
                     <tr>
                    	<td style="border:none;"><strong>Box Number : </strong><?php echo $customer->box_no;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Address : </strong><?php echo $customer->AddressLine1." ".$customer->AddressLine2;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Mobile No : </strong><?php echo $customer->mobile1;?></td>
                    </tr>
                   
                   
                <?php else:?>
                	<tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;"><?php echo $customer_number;?></td>
                    </tr>
                <?php endif;?>
            </table>
			</div>
			
			
			
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Recharge Order</h3></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	Reciept No.
                    </td>
                    <td><?php echo $this->uri->segment(3);?> </td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><?php echo date("d-M-Y", strtotime($print->pay_date)); ?></td>
                </tr>
            </table>
            </div>
           
					<div  style="margin-left:180px;"></br></br></br>
						<h1  style="border: 2px ; padding: 3px; width: 220px; margin-left:125px;">
						&nbsp;Recharge Slip
						</h1>
			</div>
		
		</div>
		
		<table id="items" style="border: 1px solid #000;">
		
		  <tr style="border: 1px solid #000;">
		       <th width="8%" style="border: 1px solid #000;">S.No.</th>
              
               <th width="25%" style="border: 1px solid #000;">Particulars</th>
               <th width="15%" style="border: 1px solid #000;">Rs.</th>
               <th width="15%" style="border: 1px solid #000;">P.</th>
               <th width="35%" style="border: 1px solid #000;">Remarks</th>
              
		  </tr>
		  <?php 
		  
		  ?>
		  <tr class="item-row">
		      <td style="border: 1px solid #000;">1</td>
		      <td style="border: 1px solid #000;">Monthly Recharge</td>
		      <td style="border: 1px solid #000;"><?php echo $print->amount;?>
		     
		      </td>
		    <td style="border: 1px solid #000;">
		     
		      </td>
		       <td style="border: 1px solid #000;">
		     
		      </td>
		  </tr>
		  <tr class="item-row">
		      <td style="border: 1px solid #000;">2</td>
		      <td style="border: 1px solid #000;">Set of Box</td>
		      <td style="border: 1px solid #000;">
		     
		      </td>
		      <td style="border: 1px solid #000;">
		     
		      </td>
		       <td style="border: 1px solid #000;">
		     
		      </td>
		    
		  </tr>
		  <tr class="item-row">
		      <td style="border: 1px solid #000;">2</td>
		      <td style="border: 1px solid #000;">Services</td>
		      <td style="border: 1px solid #000;">
		     
		      </td>
		      <td style="border: 1px solid #000;">
		     
		      </td>
		       <td style="border: 1px solid #000;">
		     
		      </td>
		    
		  </tr>
		  <tr class="item-row">
		      <td style="border: 1px solid #000;">4</td>
		      <td style="border: 1px solid #000;">Other </td>
		      <td style="border: 1px solid #000;">
		     
		      </td>
		      <td style="border: 1px solid #000;">
		     
		      </td>
		       <td style="border: 1px solid #000;">
		     
		      </td>
		    
		  </tr>
	  
		 
		
		     
		      
		    
		
		 
		   <tr>
		      <td colspan="4" align="left" style="border: 1px solid #000;"><strong>Total</strong></td>
		       
		      <td style="border: 1px solid #000;" ><?php echo $print->amount;?></td>
		  </tr>
          
		  <tr>
		      <td colspan="4" align="left" style="border: 1px solid #000;"><strong>Amount Paid</strong></td>
		      
		      <td style="border: 1px solid #000;"><?php echo $print->amount;?><div id="total"></div></td>
             
		  </tr>
		
		</table>
		</br>
		<div> Paid Amount in words : <div class="number"></div></strong>
		<script> document.write(convert_number(<?php  echo $print->amount;?> )); 
		</script> Rupee Only/-</strong>
	           </div>
		<table width="100%" align ="center">
		</br>
				
		</table>
		<div >
		</br>
		</br>
		  <h3>Terms & conditions :</h3>
		  1). प्रत्येक माह की 15 तारीख तक पेमेन्ट जमा करना अनिवार्य है |</br>
		  2). पेमेन्ट न होने की दशा में बॉक्स बंद कर दिया जाये गा |</br>
		
		</div>
		</br>
		</br>
		</br>
		</br>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
        
  
    </div>
   
	</div>
</body>

</html>