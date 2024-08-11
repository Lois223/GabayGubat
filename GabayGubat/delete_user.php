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

if (isset($_GET['User_ID'])) {
    $User_ID = htmlspecialchars($_GET['User_ID']);

    // Delete the user from the database
    $delete = "DELETE FROM users WHERE User_ID = $User_ID";
    
    try {
        $delete_result = mysqli_query($connection, $delete);

        if ($delete_result) {
            if (mysqli_affected_rows($connection) > 0) {
                unset($_SESSION['User_ID']);
                echo '<script>alert("User profile deleted successfully!");</script>';
                echo '<script>window.location.assign("admin.php");</script>';
            } else {
                echo '<script>alert("No User profile found for deletion");</script>';
                echo '<script>window.location.assign("admin.php");</script>';
            }
        }
    } catch (Exception $ex) {
        echo 'Error deleting user: ' . $ex->getMessage();
    }
}
?>