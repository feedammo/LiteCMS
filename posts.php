<?php if(!isset($_GET['pid'])){header("location: index.php");}?>
<?php include("views/header.php");?>
<?php include("functions/home.inc.php");?>
<div class="container-fluid col-md-8">
	<br>
	<div>
		<input type='hidden' value='<?php if(isset($_SESSION['id'])){
			echo $_SESSION['id'];	
		}?>'>
		<?php 
		$post= fetchPost($_GET['pid']);

		if($post['post_title'] && $post['post_text']){
			echo "<h2>".$post['post_title']."</h2>"."<em>".$post['post_date']."</em>"."<hr>"."<img height='300' class='img-fluid' style='max-width: 100%; height: auto; ' src='".$post['post_image']."'>"."<br><hr>";
			echo "<i class='fa fa-thumbs-o-up fa-lg like' aria-hidden='true'>".$post['post_likes']."</i>&nbsp;&nbsp;"."<i class='fa fa-thumbs-o-down fa-lg dislike' aria-hidden='true'>".$post['post_dislikes']."</i>";			

			if (isset($_SESSION['username'])) {
				echo "<input type='hidden' id='user_signed_in'>";
				if (userLike($_SESSION['username'], $post['post_id']) === true) {
					echo "<script type='text/javascript'>
					upvote = true;
					$('.like').css({'color' : 'blue'});
					$('.dislike').css({'color' :'black'});
				// alert(upvote);
					</script>";
				} else if (userLike($_SESSION['username'], $post['post_id']) === false) {
					echo "<script type='text/javascript'>
					upvote = false;
					$('.like').css({'color' : 'black'});
					$('.dislike').css({'color' : 'red'});
				// alert(upvote);
					</script>";
				} else if (userLike($_SESSION['username'], $post['post_id']) === null) {
					echo "<script type='text/javascript'>
					upvote = null;
					$('.like').css({'color' : 'black'});
					$('.dislike').css({'color' : 'black'});
				// alert(upvote);
					</script>";
				}	
			}
			?>
			<?php echo "<hr>".$post['post_text'];
			echo "<input type='hidden' id='post_id' value=".$post['post_id'].">";?>
			<br>
			<br>
			<?php if(isset($_SESSION['id'])&&$_SESSION['id']===$post['post_user_id']){
				echo "<a href='editpost.php?pid=".$post['post_id']."'><button type='button' class='btn btn-success'>Edit</button></a>";
				echo "&nbsp;";
				echo"<a href='editpost.php?pid=".$post['post_id']."&action=delete'><button type='button' class='btn btn-danger'>Delete</button></a>";	
			}?>
			<hr>
			<div class="container-fluid">
				<div class="row">
					<?php if(isset($_SESSION['id'])){ 
						fetchComment($_GET['pid'],$_SESSION['id']); 
					} else {
						fetchComment($_GET['pid'], null);
					}?>
				</div>
			</div>
			<hr>
			<button type="button" class="btn btn-primary" id="add_comment" data-toggle="modal" data-target="#newCommentModal">Add Comment</button>

		</div>
	</div>
	<?php if(isset($_SESSION['id'])){?>
	<div class="modal fade" id="newCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<?php echo "<input type='hidden' id='newComment' value=".$_GET['pid'].">"?>
					<h5 class="modal-title" id="exampleModalLabel">Add a comment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<textarea class="form-control" id="post_comment" rows="4" maxlength="256"></textarea>
							<small id="fileHelp" class="form-text text-muted">Max length 256 characters.</small>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="submitComment">Add</button>
				</div>
				<?php }?>
			</div>
		<?php }else {
			echo "<br><br><center><h2>Post doesn't exist.</h2></center>";
		}?>
	</div>
</div>
<script type="text/javascript" src="js/comment.js"></script>
<script type="text/javascript" src="js/likes.js"></script>

<?php include("views/footer.php");?>
