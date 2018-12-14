<?php
$link = mysqli_connect("localhost", "root", "", "boldcat");
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}
$salt="!)(aQzP#4@^&#$:%!(6qw322Bsa45$^>@";

?>
<?php
class db{
	function query($query){
		$link = mysqli_connect("localhost", "root", "", "boldcat");
		if ($link) {
			return mysqli_query($link, $query);	
		}else{
		die("Connection failed: ".mysqli_connect_error());
		}
	}	
	function link(){
		return mysqli_connect("localhost", "root", "", "boldcat");
	}
}

?>