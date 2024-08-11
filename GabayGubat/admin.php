<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | GabayGubat</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1e3d5daa34.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class="admin-sidebar">
        <div class="logo">
            <h1>GabayGubat</h1>
        </div>

        <div class="account-profile">
            <img src="image/profile.png">
        </div>

        <div class="account-info">
            <h1>Admin Profile</h1>
            <p><strong>Username:</strong> <span id="FName"><?php session_start(); echo $_SESSION['UName']; ?></span></p>
            <p><strong>Email:</strong> <span id="Email"><?php echo $_SESSION ['Email']; ?></span></p>
        </div>
        <div class="logout">
            <a href="adminlogin.html">Log Out <i class="fa-solid fa-sign-out"></i></a>

        </div>
     
    </section>

    <section class="banner-admin">
        <img src="image/pic.jpg" alt="Banner Image">
        <div class="info">
            <h1 class="title">User Profile</h1>
        </div>    
    </section>

    <section class="admin_user-profile">
        <div class="container my-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>User_ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact_No</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Source code: https://github.com/Rijushree123/Youtube-V/blob/main/crud100/edit.php-->
                  <?php
                    include "mycon.php";
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[User_ID]</td>
                            <td>$row[FName]</td>
                            <td>$row[LName]</td>
                            <td>$row[Contact]</td>
                            <td>$row[Email]</td>
                            <td>$row[Password]</td>
                            <td>
                            <a class='btn btn-danger' href='delete_user.php? User_ID=" . htmlspecialchars($row['User_ID']) . "' onclick='return confirmDelete(\"{$row['FName']}\", \"{$row['LName']}\");'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                  ?>
                  <script>
                    function confirmDelete(fname, lname) {
                    return confirm("Are you sure you want to delete the account of " + fname + " " + lname + "?");
                    }
                </script>
                </tbody>
            </table>
        </div>
    </section>
   
  </body>
</html>
