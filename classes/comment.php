<?php
class comment{
	function addComment($id, $post_id, $comment){
		$db = new db;
		$link = $db::link();
		$id=mysqli_real_escape_string($link, $id);
		$post_id=mysqli_real_escape_string($link, $post_id);
		$comment=mysqli_real_escape_string($link, strip_tags($comment));
		
		//$date = mysqli_real_escape_string($link, date('Y-m-d H:i:s'));
		if (strlen($comment)<=256)  {
			$query = "INSERT INTO comments(id, post_id, comment) VALUES ('$id', '$post_id', '$comment')";
			$db::query($query);
		}else {
			echo "Your comment is too long, make sure it's less than 256 characters.";
		}
		
	}
	function editComment($id, $cid, $comment){
		$db = new db;
		$link = $db::link();
		$comment = mysqli_real_escape_string($link, strip_tags($comment));
		$query = "UPDATE `comments` SET `comment` = '$comment' WHERE `cid` ='$cid' ";
		$db::query($query);
	}
	function deleteComment($cid){
		$db = new db;
		$link = $db::link();
		$query = "DELETE FROM `comments` WHERE `cid` = $cid ";		
		echo $query;
		$db::query($query);
	}
}
	function fetchComments($post_id){
		$db = new db;
		$link = $db::link();
		$query = "SELECT * FROM `comments` WHERE `post_id` = $post_id ";		
		$result = $db::query($query);
	}
?>