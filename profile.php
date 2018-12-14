<?php include("views/header.php");?>
<div class="container-fluid" >
<div class="row">
	<div class="col-md-12">
	<?php 
	if (isset($_GET['id'])){
		$userBio = fetchUserBio($_GET['id']);
		if (!isset($userBio['id'])) {
			echo "<h3>User doesn't exists!<h3>";
		} else{
			echo "<img src=".$userBio['profile_pic']." alt='user picture' class='rounded mx-auto d-block'  height=200> ";
			echo "<center><h3>".$userBio['first_name']." ".$userBio['last_name']."(".$userBio['gender'].", ".age($userBio['dob']).")</h3></center>";
			echo "<strong>Joined on: </strong>".$userBio['joined_on'];
			echo "<br><p style=' font-size: 1.2em;'>".$userBio['about']."</p>";
		}
	} else{
		$userBio = fetchUserBio($_SESSION['id']); 
		echo "<img src=".$userBio['profile_pic']." alt='user picture' class='rounded mx-auto d-block'  height=200> ";
		echo "<center><h3>".$userBio['first_name']." ".$userBio['last_name']."(".$userBio['gender'].", ".$userBio['dob'].")</h3></center>";
		echo "<strong>Joined on: </strong>".$userBio['joined_on'];
		echo "<br><p style=' font-size: 1.2em;'>".$userBio['about']."</p>";
	}
	?>
</div>
</div>
</div>
<?php include("views/footer.php");?>
<?php 
function fetchUserBio($id){
	include("db.php");
	$db = new db;
	$id = mysqli_real_escape_string($db::link(), $id);
	$result = $db::query("SELECT * FROM `users-bio` WHERE `id` = '$id' LIMIT 1");
	$row = mysqli_fetch_assoc($result);
	$id=$row['id'];
	$first_name=  $row['first_name'];
	$last_name=   $row['last_name'];
	$gender=  $row['gender'];
	$dob=  formatDate($row['dob']);
	$profile_pic=  $row['profile_pic'];
	$about=  $row['about'];
	$joined_on=  formatDate($row['joined_on']);
	return array('id'=>$id, 'first_name'=>$first_name, 'last_name'=>$last_name, 'gender'=>$gender,'dob'=>$dob, 'profile_pic'=>$profile_pic, 'about'=>$about, 'joined_on'=>$joined_on);
}

function formatDate($date){
	if (isset($date)) {
	$exp_string = explode('-', $date);
	$day = explode(' ', $exp_string[2]);
	$date = $day[0]."-".$exp_string[1]."-".$exp_string[0];
	return $date;	
	}
}

function age($dob){
#object oriented
$dob = new DateTime($dob);
$to   = new DateTime('today');
return $dob->diff($to)->y;
}
?>

