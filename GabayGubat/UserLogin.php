<?php
include('mycon.php');
session_start();

    //user data sent from form
    $Email = mysqli_real_escape_string($connection, $_POST['Email']);
	$Password = mysqli_real_escape_string($connection, $_POST['Password']);

    $query1 = mysqli_query($connection, "SELECT * FROM users WHERE Email = '$Email'"); 
    $existing = mysqli_num_rows($query1);

    $table_users1="";
    $table_password1="";

    if($existing > 0)
    {
        while($row = mysqli_fetch_assoc($query1))
        {
            $table_users1 = $row['Email'];
            $table_password1 = $row['Password'];
            $User_ID = $row['User_ID'];
            $FName = $row['FName'];
            $LName = $row['LName'];
            $Schedule = $row['Schedule'];
        }
        if (($Email == $table_users1) && ($Password == $table_password1))
        {
            if ($Password == $table_password1)
            {
                $_SESSION['Email'] = $Email;
                $_SESSION['User_ID'] = $User_ID;
                $_SESSION['FName'] = $FName;
                $_SESSION['LName'] = $LName;
                $_SESSION['Schedule'] = $Schedule;
                header("location:index.html");
            }
        }
        else
        {
            print'<script>alert("Incorrect Password! Please try again.");</script>';
            print'<script>window.location.assign("userlogin.html");</script>';
        }
    }
    else{
        print'<script>alert("Incorrect Email! Please try again.");</script>';
        print'<script>window.location.assign("userlogin.html");</script>'; 
    }
?>