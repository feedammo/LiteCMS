<?php include("views/header.php");  ?>
<br>
<?php 
if (!isset($_SESSION['id'])){ 
	header("location: index.php"); 
}
?>
<div class="container-fluid">
	<!-- Modal -->
	<div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content newPost">
				<div class="modal-header">
					<input type="hidden" id="newPost">
					<h5 class="modal-title" id="exampleModalLabel">Create New Post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form >
						<div class="form-group">
							<label for="formGroupExampleInput">Title</label>
							<input type="text" class="form-control" id="post_title" placeholder="Enter the title that best defines your post.">
						</div>
						<div class="form-group">
							<label for="post_message">Your Message</label>
							<textarea class="form-control" id="post_message" rows="5"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Images</label>
							<input type="file" class="form-control-file" name="images" aria-describedby="fileHelp">
							<input type="hidden" name="post_image" id="post_image" value="">
							<small id="fileHelp" class="form-text text-muted">Upload an image which best describes your post.</small>
						</div>	
						<div class="form-group">
							<label for="formGroupExampleInput2">Tags</label>
							<input type="text" class="form-control" id="post_tags" placeholder="E.g. Tech">
							<small id="tagHelp" class="form-text text-muted">Tags are used to classify your posts, having a tag can increase chances of appearning in a search.</small>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="submitPost">Post</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-8" id="user_post_thumbs" >
		<!-- Button trigger modal -->

		<ul class="nav justify-content-end">
			<li class="nav-item">
				<!-- <a class="nav-link active" href="#">Active</a> -->
				<button type="button" class="btn btn-primary text-sm-center nav-link active " data-toggle="modal" data-target="#newPostModal">
				New Post</button>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li> -->
		</ul>	
		<h3>Your Posts</h3>
		<hr>
		<div class="row">
			<?php include("functions/home.inc.php");
			fetchUserPosts($_SESSION['id']);
			?>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/post.js"></script>
<script type="text/javascript" src="js/newpost_image_upload.js"></script>

<?php include("views/footer.php");?>