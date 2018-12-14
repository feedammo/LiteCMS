<?php 
class Post {
	function createPost($id,$post_title,$image,$post){
		global $link;
		$id=mysqli_real_escape_string($link, $id);
		$post_title=mysqli_real_escape_string($link, strip_tags($post_title));
		$post=mysqli_real_escape_string($link, strip_tags($post,"<a><li><h2><h3><ul><li><i><mark><em><b><u><small><strong><div><span><p><img><hr><br><iframe>"));
		$image=mysqli_real_escape_string($link, $image);
		$post_date = mysqli_real_escape_string($link, date('Y-m-d H:i:s'));
		$query = "INSERT INTO posts (id, post_title, post, image, post_date)  
		VALUES ($id, '$post_title', '$post', '$image','$post_date') ";
		$result = mysqli_query($link, $query) or die();
		if ($result) {
			echo $result;
		}else{
			echo "Ops! Couldn't post!";
		}
	}

	function editPost($pid,$post_title,$image,$post){
		global $link;
		$pid=mysqli_real_escape_string($link, $pid);
		$post_title=mysqli_real_escape_string($link, strip_tags($post_title));
		$post=mysqli_real_escape_string($link, strip_tags($post, "<a><li><h2><h3><ul><li><i><mark><em><b><u><small><strong><div><span><p><img><hr><br><iframe>"));
		$image=mysqli_real_escape_string($link, $image);
		if ($image==""||$image==null) {
			$query = "UPDATE `posts` SET `post_title`= '$post_title',`post`='$post' WHERE `post_id` = '$pid' ";
		}else{
			$query = "UPDATE `posts` SET `post_title`= '$post_title',`post`='$post',`image`='$image' WHERE `post_id` = '$pid' ";
		}
		// echo $query;
		$result = mysqli_query($link, $query) or die();
		if ($result) {
			echo $pid;
		}else{
			echo "Ops! Couldn't update!";
		}
	}
}

?>