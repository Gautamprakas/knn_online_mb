<html encoding="UTF-8" charset="UTF-8">
<head>
    <meta charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>
 	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClEk8CRS99Lwqgi06ElUIzTyzeiva_0vE"></script>

<style type="text/css">
	#map_wrapper_div {
  height: 800px;
}
 
#map_tuts {
    width: 100%;
    height: 100%;
}
#example {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#example td, #example th {
  border: 1px solid #ddd;
  padding: 8px;
}

#example tr:nth-child(even){background-color: #f2f2f2;}

#example tr:hover {background-color: #ddd;}

#example th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
#myModal
{
    width: 800px;
}

</style>
	
</head>



<body>
    <?php

$connection=mysqli_connect("localhost","vdsa_sam","Vdai@1234db#");
                    $db=mysqli_select_db($connection,'vdsai_knn_engineering_mis_old');                   

                    $sql="SELECT * FROM complaint_details Group by comp_type";
                    $sql_query=mysqli_query($connection,$sql);

?>

	<div class="container">
          <div class="panel-heading">
          	<h3>Complaint Area Map</h3>
          </div>
          <div class="container-fluid">
           <div class="">
           	
		  <div id="map_wrapper_div">
                    <div id="map_tuts"></div>
                   </div>
           		 
           	
           </div>

          </div>

   

	</div>
     <div class="modal fade" id="myModal" role="dialog"  >
        <div class="modal-dialog" style="width:900px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header row">
                <div class="col-md-12"><h4 class="modal-title"> Work Progress</h4><hr></div>

                <div class="col-md-3"><label>Ward No: </label></div><div class="col-md-9"><label id="ward_no" name="ward_no" ></label></div>
                </div>
                <div class="modal-body" >
                    <div class="table-responsive" id="my-container">
                      <table class="table table-striped table-bordered" id="example" style="width:100%;">
                      </table>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

  <script type="text/javascript">

jQuery(document).ready(function(){
  
 initialize();

 

    });
var gmarkers = [];
    var map;
    var a = [];
    var pathCoordinates = Array();

function initialize() {
    var customMapType = new google.maps.StyledMapType([
      {
        elementType: 'labels',
        stylers: [{visibility: 'off'}]
      }
    ], {
      name: 'Custom Style'
  });
  var customMapTypeId = 'custom_style';

   var mapProp = {
            center: new google.maps.LatLng(26.4756496,80.3144728), //India Lat and Lon
            zoom: 12,
           mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
    }
        };
        map = new google.maps.Map(document.getElementById("map_tuts"), mapProp);
 map.mapTypes.set(customMapTypeId, customMapType);
  map.setMapTypeId(customMapTypeId);
   } 
   
 
 

$.get("<?php echo './map.php' ?>",function(response){
         var data = jQuery.parseJSON(response);       
         var countryLength;
        var lat="";
       var long="";
       var latlng="";
       var icon="";
       var marker="";
       var infoWindow="";
       var geocoder="";
         var latlng_1="";
    $.each(data.result, function (index, element) {
                            countryLength = index;   
                            
                  var location=element.Address+"Uttar Pradesh,India" ;
                  
                 geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'address': location }, function (results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {

                       
                         latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()); 
                       
                         icon=element.icon; 
                      
                        pathCoordinates.push(latlng);                   
                         marker = new google.maps.Marker({
                            map: map,
                            position: latlng,
                            icon: "./images/"+icon,        
                            title: "Ward No: " + element.block_name +", Estimated Cost:"+ element.pincode + ", Work: " + element.complain
                        });
                    }
                       
                  
                    var incidence =  "Ward No: " + element.block_name +", Estimated Cost:"+ element.pincode + ", Work: " + element.complain;
                     infoWindow = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, "click", function (e) {
                        //infoWindow.setContent(incidence);
                        //infoWindow.open(map, marker);
                            showReport(element.block_name);
                          });
                    
                
                 

                    (function (marker, data) {

                        // Attaching a click event to the current marker
                        google.maps.event.addListener(marker, "click", function (e) {
                           // infoWindow.setContent(incidence);
                            //infoWindow.open(map, marker);
                           
                        });

                    })(marker, data);
                });
            });

        });




 


function showReport(ward)
{
    var popdata="";
    var tableString = '';
      $.ajax({
            method: "POST",
            url: "report.php",
           data: {ward:ward},  
            cache: false,
            success: function(datares){
                   

                   popdata = jQuery.parseJSON(datares);
                 
                 var status="";
                 
                 
                  tableString = '<thead><tr><th>Approved Work</th><th>Estimated Cost</th></tr></thead>';
              
             $.each(popdata.result, function (index, element) {
                 $("#ward_no").text(element.block_name);
                 
                 tableString +="<tr><td>"+element.approve_date+"</td><td>"+element.cost+"</td></tr>";
                 
                    $('#example').html(tableString); 
                    status="";        
            });
        
             
            
             $("#myModal").modal('show');
         }
        });

}
  

   //google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>
</html>