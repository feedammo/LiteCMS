
if ($("#newPost").length){
$("#submitPost").click(function(){
$.ajax({
	url:"action.php?action=newpost",
	type:"POST",
	enctype:"multipart/form-data",
	data:"post_title="+$("#post_title").val()+"&post_image="+$("#post_image").val()+"&post_text="+$("#post_message").val(),
	success:function(response){
		alert(response);
		window.location= 'index.php';
		console.log(response);
	}
});
});
}



if ($("#editPost").length){
$("#submitPost").click(function(){
	// alert($("#post_id").val());
post_id=$("#post_id").val();
$.ajax({
	url:"action.php?action=editpost",
	type:"POST",
	enctype:"multipart/form-data",
	data:"post_id="+$("#post_id").val()+"&post_title="+$("#post_title").val()+"&post_image="+$("#post_image").val()+"&post_text="+$("#post_message").val(),
	success:function(response){
			window.location = "posts.php?pid="+post_id;
		    console.log(response);
	}
});
});
}