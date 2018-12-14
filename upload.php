
<?php
// print_r($_FILES);
if (isset($_FILES['file'])) {
	$file = $_FILES['file'];
	// File Properties
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];
	//Verifying File Extension
	$file_ext = explode('.', $file_name);
	
	$file_ext = strtolower(end($file_ext));
	$allowed = array('png', 'jpg');
	if (in_array($file_ext, $allowed)) {
		if ($file_error===0) {
			if ($file_size <= 2097152) {
				$file_name_new = uniqid('', true).'.'.$file_ext;
				$file_destination = 'assets/user_uploads/'.$file_name_new;

				if (move_uploaded_file($file_tmp, $file_destination)) {
					echo $file_destination;
				// return $file_destination;
				}
			}
		}
	}

}


?>