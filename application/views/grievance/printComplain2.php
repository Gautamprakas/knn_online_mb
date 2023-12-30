	<style type="text/css">

    #printable { display: block; }

    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
</style>
<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>
	
	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
			<div class="row" style="overflow-x: scroll">
			<?php $studentId = $this->uri->segment(3); //echo $studentId;?>	
				<div class="gap" style="height: 20px;"></div>
				<IFRAME SRC="<?php echo base_url(); ?>index.php/grievanceController2/finalComplain2/<?php echo $complain_number; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>
                
			</div>
            <center>
            <a href="<?php echo base_url("index.php/grievanceController2/addGrievance"); ?>" class="btn">नये शिकायतकर्ता का विवरण जोड़ें</a>
            </button>
        </center>
		</div>
	</div>
	<!-- END CONTENT 
	============================================= -->
