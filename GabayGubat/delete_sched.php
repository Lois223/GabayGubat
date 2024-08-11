<?php
session_start();

$server = 'localhost';
$user = 'root';
$pass ='';
$db = 'gabaygu1_gabaygubatdb';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $connection = mysqli_connect($server, $user, $pass, $db);
} catch (Exception $ex) {
    echo 'Error';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_schedule'])) {
    // Check if the user is logged in and has a User_ID
    if (isset($_SESSION['User_ID'])) {
        $User_ID = $_SESSION['User_ID'];
    }

    // Delete the schedule from the database
    $delete = "DELETE FROM scheduled_time WHERE User_ID = '$User_ID'";
    
    try {
        $delete_result = mysqli_query($connection, $delete);

        if ($delete_result) {
            if (mysqli_affected_rows($connection) > 0) {
                unset($_SESSION['Schedule']);
                echo '<script>alert("Schedule deleted successfully!");</script>';
                echo '<script>window.location.assign("profile.php");</script>';
            } else {
                echo '<script>alert("No schedule found for deletion");</script>';
                echo '<script>window.location.assign("profile.php");</script>';
            }
        }
    } catch (Exception $ex) {
        echo 'Error deleting schedule: ' . $ex->getMessage();
    }
}
?>