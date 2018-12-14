$(".deleteComment").click(function(){
$.ajax({
	url:"action.php?action=deleteComment",
	type:"POST",
	enctype:"multipart/form-data",
	data:"comment_id="+$(this).val(),
	success:function(response){
		console.log(response);
		location.reload();
	}
});
});


$('#add_comment').click(function(){
	if(!$("#user_signed_in").length){	
		alert("1 You must log in to make this comment!");
		$("#login_signup").click();
	}
});

	if ($("#post_comment").length<=180){
		$("#submitComment").click(function(){	
		$.ajax({
			url:"action.php?action=newComment",
			type:"POST",
			enctype:"multipart/form-data",
			data:"post_id="+$("#newComment").val()+"&comment="+$("#post_comment").val(),
			success:function(response){
				console.log(response);
				location.reload();
			}
		});
		});
		}else {
			alert("2 Your comment is too long.");
		}		