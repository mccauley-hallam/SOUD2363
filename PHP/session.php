<?php
   include('details.php');

   // Start session
   session_start();

   // Assign username of current session for use in other areas
   $user_check = $_SESSION['username'];

   // Query to verify the logged in user, if it doesn't match the user is redirected
   $ses_sql = mysqli_query($conn,"SELECT Username FROM Users WHERE Username = '$user_check'");

   // Execute query
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   // Assign username of current session for use in other areas
   $login_session = $row['Username'];

   // If the user is not logged in, redirect them to the login page
   if(!isset($_SESSION['username']))
   {
        header("location: ../Dash/direct.php");
   }
?>
