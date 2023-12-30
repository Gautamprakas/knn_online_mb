
 <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>



        <!--<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>-->
      <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->



<script>
    jQuery(document).ready(function() {
        var options={
        format: 'yyyy-mm-dd',
        /*container: container,*/
        todayHighlight: true,
        autoclose: true
      };
        $(".date").datepicker(options);
        

    });
  </script>



<script>
  
    jQuery(document).ready(function() {
        
        $("#prevDisplay").hide();

        $("#mobile_number").focusout(function(){
            
            var mobile_number = $("#mobile_number").val();
            
            if(mobile_number.length>9){
                /*$.post("<?php echo site_url("index.php/grievanceController/getPrevGrievance") ?>",{mobile_number : mobile_number}, function(data){
                    $("#prevDisplay").show();
                    $("#prevGrie").html(data);
                });*/
            }
            else{
                alert("invalid mobile number");
            }
        });

        


      $(document).on("click",".delete",function(){
        
        var obj = $(this).parent().parent();
        var sno = obj.find("#sno").val();
        $.post("<?php echo site_url("index.php/grievanceController/deleteDepartment") ?>",{sno:sno},function(data){
            obj.remove();
        });
      });

        $(document).on("click",".save",function(){
        
        var button = $(this);
        var obj = button.parent().parent();
        var sno = obj.find("#sno").val();
        var dep = obj.find("#depart").val();
        var off = obj.find("#officer").val();
        var mob = obj.find("#mobile").val();
        var em = obj.find("#email").val();
   
        $.post("<?php echo site_url("index.php/grievanceController/updateDepartment") ?>",
            {
                sno:sno,
                patal_name:dep,
                officer_name:off,
                mobile1:mob,
                email1:em
            },
            function(data){
                button.html("Saved");
         });
        
      });



        $("#block").change(function(){
             var dep_type = $(this).val();
             if(dep_type != "")
             {
                $.post("<?php echo site_url("index.php/grievanceController/getDepartmentForEdit") ?>",
                 {dep_type:dep_type},
                 function(data){
                    $("#editDepartment").html(data);
                 });
             }
             else
             {
                //
             }
        });



        $("#redress").click(function(){

            var cnumber = $("#cnumber").val();
            $.post("<?php echo site_url("index.php/grievanceController/redress") ?>",
                 {cnumber:cnumber},
                 function(data){
                    $("#redress").html(data);
                    $("#unredress").remove();
                 });
        });


        $("#unredress").click(function(){

            var cnumber = $("#cnumber").val();
            $.post("<?php echo site_url("index.php/grievanceController/unredress") ?>",
                 {cnumber:cnumber},
                 function(data){
                    $("#unredress").html(data);
                    $("#redress").remove();
                 });
        });


      



      $("#commentContainer").hide();
      $("#explainationContainer").hide();
      $("#submitAction").hide();

      $("#status").change(function(){

          var status = $("#status").val();
          if(status == "forward")
          {
            $("#explainationContainer").hide();
            $("#explaination").removeAttr("name required");
            $("#commentContainer").show();
            $("#dep").attr({name:"dep",required:"required"});
            $("#comment").attr({name:"comment",required:"required"});
            $("#submitAction").show();
          }
          else
          if(status == "solved")    
          {
            $("#commentContainer").hide();
            $("#comment").removeAttr("name required");
            $("#dep").removeAttr("name required");
            $("#explainationContainer").show();
            $("#explaination").attr({name:"explaination",required:"required"});
            $("#submitAction").show(); 
          }
          else
          {
            $("#commentContainer").hide();
            $("#explainationContainer").hide();
            $("#submitAction").hide();
          }
      });

            
    });
</script>



















