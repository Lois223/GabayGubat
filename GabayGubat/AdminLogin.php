<?php
include('mycon.php');
session_start();

    //user data sent from form
    $UName = mysqli_real_escape_string($connection, $_POST['UName']);
	$Password = mysqli_real_escape_string($connection, $_POST['Password']);

    $query1 = mysqli_query($connection, "SELECT * FROM admins WHERE UName = '$UName'"); 
    $existing = mysqli_num_rows($query1);

    $table_users1="";
    $table_password1="";

    if($existing > 0)
    {
        while($row = mysqli_fetch_assoc($query1))
        {
            $table_users1 = $row['UName'];
            $table_password1 = $row['Password'];
            $Email = $row['Email'];
        }
        if (($UName == $table_users1) && ($Password == $table_password1))
        {
            if ($Password == $table_password1)
            {
                $_SESSION['UName']= $UName;
                $_SESSION['Email']= $Email;
                header("location:admin.php");
            }
        }
        else
        {
            print'<script>alert("Incorrect Password! Please try again.");</script>';
            print'<script>window.location.assign("adminlogin.html");</script>';
        }
    }
    else{
        print'<script>alert("Incorrect Username! Please try again.");</script>';
        print'<script>window.location.assign("adminlogin.html");</script>'; 
    }
?>