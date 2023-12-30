<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<style>
    .info-box .info-box-stats span.info-box-title{
        font-size: 12px;
    }
</style>
<?php 
$user = $this->session->userdata("login_type");
?>
<?php 
  /*$todayattendance = $this->loginmodel->todayAttendance();*/
  $this->load->helper('sms');
  list($start_date,$end_date) = getStartEndDate();

  $count = $this->loginmodel->grievanceCount();
  $sanction_cost = $this->loginmodel->getDonutChartData('sanction_cost');
  $tender_cost = $this->loginmodel->getDonutChartData('tender_cost');
  $payment_cost = $this->loginmodel->getDonutChartData('payment_cost');

  $engineering = $this->loginmodel->getDonutChartData('engineering');
  $tender = $this->loginmodel->getDonutChartData('tender');
  $payment = $this->loginmodel->getDonutChartData('payment');
  ?>
  <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-white">
            <!-- <h4 style="color:red;">Note : Date filter not applied on last 4 blocks Engineering File, Tender Details, Accounting File and Others</h4> -->
            <div class="panel panel-white">
                <form action="" method="get">
                    <div class="col-sm-4 form-group">
                        <label class="col-sm-4 control-label">
                            Start Date  <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-8">
                            <input type="date" name="start_date" class="form-control m-b-sm" required="required" value="<?php echo $start_date; ?>">
                        </div>  
                    </div>

                    <div class="col-sm-4 form-group">
                        <label class="col-sm-4 control-label">
                            End Date  <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-8">
                            <input type="date" name="end_date" class="form-control m-b-sm" required="required" value="<?php echo $end_date; ?>">
                        </div>  
                    </div>

                    <div class="col-sm-4 form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
  </div>
  <div class="container">
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-white">
                <h2 style="text-align:center;">Ward Wise Sanction Cost <br>₹<span id="sanction_cost_donut_total"></span></h2>
                <div id="sanction_cost_donut" class="dashboard-donut-chart"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-white">
                <h2 style="text-align:center;">Ward Wise Tender Cost <br>₹<span id="tender_cost_donut_total"></span></h2>
                <div id="tender_cost_donut" class="dashboard-donut-chart"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-white">
                <h2 style="text-align:center;">Ward Wise Payment Cost <br>₹<span id="payment_cost_donut_total"></span></h2>
                <div id="payment_cost_donut" class="dashboard-donut-chart"></div>
            </div>
        </div>
  </div>

    <div class="container">
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-white">
                <h2 style="text-align:center;">Ward Wise Engineering <br><span id="engineering_donut_total"></span></h2>
                <div id="engineering_donut" class="dashboard-donut-chart"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-white">
                <h2 style="text-align:center;">Ward Wise Tender <br><span id="tender_donut_total"></span></h2>
                <div id="tender_donut" class="dashboard-donut-chart"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-white">
                <h2 style="text-align:center;">Ward Wise Payment <br><span id="payment_donut_total"></span></h2>
                <div id="payment_donut" class="dashboard-donut-chart"></div>
            </div>
        </div>
  </div>

                <div id="main-wrapper" class="container">
    <div class="container">
  <div class="row">
     <div class="col-sm-12">
        <!-- start: FORM WIZARD PANEL -->
        <div class="panel panel-white"> 
    <div id="chartdiv" ></div>
<h3 style="text-align: center">
    <?php
        /* if($this->session->userdata("username") == "Admin"){
            echo "कुल पंजीकृत कार्य = ".($count["pendingAccToLastDate"] + $count["pendingAccToLast15Days"]+$count["underProcessAccToLastDate"] + $count["UnderProcessAccToLast15Days"]+$count["redressed"]+$count["solved"]+$count["review"]+$count["unredressed"]);
        } else {
            echo "कुल पंजीकृत कार्य = ".($count["pendingAccToLastDate"] + $count["pendingAccToLast15Days"]+$count["underProcessAccToLastDate"] + $count["UnderProcessAccToLast15Days"]+$count["redressed"]+$count["solved"]+$count["review"]+$count["unredressed"]+$count["assign"]);
        }*/
        echo "Total Work = ".($count["pending"] +$count["solved"] + $count["redressed"]);
    ?>