<script>
  
    jQuery(document).ready(function() {
       
       $.post("<?php echo site_url("index.php/grievanceController/getComplainTypeForEdit") ?>",
             {},
       function(data){
          $("#displayComplainType").html(data);
         });
      
       

        $("#add_complain_type").click(function(){ 

          var ctype = $('#complain_type').val();
          var days = $('#days').val();
          if(ctype.length > 0 && days.length > 0 && days > 0)
          {
            $.post("<?php echo site_url("index.php/grievanceController/insertComplainType") ?>",
             {complain_type : ctype,days : days},
             function(data){
              $('#complain_type').val("");
              $('#days').val("");
                //$("#add_complain_type").html(data);
                     $.post("<?php echo site_url("index.php/grievanceController/getComplainTypeForEdit") ?>",
                     {},
                     function(data){
                        $("#displayComplainType").html(data);
                       });
               });
          }
          else
          {
            alert("Plz Enter Complain Type and  Valid Days");
          }
        });


        


      $(document).on("click",".delete_complain_type",function(){
        
        var obj = $(this).parent().parent();
        var sno = obj.find("#sno").val();
        $.post("<?php echo site_url("index.php/grievanceController/deleteComplainType") ?>",{sno:sno},function(data){
            obj.remove();
        });
      });

        $(document).on("click",".save_complain_type",function(){
        
        var button = $(this);
        var obj = button.parent().parent();
        var sno = obj.find("#sno").val();
        var ctype = obj.find("#complain_type").val();
        var days = obj.find("#days").val();
   
        if(ctype.length > 0 && days.length > 0 && days > 0)
        {
            $.post("<?php echo site_url("index.php/grievanceController/updateComplainType") ?>",
            {
                sno:sno,
                complain_type:ctype,
                days:days
            },
            function(data){
                button.html("Updated");
           });
        }
        else
        {
          alert("Plz Enter Complain Type and  Valid Days");
        }
        
      });


            
    });
</script>





<script>
  
    jQuery(document).ready(function() {
       
       $("#teh_nameDIV").hide();
       $("#dep_nameDIV").hide();

       $("#dep_type").change(function(){

           var type = $("#dep_type").val();

           if(type == "tehsil")
           {
                $("#editDepartment").hide();
                $("#teh_nameDIV").hide();
                $("#teh_name").removeAttr("required");
                $("#teh_name").val("");
                $("#dep_nameDIV").show();
                $("#dep_name").attr("required","required");
                $("#dep_name").val("");
                $.post("<?php echo base_url("grievanceController/getDepartmentList"); ?>",{}, function(data){
                  $("#dep_name").html(data);
                });

           }

           if(type == "department")
           {
                $("#editDepartment").hide();
                $("#teh_nameDIV").hide();
                $("#teh_name").removeAttr("required");
                $("#dep_nameDIV").hide();
                $("#dep_name").removeAttr("required");
                $.post("<?php echo base_url("grievanceController/getDepartmentForEdit"); ?>",{dep_type:type}, function(data){
                  $("#editDepartment").html(data);
                  $("#editDepartment").show();
                });
           }

           if(type == "village")
           {
                $("#editDepartment").hide();
                $("#teh_nameDIV").show();
                $("#teh_name").attr("required","required");
                $("#teh_name").val("");
                $("#dep_nameDIV").show();
                $("#dep_name").attr("required","required");
                $("#dep_name").val("");
                $.post("<?php echo base_url("grievanceController/getDepartmentList"); ?>",{}, function(data){
                  $("#dep_name").html(data);
                });
           }
       });     
    });

    $("#dep_name").change(function(){
      var dep_type = $("#dep_type").val();
      var dep_name = $("#dep_name").val();
      if(dep_type == "tehsil")
      {
         $.post("<?php echo base_url("grievanceController/getDepartmentForEdit"); ?>",{dep_type:dep_type,dep_name:dep_name}, function(data){
          $("#editDepartment").html(data);
          $("#editDepartment").show();
         });
      }
      else
      if(dep_type == "village")        
      {
         $.post("<?php echo base_url("grievanceController/getTehsilList"); ?>",{dep_name:dep_name}, function(data){
          $("#teh_name").html(data);
        });
      }
    });

    $("#teh_name").change(function(){

       var dep_type = $("#dep_type").val();
       var dep_name = $("#dep_name").val();
       var teh_name = $("#teh_name").val();

       $.post("<?php echo base_url("grievanceController/getDepartmentForEdit"); ?>",{teh_name:teh_name,dep_type:dep_type,dep_name:dep_name}, function(data){
          $("#editDepartment").html(data);
          $("#editDepartment").show();
         });
    });
</script>
