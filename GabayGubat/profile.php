<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | GabayGubat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1e3d5daa34.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="nav">
        <div class="toggle-logo">
            <a href="#" id="sidebar-toggle" onclick="openNav()"><i class="fa-solid fa-bars"></i></a>
            <a href="index.html"><h1>GabayGubat</h1></a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="guides.html">Guides</a></li>
                <li>
                    <a href="tools.html">Tools</a>
                    <ul>
                        <li><a href="map.html">Map</a></li>
                        <li><a href="checklist.html">Checklist</a></li>       
                    </ul>
                
                </li>
                <li><a href="timesched.html">Time Schedule</a></li>
            </ul>
        </nav>
        <div class="account-profile">
            <i class="fa-solid fa-user profile-icon" onclick="toggleDropdown()" style="color: #9BA737;"></i>
            <div class="profile-dropdown" id="profileDropdown">
                <ul>
                    <li><a href="profile.php">View Profile <i class="fa-solid fa-chevron-right"></i></a></li>
                    <li><a href="logout.php">Logout <i class="fa-solid fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-x"></i></a>
        <div class="sidebar-search-container">
            <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="sidebar-search-input" placeholder="Search...">
        </div>
        <div class="tab-container">
            <a href="guides.html"><i class="fa-solid fa-compass"></i> Guide</a>
            <div class="subsection">
                <a href="camping.html">Camping</a>
                <a href="hiking.html">Hiking</a>
                <a href="mtbiking.html">Mountain Biking</a>
                <a href="mountaineering.html">Mountaineering</a>              
                <a href="rockclimbing.html">Rock Climbing</a>
                <a href="wildlifewatch.html">Wildlife Watching</a>
            </div>
            <a href="tools.html"><i class="fa-solid fa-wrench"></i> Tools</a>
            <div class="tool-subsection">
                <a href="checklist.html"><i class="fa-solid fa-check-square"></i> Checklist</a>
                <div class="check_map-subsection">
                    <a href="campingcheck.html">Camping</a>
                    <a href="hikingcheck.html">Hiking</a>
                    <a href="mtbikingcheck.html">Mountain Biking</a>
                    <a href="mountaineeringcheck.html">Mountaineering</a>              
                    <a href="rockclimbingcheck.html">Rock Climbing</a>
                    <a href="wildlifewatchcheck.html">Wildlife Watching</a>
                </div>
                <a href="map.html"><i class="fa-solid fa-map"></i> Map</a>
                <div class="check_map-subsection">
                    <a href="campingmap.html">Camping</a>
                    <a href="hikingmap.html">Hiking</a>
                    <a href="mtbikingmap.html">Mountain Biking</a>
                    <a href="mountaineeringmap.html">Mountaineering</a>              
                    <a href="rockclimbingmap.html">Rock Climbing</a>
                    <a href="wildlifewatchmap.html">Wildlife Watching</a>
                </div>
            </div>
            <a href="timesched.html"><i class="fa-solid fa-clock"></i> Time Schedule</a>
            <a href="profile.php" class="curpage"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="userlogin.html"><i class="fa-solid fa-sign-out"></i> Log Out</a>
        </div>
       
        <p class="sidebar-footer">GabayGubat</p>      
    </section>

    <section class="profile">
        <div class="profile-container">
            <div class="user-profile">
                <h2>User Profile</h2>
                <div class="profile-info">
                    <img src="image/pic.jpg" alt="Profile Picture" id="profilePicture">
                    <div class="user-details">
                        <p><strong>Username:</strong> <span id="username"><?php session_start(); echo $_SESSION['FName']." ".$_SESSION['LName']; ?></span></p>
                        <p><strong>Email:</strong> <span id="email"><?php echo $_SESSION ['Email']; ?></span></p>
                    </div>
                </div>
            </div>

            <div class="user-time-schedule">
                <h2>Time Scheduled</h2>
                <ul id="timeScheduledList">
                    <?php 
                    $br = '<br>';
                    if (isset($_SESSION['Start_Time']) && isset($_SESSION['End_Time']) && !empty($_SESSION['Schedule'])) {
                        echo "Start Time: ". $_SESSION['Start_Time']. $br ." End Time: " .$_SESSION['End_Time'];
                    } else {
                        echo 'No scheduled time set!';
                    }  
                    ?>
                    <form id="delbutton" action="delete_sched.php" method="post">
                        <input type="submit" name="delete_schedule" value="Finish"/>
                    </form>
                </ul>
            </div>
            
            <div class="downloaded-maps">
                <h2>Downloaded Maps</h2>
                <ul id="downloadedMapsList">
                    <!-- Empty list for downloaded maps -->
                </ul>
            </div>


        </div>
    </section>

    <section class="footer-banner">
        <img src="image/pic.jpg">
        <div class="content">
            <h1>Well-prepared travel is responsible travel.</h1>
            <p>DO YOUR PART BY PLANNING AHEAD</p>
        </div>
    </section>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a href="index.html" id="logo"><h1>GabayGubat</h1></a>
                <h3>Discover Your Path to Adventure and Enlightenment</h3>
                <div class="icons">
                    <a href="#" class="fa-brands fa-square-facebook"></a> 
                    <a href="#" class="fa-brands fa-instagram"></a> 
                    <a href="#" class="fa-brands fa-pinterest"></a>
                </div>           
            </div>

            <div class="box">
                <h3>Helpful Links</h3>
                <a href="guides.html">Guides</a>
                <a href="tools.html">Tools</a>
                <a href="timesched.html">Time Schedule</a> 
            </div>
        </div>

    <div class="credit">©2024 GabayGubat <span> | All rights reserved.</span></div> 
    </section>

    <script>
        //sidebar
        function openNav() {
            document.getElementById("sidebar").style.left = "0"; // Move sidebar to the visible position
        }

        function closeNav() {
            document.getElementById("sidebar").style.left = "-250px"; // Move sidebar back to the hidden position
        }

        // user profile dropdown
        function toggleDropdown() {
        var dropdown = document.getElementById("profileDropdown");
    
          // Check if the dropdown is currently visible
          if (dropdown.style.display === "block") {    
              dropdown.style.display = "none"; // hide if it's visible
          } else {
              dropdown.style.display = "block";  // show if it's hidden
          }
        }

    </script>
</body>
</html>
