<?php include("views/header.php"); include("db.php"); ?>
<div class="container-fluid">
	<div class="col-md-8 row" id="ajax_output" style="margin: 20px auto 20px auto;">
	<?php include_once('functions.php');
			if(!isset($_SESSION['posts'])){
					$_SESSION['posts'] = 4;
					fetchPosts($_SESSION['posts']);
				} else if(isset($_SESSION['posts'])&& $_SESSION['posts']>4){
							$_SESSION['posts'] = 4;
							fetchPosts($_SESSION['posts']);
					} else {
						fetchPosts(4);
					}	
	?>
	</div>
	<center><button id="ajax_load_more" class="btn btn-danger" >Load More!</button></center>
</div>
<?php include("views/footer.php");?>
<script>
	if($(".no_posts").length){
		$("#load_more").hide();
	}	
	$("#ajax_load_more").click(function(){
		$.ajax({
			type:"POST",
			url: "action.php?action=morePosts",
			success: function(response){   
					$("#ajax_output").html(response);
				}
			});
	});
</script>