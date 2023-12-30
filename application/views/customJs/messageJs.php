<?php
header("Content-type: application/javascript");
?>

$(document).ready(function(){
	$.ajax({
		url: "<?php echo site_url("ajaxMsg/loadInbox") ?>",
		type: 'POST',
		success: function(msg){
			$("#msgBody").html(msg);
		}
	});
	
	$("#compose").click(function(){
		$.ajax({
			url: "<?php echo site_url("ajaxMsg/loadCompose") ?>",
			type: 'POST',
			success: function(msg){
				$("#actionName").html("Compose Message");
				$("#msgBody").html(msg);
			}
		});
	});
	
	$("#inbox").click(function(){
		$('#st').removeClass('active');
		$('#in').addClass('active');
		$.ajax({
			url: "<?php echo site_url("ajaxMsg/loadInbox") ?>",
			type: 'POST',
			success: function(msg){
				$("#actionName").html("Inbox");
				$("#msgBody").html(msg);
			}
		});
	});
	
	$("#sent").click(function(){
		$('#in').removeClass('active');
		$('#st').addClass('active');
		$.ajax({
			url: "<?php echo site_url("ajaxMsg/loadSent") ?>",
			type: 'POST',
			success: function(msg){
				$("#actionName").html("Inbox");
				$("#msgBody").html(msg);
			}
		});
	});
	
});