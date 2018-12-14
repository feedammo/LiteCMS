<?php if(!isset($_GET['pid'])||isset($_SESSION['id'])){header("location: index.php");}?>
<?php include("views/header.php");?>
<?php include("functions/home.inc.php") ?>
<div class="container-fluid col-md-8" style="border:1px solid black; margin:0 auto;">
	<?php 
	$post=fetchPost($_GET['pid']);
	if($_SESSION['id']===$post['post_user_id']){
		$post_status = 1;
		if(isset($_GET['action'])&&$_GET['action']=='delete'){
			$link = mysqli_connect("localhost", "root", "", "boldcat");
			$post_id = $_GET['pid'];
			$query = "DELETE FROM `posts` WHERE `post_id` = $post_id LIMIT 1";
			$result = mysqli_query($link, $query) or die( "Something Went Wrong!");
			$post_status = 0;
		}if ($post_status){?>

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
			</div>
			<div class="modal-body">
				<form >
					<div class="form-group">
						<input type="hidden" id="editPost">
						<?php $_SESSION['edit_post_id']= $post['post_id']; ?>	
						<input type="hidden" name="post_id" id="post_id" value=<?php echo $post['post_id'];?>>
						<label for="formGroupExampleInput">Title</label>
						<?php echo"<input type='text' class='form-control' id='post_title' placeholder='Enter the title that best defines your post.' value='".$post['post_title']."'>"?>
					</div>
					<div class="form-group">
						<label for="post_message">Your Message</label>
						<?php echo"<textarea class='form-control' id='post_message' rows='5'>".$post['post_text']."</textarea>"?>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Images</label>
						<input type="file" class="form-control-file" name="images" aria-describedby="fileHelp">
						<input type="hidden" name="images" id="post_image" val="">
						<small id="fileHelp" class="form-text text-muted">You can upload an image that defines and represent your post well.</small>
					</div>	
					<div class="form-group">
						<label for="formGroupExampleInput2">Tags</label>
						<input type="text" class="form-control" id="post_tags" placeholder="E.g. Tech">
						<small id="tagHelp" class="form-text text-muted">Tags are used to classify your product, having a tag can increase chances of appearning into search results.</small>
					</div>
				</form>
			</div>

			&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" id="submitPost">Edit</button>
			<br>
			<br>
			<?php 
		} 
	}else {?>
		<br><br> 
		<center><h2>You can't edit or delete someone else's post!!!</h2></center>
	<?php }?>
</div>
<script type="text/javascript" src="js/newpost_image_upload.js"></script>
<script type="text/javascript" src="js/post.js"></script>
<?php include('views/footer.php');?>
