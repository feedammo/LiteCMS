<?php 
session_start();
require_once("db.php");
require_once("functions.php");
/*Login*/
if($_GET['action']=="login"){
	if (isset($_POST)) {
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = md5($salt.mysqli_real_escape_string($link, $_POST['password']));
		try{
			validateLoginInputs();
			loginUser($username, $password);
			echo "1";
		}catch(Exception $e){
			echo $e->getMessage();;
		}			
	}
}
/*SignUp*/
if($_GET['action']=="signup"){
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = md5($salt.mysqli_real_escape_string($link, $_POST['password']));
	$cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);

	if (isset($_POST)) {    
		try{
			validateInputs();
			validatePassword();
			validateEmail();
			checkForUniqueInput($email, $username);
			insertNewUser($email, $username, $password);
			echo "1";
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}
/*Logout*/
if ($_GET['action']=="logout") {
	session_unset();
	header("Location: index.php");
}
if (!isset($_GET['action'])) {
	header("location: home.php");
}
/*Redirect If not logged in */
/* Below is the list of actions performed only when user is logged in */
if(isset($_SESSION['id'])){
	if ($_GET['action']=="newpost") {
		include("classes/post.php");
		$post = new post;
		$post::createPost($_SESSION['id'],$_POST['post_title'], $_POST['post_image'], $_POST['post_text']);
	}
	if ($_GET['action']=="editpost") {
		include("classes/post.php");
		$post = new post;
		$post::editPost($_SESSION['edit_post_id'],$_POST['post_title'], $_POST['post_image'], $_POST['post_text']);
	}
	if ($_GET['action']=="newComment") {
		include("classes/comment.php");
		$comment = new comment;
		$comment::addComment($_SESSION['id'], $_POST['post_id'], $_POST['comment']);	
	}
	
	if ($_GET['action']=="deleteComment") {
		include("classes/comment.php");
		$comment = new comment;
		$comment::deleteComment($_POST['comment_id']);
	}
	if ($_GET['action']=="likePost") {
		include_once("classes/like.php");
		if (isset($_POST['post_id'])&&$_POST['like']=="true") {
			$like = new like;
			if (isset($_SESSION['username'])) {
				$like::likePost($_SESSION['username'], $_POST['post_id']);
				$like::removeDislike($_SESSION['username'], $_POST['post_id']);
			}else {
				echo "You Must be login to like this post!";
			}
		}
		if (isset($_POST['post_id'])&&$_POST['like']=="false") {
			$like = new like;
			if (isset($_SESSION['username'])) {
				$like::removeLike($_SESSION['username'], $_POST['post_id']);
			}
		}	
	}
	if ($_GET['action']=="dislikePost") {
		include_once("classes/like.php");
		if (isset($_POST['post_id'])&&$_POST['dislike']=="true") {
			$like = new like;
			if (isset($_SESSION['username'])) {
				$like::dislike($_SESSION['username'], $_POST['post_id']);
				$like::removeLike($_SESSION['username'], $_POST['post_id']);
			}else {
				echo "You Must be login to dislike this post!";
			}
		}
		if (isset($_POST['post_id'])&&$_POST['dislike']=="false") {
			$like = new like;
			if (isset($_SESSION['username'])) {
				$like::removeDislike($_SESSION['username'], $_POST['post_id']);
			}
		}	
	}
}
if ($_GET['action']=="requestComments" && isset($_POST['post_id'])) {
	include_once('classes/comment.php');
	print_r(fetchComments($_POST['post_id']));
}
if ($_GET['action']=='requestLikes' && isset($_POST['post_id'])) {
	include_once('classes/like.php');
	print_r(fetchLikes($_POST['post_id']));
}
/*Fetches more posts on button click */
if ($_GET['action']=="morePosts" ){	
		if(isset($_SESSION['posts'])){
				$_SESSION['posts'] = $_SESSION['posts'] + 4;
				fetchPosts($_SESSION['posts']);
			} 
}		 
if (!isset($_POST)) {
	header("location: index.php");
}
?>