</h3>
<?php if($this->session->userdata("shop_id") != "3"): ?>
     <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <?php 
                     if($this->session->userdata("username") == "Admin"){
                        $forwarded = $count["forwarded"] + $count["review"] + $count["solved"] + $count["redressed"] + $count["unredressed"];
                        $notforwarded = $count["pending"];
                     }else{
                        $forwarded = $count["forwarded"] + $count["review"] + $count["solved"] + $count["redressed"] + $count["unredressed"];
                        $notforwarded = $count["assign"];
                     }
                     /*$forwardedWidth = ($forwarded*100)/($forwarded+$notforwarded);
                     $notforwardedWidth = ($forwarded*100)/($forwarded+$notforwarded);*/
            ?>
            <!--<h5 style="background: #ff3232;color:white;float:left;width:50%;text-align: center;padding: 5px"><?php echo $notforwarded; ?> NOT FORWARDED</h5>
            <h5 style="background: #328332;color:white;float:left;width:50%;text-align: center;padding: 5px"><?php echo $forwarded; ?> FORWARDED</h5>-->
        </div>
        <div class="col-lg-3"></div>
    </div><br>
<?php endif; ?>    
  </div>
</div>
  </div>
</div>    


<style>
    #columnchart_material {
        width: 100%;
        height: 300px;
        font-size: 15px;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable(JSON.parse('<?php echo json_encode($count['dep_wise_report'],JSON_NUMERIC_CHECK ); ?>'));

    var options = {
      chart: {
        title: 'Department Wise',
        subtitle: 'Engineering, Tender, Accounting',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div id="columnchart_material" ></div>
        </div>
    </div> 
</div>
<br>



                    <div class="row">
                        <?php if($this->session->userdata("username") == "Admin"): ?>
                        <div class="col-lg-3 col-md-6 padding-0">
                            <div class="panel info-box panel-white" style="background: #6499be;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                      <p><span class="" style= "color:white;">
                                      
                                     <?php echo $count["pending"]; ?> </span></p>
                                        <span class="info-box-title" style= "color:white;"><strong></strong> <a href="<?php echo base_url();?>index.php/grievanceController/pending"><strong style= "color:white;">(Engineering File)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-share"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                     <?php if($this->session->userdata("username") != "Admin"): ?>
                        <div class="col-lg-3 col-md-6" style="display: none;">
                            <div class="panel info-box panel-white" style="background: #6499be;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        
                                       <p><span class="" style= "color:white;">
                                           <?php echo $count["assign"];?>
                                       </span></p>
                                        <span class="info-box-title"><strong style= "color:white;">सन्दर्भित</strong><a href="<?php echo base_url("index.php/grievanceController/assign2");?>"><strong style= "color:white;">(view List)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                         <?php if($this->session->userdata("shop_id") != "3"): ?>
                       <div class="col-lg-3 col-md-6 padding-0" style="display: none;">
                            <div class="panel info-box panel-white" style="background: #DB7093;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                   
                                        <p><span class="" style= "color:white;">
                                            <?php echo $count["forwarded"];?>
                                        </span></p>
                                        <span class="info-box-title" style= "color:white;"><strong>अग्रसारित</strong><a href="<?php echo base_url("index.php/grievanceController/forwarded");?>"><strong style= "color:white;"> (Forwarded)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    <?php endif; ?>


                    <?php if($this->session->userdata("username") == "Admin"): ?>
                     <div class="col-lg-3 col-md-6" style="display: none;">
                            <div class="panel info-box panel-white" style="background: #cccc00;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                  
                                    
                                        <p class="">
                                            <span class="" style= "color:white;">
                                            <?php echo $count["underProcessAccToLastDate"] + $count["UnderProcessAccToLast15Days"];?>
                                        </span>
                                        </p>
                                       
                                        <span class="info-box-title" style= "color:white;"><strong style= "color:white;">कार्य गतिमान</strong><a href="<?php echo base_url("index.php/grievanceController2/underProcess");?>"><strong style= "color:white;">(Under Process)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-ok-circle"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="col-lg-3 col-md-6" style="display: none;">
                            <div class="panel info-box panel-white"  style="background: #ff3232;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                  
                                    
                                        <p class="">
                                            <span class="" style= "color:white;">
                                            <?php echo $count["pendingAccToLastDate"] + $count["pendingAccToLast15Days"];?>
                                        </span>
                                        </p>
                                       
                                        <span class="info-box-title" style= "color:white;"><strong style= "color:white;">कार्य लंबित</strong><a href="<?php echo base_url("index.php/grievanceController2/beyondTimeLimit");?>"><strong style= "color:white;">(Pending)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-ok-circle"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>





                         <?php if($this->session->userdata("shop_id") != "3"): ?>
                         <div class="col-lg-3 col-md-6 padding-0" style="display: none;">
                            <div class="panel info-box panel-white" style="background: #4c4ca6;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                  
                                    
                                        <p class="">
                                            <span class="" style= "color:white;">
                                            <?php echo $count["review"];?>
                                        </span>
                                        </p>
                                       
                                        <span class="info-box-title"><strong style= "color:white;">पुनर्विचार  के लिए</strong><a href="<?php echo base_url("index.php/grievanceController/review");?>"><strong style= "color:white;">(view List)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--</div><!-- Row -->

       
                  <!--<div class="row">-->   
                         <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white" style="background: #4ca64c;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                  
                                    
                                        <p class="">
                                            <span class="" style= "color:white;">
                                            <?php echo $count["solved"];?>
                                        </span>
                                        </p>
                                       
                                        <span class="info-box-title"><strong style= "color:white;"></strong><a href="<?php echo base_url("index.php/grievanceController/solved");?>"> <strong style= "color:white;">(Tender Details)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-ok-circle"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                         <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white" style="background: #4ca64c;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                  
                                    
                                        <p class="">
                                            <span class="" style= "color:white;">
                                            <?php echo $count["redressed"];?>
                                        </span>
                                        </p>
                                       
                                        <span class="info-box-title"><strong style= "color:white;"></strong><a href="<?php echo base_url("index.php/grievanceController/redressed");?>"> <strong style= "color:white;">(Accounting File)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-ok-circle"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                         <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white" style="background: #933a16;color:white;">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                  
                                    
                                        <p class="">
                                            <span class="" style= "color:white;">
                                            <?php echo $count["unredressed"];?>
                                        </span>
                                        </p>
                                       
                                        <span class="info-box-title"><strong style= "color:white;"></strong><a href="<?php echo base_url("index.php/grievanceController/unredressed");?>"> <strong style= "color:white;">(Others)</strong></a></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    
                    
                    
                   <!-- <div class="row">
                    	<div class="col-lg-8 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">wise Details</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <?php  /*$totalsms = 0;?>
                                <div class="panel-body">
                                    <div class="weather-widget">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="weather-top">
                                                   
                                                    <h2 class="weather-day pull-right">District <br><small><b><?php echo date("d, M, Y");?></b></small></h2>
                                                </div>
                                            </div>
                                            <?php /*
                                            $this->db->distinct();
                                            $this->db->select("block_name");
                                            $blocklist = $this->db->get("block_list");
                                            
                                            foreach($blocklist->result() as $b): */?>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled weather-info">
                                            
                                                    <li><?php //echo $b->block_name;?>  <span class="pull-right"><b> 
													<?php /* $blockAttendance = $this->loginmodel->todayBlockComplains($b->block_name);
													echo $blockAttendance['tp']." P /".$blockAttendance['tup']." UP/ ".$blockAttendance['tr']." R/ ".
                                                        $blockAttendance['tur']." UR";
													*/?>
													</b></span></li>
												  </ul>
                                            </div>	
                                                  <?php /*endforeach;?>  
                                            <?php $dt = date("Y-m-d"); */?>
                                         
                                        </div>
                                         <div class="col-md-12">
                                                <ul class="list-unstyled weather-days row">
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php /*echo date("d,M",strtotime($dt."+1 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo $totalsms;?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+2 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+3 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+4 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+5 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+6 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Inbox</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="inbox-widget slimscroll">
                                    	 <div class="info-box-stats">
                                  
                                     
                                     <h1><?php echo $todayattendance['todaysComplain'];*/?> </h1>
                                        <span class="info-box-title"> <h4>Total Complains Registered Today  </h4><a href="#">(view List)</a></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>-->

					
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2017 &copy; VDAI BIO SEC Pvt Ltd.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>





<script type="text/javascript">
var chart = AmCharts.makeChart("chartdiv", {
  "type": "pie",
  "startDuration": 0,
   "theme": "light",
  "addClassNames": true,
  "legend":{
        "position":"right",
    "marginRight":100,
    "autoMargins":false
  },
  "innerRadius": "0%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [{
    /*"country": "अनिर्णित(pending)",*/
    "country": "Engineering"/*"<?php //if($this->session->userdata("username")!= "Admin") echo 'सन्दर्भित'; ?>"*/,
    "litres":  "<?php echo $count["pending"]; ?>"/*"<?php //if($this->session->userdata("username")!= "Admin") echo $count['assign']; ?>"*/
  }/*, {
    "country": "कार्य प्रचलित(under process)",
    "country": "कार्य गतिमान",
    "litres": <?php //echo $count["underProcessAccToLastDate"] + $count["UnderProcessAccToLast15Days"];/*echo $count["gup"];*/ ?>
  }*/, {
    /*"country": "निस्तारित(disposed)",*/
    "country": "Tender"/*"निस्तारित"*/,
    "litres": <?php echo $count["solved"]; ?>
  }, {
    /*"country": "निस्तारित(disposed)",*/
    "country": "Accounting"/*"निस्तारित"*/,
    "litres": <?php echo $count["redressed"]; ?>
  }/*,{
    "country": "अनिर्णित(pending)",
    "country": "कार्य लंबित",
    "litres": <?php //echo $count["pendingAccToLastDate"] + $count["pendingAccToLast15Days"] ;/*echo $count["gp"];*/ ?>
  }*//*, {
    "country": "अनिस्तारित",
    "litres": <?php //echo $count["unredressed"]; ?>
  }*/],
  "valueField": "litres",
  "titleField": "country",
  "export": {
    "enabled": true 
  }
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);
}
</script>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>

    sanction_cost_data = JSON.parse('<?php echo json_encode($sanction_cost); ?>');
    initDonutChart(sanction_cost_data,'sanction_cost_donut','inr');

    tender_cost_data = JSON.parse('<?php echo json_encode($tender_cost); ?>');
    initDonutChart(tender_cost_data,'tender_cost_donut','inr');

    payment_cost_data = JSON.parse('<?php echo json_encode($payment_cost); ?>');
    initDonutChart(payment_cost_data,'payment_cost_donut','inr');


    engineering_data = JSON.parse('<?php echo json_encode($engineering); ?>');
    initDonutChart(engineering_data,'engineering_donut');

    tender_data = JSON.parse('<?php echo json_encode($tender); ?>');
    initDonutChart(tender_data,'tender_donut');

    payment_data = JSON.parse('<?php echo json_encode($payment); ?>');
    initDonutChart(payment_data,'payment_donut');

  function initDonutChart( data , ele2, format = '' ) {

      total = 0;
      $.each(data,function(index,obj){
        if( obj.value <= 0.001 ){
            total += 0;
        }else{
            total += obj.value;
        }
      });
      $("#"+ele2+"_total").html(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

      Morris.Donut({
        element: ele2,
        data: data,
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)', 'rgb(121,85,72)', 'rgb(63,81,181)'],
        formatter: function (y) {
            if( y <= 0.001 ){
                 y=0;
            }
            if(format=='inr'){
                return '₹ '+ y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }else{
                return y;
            }
          
        }
      }).on('click', function (i, row) {
            label = row.label.split("-");
            ward = label[1].trim();
            type = ele2.replace("_donut","");
            console.log(ward,type);
            window.location = "<?php echo base_url("grievanceController2/ward_wise_report"); ?>?ward="+ward+"&type="+type;
      });
  }


    

    // jQuery.post("http://vdsai.com/letter_management_system/Admin/getDataForDashboard",{},function(data){
    //     var respone = JSON.parse(data);
    //     if(respone.status_code == "200"){
    //         initDonutChart3(respone.result.donutArr3);
    //     }
    // });

</script>
	

