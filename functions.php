<?php 
/*Check Empty Input for Login*/
function validateLoginInputs(){ 
	$keys = array('username','password');
	foreach($keys as $key){
		global $error;
		if(!isset($_POST[$key]) || empty($_POST[$key])){
		throw new Exception("Field(s) can't be left blank!");
			}
	}
} 
/*Check empty input for fields*/
function validateInputs(){ 
	global $error;
	$keys = array('username','email','password','cpassword');
	foreach($keys as $key){
		if(!isset($_POST[$key]) || empty($_POST[$key])){
			throw new Exception("Field(s) can't be left blank!");
			
		} 
	}
} 
/*Password Confirmation*/
function validatePassword(){
	global $error;
	$uppercase = preg_match('@[A-Z]@', $_POST['password']);
	$lowercase = preg_match('@[a-z]@', $_POST['password']);
	$number    = preg_match('@[0-9]@', $_POST['password']);

	if(!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {
		throw new Exception("Password must contain a lower and an uppercase letter and must be atleast 8 character long.");
	}
	if($_POST['password'] !== $_POST['cpassword']){
		throw new Exception("Password didn't match!");
		
	}
}

/*validate email patternv*/
function validateEmail(){
	global $error;
	$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

	if(!preg_match($pattern,$_POST['email'])){
		throw new Exception("Email is not in right format.");
		}
}
/*Checking If email and Username already exists*/
function checkForUniqueInput($email,$username){
	global $link;
	global $error;
	$query = "SELECT username, email FROM users WHERE username = '".$username."' OR email = '".$email."'";
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) > 0) {
		throw new Exception("Username and/or email already exist");
		}
}
/*Signup*/
function insertNewUser($email,$username,$password){
	global $link;
	global $error;
	$query = "INSERT INTO `users` (id, username, email, password) VALUES (NULL,'$username', '$email', '$password')" ;     
	if(!mysqli_query($link, $query)){ 
		throw new Exception("Something went wrong, Couldn't register at the moment!"); 
		}
}
/*Login User*/
function loginUser($username,$password){
	global $link;
	global $error;
	$query =  "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
	$result = mysqli_query($link, $query); 
	$row = mysqli_fetch_assoc($result);
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];			
	if(mysqli_num_rows($result)==0){
	throw new Exception("Username or Password didn't match");
		}
}
/*Fetch posts on user's request */
function fetchPosts($array_length){
	$data = array();
	$posts = array();
	$shellA="<div class='card col-md-3 col-sm-6' style='width: 20rem;'>
	<img class='card-img-top' height='200' src='";
	$shellB="' alt='Card image cap'><div class='card-body'><h4 class='card-title'>";
	$query = "SELECT * FROM `posts` ORDER BY `post_id` DESC LIMIT $array_length";
	$db = new db;
	$result = $db::query($query); 
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	} 
	foreach($data as $key => $value){
		foreach($value as $index => $data){
			$posts[$key][$index] = $data;
		}
	}
	for($i=0; $i< count($posts) ; $i++){
		echo $shellA.$posts[$i]['image'].$shellB.$posts[$i]['post_title']."</h4><p class='card-text'>".mb_substr(strip_tags($posts[$i]['post']), 0, 50)."..."."</p><a href='posts.php?pid=".$posts[$i]['post_id']."' class='btn btn-primary knowMore'>Know More</a></div></div>";	
	}
}
?>
