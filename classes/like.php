<?php
class like{

	function likePost($username, $post_id){
		$db = new db;
		$link = $db::link();
		$post_id=mysqli_real_escape_string($link, $post_id);
		$fetchQuery = "SELECT `liked_by` FROM `posts` WHERE `post_id` = $post_id LIMIT 1";
		//echo $fetchQuery;
		$result=$db::query($fetchQuery);
		$row= mysqli_fetch_assoc($result);
		$liked_by = unserialize($row['liked_by']);
		function insertLike($liked_by, $post_id){
			$serialized = serialize($liked_by);
			$insertLike = "UPDATE `posts` SET `liked_by` = '$serialized' WHERE `posts`.`post_id` = '$post_id' ";
			$db = new db;
			$db::query($insertLike);
			return true;
		}
		if ( !is_array($liked_by)&&$username!=null) {
			//echo "No likes before!";
			$liked_by = array($username);
			insertLike($liked_by, $post_id);
			//print_r($liked_by);
		}else {
			array_push($liked_by, $username);
			$liked_by = array_unique($liked_by);
			insertLike($liked_by, $post_id);
			//print_r($liked_by);
		}
	}



	function removeLike($username, $post_id){
		$db = new db;
		$link = $db::link();
		$post_id=mysqli_real_escape_string($link, $post_id);
		$fetchQuery = "SELECT `liked_by` FROM `posts` WHERE `post_id` = $post_id LIMIT 1";
		//echo $fetchQuery;
		$result=$db::query($fetchQuery);
		$row= mysqli_fetch_assoc($result);
		$liked_by = unserialize($row['liked_by']);
		if (($key = array_search($username, $liked_by)) !== false) {
			unset($liked_by[$key]);
		}
		$serialized = serialize($liked_by);
		$insertLike = "UPDATE `posts` SET `liked_by` = '$serialized' WHERE `posts`.`post_id` = '$post_id' ";
		$db = new db;
		$db::query($insertLike);
		//print_r($liked_by);

	}


	function dislike($username, $post_id){
		$db = new db;
		$link = $db::link();
		$post_id=mysqli_real_escape_string($link, $post_id);
		$fetchQuery = "SELECT `disliked_by` FROM `posts` WHERE `post_id` = $post_id LIMIT 1";
		//echo $fetchQuery;
		$result=$db::query($fetchQuery);
		$row= mysqli_fetch_assoc($result);
		$disliked_by = unserialize($row['disliked_by']);

		function insertDislike($disliked_by, $post_id){
			$serialized = serialize($disliked_by);
			$insertDislike = "UPDATE `posts` SET `disliked_by` = '$serialized' WHERE `posts`.`post_id` = '$post_id' ";
			$db = new db;
			$db::query($insertDislike);
			return true;
		}
		if (!is_array($disliked_by) &&$username!=null) {
			//echo "No dilikes before!";
			$disliked_by = array($username);
			insertDislike($disliked_by, $post_id);
			echo $row["disliked_by"];
			//print_r($disliked_by);
		}else {
			//echo "No IF".$row["disliked_by"];
			array_push($disliked_by, $username);
			$disliked_by = array_unique($disliked_by);
			insertDislike($disliked_by, $post_id);
			//print_r($disliked_by);
		}
	}
	function removeDislike($username, $post_id){
		$db = new db;
		$link = $db::link();
		$post_id=mysqli_real_escape_string($link, $post_id);
		$fetchQuery = "SELECT `disliked_by` FROM `posts` WHERE `post_id` = $post_id LIMIT 1";
		//echo $fetchQuery;
		$result=$db::query($fetchQuery);
		$row= mysqli_fetch_assoc($result);
		$disliked_by = unserialize($row['disliked_by']);
		if (is_array($disliked_by)) {
			if (($key = array_search($username, $disliked_by)) !== false) {
				unset($disliked_by[$key]);
			}
		}
		$serialized = serialize($disliked_by);

		$insertDislike = "UPDATE `posts` SET `disliked_by` = '$serialized' WHERE `posts`.`post_id` = '$post_id' ";
		//echo $insertDislike;
		$db = new db;
		$db::query($insertDislike);
		//print_r($disliked_by);
	}
}

function fetchLikes($post_id){
	$db = new db;
	$result = $db::query("SELECT * FROM `posts` WHERE `post_id` = '$post_id' LIMIT 1");
	$row = mysqli_fetch_assoc($result);
	if ($row['liked_by']=== "") {
		$post_likes = 0;	
	} else{
		$post_likes = count(unserialize($row['liked_by']));
	}

	if ($row['disliked_by']=== "") {
		$post_dislikes = 0;
	} else {
		$post_dislikes = count(unserialize($row['disliked_by']));
	}
	$numbers = array('likes' => $post_likes, 'dislikes' => $post_dislikes, 'row' => $row);
	/****------------------------------------------------------****/

	return json_encode($numbers);
}

?>