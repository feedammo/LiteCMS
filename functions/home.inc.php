<?php		
include("db.php");
function fetchUserPosts($id){
	if ($_SESSION['id']==$id) {
		$db = new db;	
		$link = $db::link();
		$id = $_SESSION['id'];
		$id = mysqli_real_escape_string($link, $id);
		$result = $db::query("SELECT * FROM `posts` WHERE `id` = '$id' ORDER BY `post_id` DESC");
		$row = mysqli_fetch_all($result);
		$post_user_id="";
		$post_title="";
		$post_text="";
		$post_image="";
		$post_date="";
		$shellA="<div class='card col-md-3 col-sm-6' style='width: 20rem;'>
		<img class='card-img-top' height='150' width='150' src='";
		$shellB="' alt='Card image cap'><div class='card-body'><h4 class='card-title'>";		
		for($i=0; $i<count($row);$i++){
			for($j=0;$j<count($row[$i]);$j++){
				$post_id=$row[$i][0];
				$post_user_id=$row[$i][1];
				$post_title=$row[$i][2];
				$post_text=$row[$i][3];
				$post_image=$row[$i][4];
				$post_date=$row[$i][5];							 
			}
			echo $shellA.$post_image.$shellB.$post_title."</h4><p class='card-text'>".strip_tags(mb_substr($post_text,0,50))."...<a href='posts.php?pid=".$post_id."' class='btn btn-primary knowMore'>Know More</a>.</p></div></div></br>";
		}				
	}
}

function fetchPost($post_id){
	$db = new db;
	$result = $db::query("SELECT * FROM `posts` WHERE `post_id` = '$post_id' LIMIT 1");
	$row = mysqli_fetch_assoc($result);
	$post_user_id=$row['id'];
	$post_title=  $row['post_title'];
	$post_text=   $row['post'];
	$post_image=  $row['image'];
	$post_date = null;
	if($row['post_date']){
		$post_date= formatDate($row['post_date']);	
	}
	if ($row['liked_by']==null) {
		$post_likes = 0;
	} else{
		$post_likes= count(unserialize($row['liked_by']));	
	}
	if ($row['disliked_by']==null) {
		$post_dislikes = 0;
	}else{
		$post_dislikes = count(unserialize($row['disliked_by']));
	}
	return array('post_user_id'=>$post_user_id, 'post_id'=>$post_id, 'post_title'=>$post_title, 'post_date'=>$post_date,'post_image'=>$post_image, 'post_text'=>$post_text, 'post_likes'=> $post_likes, 'post_dislikes'=> $post_dislikes);
}


function formatDate($date){
	$exp_string = explode('-', $date);
	$day = explode(' ', $exp_string[2]);
	$date = $day[0]."-".$exp_string[1]."-".$exp_string[0];
	return $date;
}


function fetchComment($post_id, $id){
	$db = new db;	
	$link = $db::link();
	$post_id = mysqli_real_escape_string($link, $post_id);
	$result=$db::query("SELECT * from `comments` WHERE `post_id` = '$post_id'");
	$row = mysqli_fetch_all($result);
	$user_id="";
	$comment="";
	$comment_date= "";
	if (count($row)==0) {
		echo "<h3>So much empty! Add a comment ?</h3>";
	}else{
		for($j = 0; $j< count($row); $j++) {
			for ($i=0; $i < count($row[$j]); $i++) { 			
				$cid = $row[$j][0];
				$user_id=$row[$j][1];
				$comment=  $row[$j][3];
				$comment_date=   $row[$j][4];
			};
			echo "<div class='col-md-2'>"."<a href='profile.php?id=".$user_id."'>".fetchUsername($user_id)."</a>"."</div><div class='col-md-8'> ".$comment."</div>".checkCommentUser($id, $user_id, $cid);
		}	
	}
}
function fetchUsername($id){
	$db = new db;	
	$link = $db::link();
	$id = mysqli_real_escape_string($link, $id);
	$result = $db::query("SELECT `username` FROM `users`WHERE `id` = '$id' LIMIT 1");
	$row = mysqli_fetch_assoc($result);
	return $row['username'];
}

function checkCommentUser($id, $user_id, $cid){
	if ($id == $user_id) {
		return  "<div class='col-md-2'><button type='button' class='btn btn-sm btn-danger deleteComment' value=".$cid.">Delete</button></div>"."<hr>";
	}	
	else{
		return "<div class='col-md-2'></div>";
	}
}


function userLike($username, $post_id){
	$db = new db;
	$link = $db::link();
	$post_id=mysqli_real_escape_string($link, $post_id);
	$result=$db::query("SELECT `liked_by` FROM `posts` WHERE `post_id` = $post_id LIMIT 1");
	$row= mysqli_fetch_assoc($result);
	$liked_by = unserialize($row['liked_by']);
	$dislikeresult =$db::query("SELECT `disliked_by` FROM `posts` WHERE `post_id` = $post_id LIMIT 1");
	$dislikerow= mysqli_fetch_assoc($dislikeresult);
	$disliked_by= unserialize($dislikerow['disliked_by']);	
	/////////////////////Version 0.2//////////////////////////////////
	if (is_array($liked_by)) {
		foreach ($liked_by as $key => $value) {
			if ($value === $username) {
				return true;
			} 
		}
	}

	if (is_array($disliked_by)) {
		foreach ($disliked_by as $key => $value) {
			if ($value === $username) {
				return false;
			} 		}
		}		
	}
	?>


