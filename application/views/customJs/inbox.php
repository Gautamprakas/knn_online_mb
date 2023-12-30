<?php
header("Content-type: application/javascript");
?>
$(document).ready(function(){

	var hiddenMailOptions = function() {
		if($('.checkbox-mail:checked').length) {
			$('.mail-hidden-options').css('display', 'inline-block');
		} else {
			$('.mail-hidden-options').css('display', 'none');
		};
	};

	hiddenMailOptions();

	$('.check-mail-all').click(function () {
		$('.checkbox-mail').click();
	});

		$('.checkbox-mail').each(function() {
			$(this).click(function() {
				if($(this).closest('tr').hasClass("checked")){
					$(this).closest('tr').removeClass('checked');
					hiddenMailOptions();
				} else {
					$(this).closest('tr').addClass('checked');
					hiddenMailOptions();
				}
			});
		});

			$('.mailbox-content table tr td').not(":first-child").on('click', function(e) {
				e.stopPropagation();
				e.preventDefault();
				var rowid = $(this).attr('title');
				//alert(rowid);
				$.ajax({
					url: "<?php echo site_url("ajaxMsg/msgDetail") ?>",
					data: {rowid:rowid},
					type: 'POST',
					success: function(msg){
						$("#actionName").html("Message Detail");
						$("#msgBody").html(msg);
					}
				});
			});
			$("#del").click(function(){
				var checkedId = [];
            	$.each($("input[name='rowsId']:checked"), function(){            
                checkedId.push($(this).val());
            	});
           		//alert("My favourite sports are: " + checkedId.join(", "));
				$.ajax({
					url: "<?php echo site_url("ajaxMsg/delMsg") ?>",
					data: {checkedId:checkedId},
					type: 'POST',
					success: function(msg){
						var m = msg + "msg are deleted...";
						if(msg > 0){
							Command: toastr["success"](msg + "Messages are Deleted successfully....")
	
							toastr.options = {
							  "closeButton": true,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": true,
							  "positionClass": "toast-top-center",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "1000",
							  "timeOut": "5000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							}
						}else{
							Command: toastr["error"]("Somthing Going Wrong Please Contact to developer...")
	
							toastr.options = {
							  "closeButton": true,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": false,
							  "positionClass": "toast-top-center",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "1000",
							  "timeOut": "5000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							}
						}
							$.ajax({
								url: "<?php echo site_url("ajaxMsg/loadInbox") ?>",
								type: 'POST',
								success: function(msg){
									$("#msgBody").html(msg);
									$("#ms").html(m);
								}
							});
						
						}
					});
			});
});
