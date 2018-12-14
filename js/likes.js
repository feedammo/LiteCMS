
$(".like").click(function(){
	if (upvote) {
		$.ajax({
			url:"action.php?action=likePost",
			type:"POST",
			enctype:"multipart/form-data",
			data:"post_id="+$("#post_id").val()+"&like=false",
			success:function(response){
				upvote = null;
				$('.like').css({"color" : "black"});
				
			}
		});
	}else{
		$.ajax({
			url:"action.php?action=likePost",
			type:"POST",
			enctype:"multipart/form-data",
			data:"post_id="+$("#post_id").val()+"&like=true",
			success:function(response){
				upvote = true;
				$('.like').css({"color" : "blue"});
				$('.dislike').css({"color" : "black"});
				like = $('.like').html();
				like++;
				$('.like').html(like);
			}
		});

	}
});


$(".dislike").click(function(){
	if (upvote===false) {
		$.ajax({
			url:"action.php?action=dislikePost",
			type:"POST",
			enctype:"multipart/form-data",
			data:"post_id="+$("#post_id").val()+"&dislike=false",
			success:function(response){
				$('.dislike').css({"color" : "black"});
				upvote = null;
			}
		});
	}else{
		$.ajax({
			url:"action.php?action=dislikePost",
			type:"POST",
			enctype:"multipart/form-data",
			data:"post_id="+$("#post_id").val()+"&dislike=true",
			success:function(response){
				$(".dislike").css({"color" : "red"});
				$('.like').css({"color" : "black"});
				dislike = $('.dislike').html();
				dislike++;
				$('.dislike').html(dislike);
				upvote = false;
			}
		});
	}
});


setInterval( function(){  
 $.ajax({
			url:"action.php?action=requestLikes",
			type:"POST",
			enctype:"multipart/form-data",
			data:"post_id="+$("#post_id").val(),
			success:function(response){
					var result = JSON.parse(response); 
					$('.like').html(result.likes);
					$('.dislike').html(result.dislikes);
			}
} );} , 1000 );