<?php
session_start();

$server = 'localhost:3306';
$user = 'root';
$pass ='';
$db = 'gabaygubatdb';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$connection = mysqli_connect($server, $user, $pass, $db);
}catch (Exception $ex)
{
	echo'Error';
}

if(isset($_POST['reg_admin']))
{
	$UName = mysqli_real_escape_string($connection, $_POST['UName']);
	$FName = mysqli_real_escape_string($connection, $_POST['FName']);
	$LName = mysqli_real_escape_string($connection, $_POST['LName']);
	$Email = mysqli_real_escape_string($connection, $_POST['Email']);
	$Password = mysqli_real_escape_string($connection, $_POST['Password']);
	$ConfirmPassword = mysqli_real_escape_string($connection, $_POST['ConfirmPassword']);
	$bool = true;

	if ($Password != $ConfirmPassword) 
	{
		print '<script>alert("Password does not match!");</script>';
	}

	//verify user
	$query = mysqli_query($connection, "SELECT * FROM admins"); 
	while($row = mysqli_fetch_array($query))
	{
		$table_users = $row['Email'];
		if($Email == $table_users)
		{
			$bool = false;
			print '<script>alert("Email is already in use!");</script>';
			print '<script>window.location.assign("userregister.html");</script>';
		}
	}	


	//insert data to table
	$insert = "INSERT INTO admins (UName, FName, LName, Email, Password)
				VALUES('$UName', '$FName', '$LName', '$Email', '$Password')";

	try{
		$insert_result = mysqli_query($connection, $insert);

		if($insert)
		{
			if(mysqli_affected_rows($connection) > 0)
			{
				print '<script>alert("Sucessfull!");</script>';
					$_SESSION['FName'] = $FName;
					Print '<script>window.location.assign("adminlogin.html");</script>';
			}else{
				echo'Data not inserted!';
			}
		}
	}
	catch (Exception $ex)
	{
		echo 'Error Insert'.$ex -> getMessage();
	}
}
?>