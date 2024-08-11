<?php
session_start();

$server = 'localhost';
$user = 'root';
$pass ='';
$db = 'gabaygu1_gabaygubatdb';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$connection = mysqli_connect($server, $user, $pass, $db);
}catch (Exception $ex)
{
	echo'Error';
}

if(isset($_POST['set_time']))
{
    if (isset($_SESSION['User_ID'])) 
	{
        $User_ID= $_SESSION['User_ID'];
    }

	$Activity = mysqli_real_escape_string($connection, $_POST['Activity']);
	$Location = mysqli_real_escape_string($connection, $_POST['Location']);
	$Start_Time = mysqli_real_escape_string($connection, $_POST['Start_Time']);
	$End_Time = mysqli_real_escape_string($connection, $_POST['End_Time']);
	$bool = true;

	//insert data to table
	$insert = "INSERT INTO scheduled_time (User_ID, Activity, Location, Start_Time, End_Time)
				VALUES('$User_ID', '$Activity', '$Location', '$Start_Time', '$End_Time')";

	try{
		$insert_result = mysqli_query($connection, $insert);

		if($insert)
		{
			if(mysqli_affected_rows($connection) > 0)
			{
				$_SESSION['Start_Time'] = $Start_Time;
				$_SESSION['End_Time'] = $End_Time;
				print '<script>alert("Schedule set successfully!");</script>';
				Print '<script>window.location.assign("timesched.html");</script>';
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