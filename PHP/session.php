<?php
   include('details.php');
   session_start();

   $user_check = $_SESSION['username'];

   $ses_sql = mysqli_query($conn,"SELECT Username FROM Users WHERE Username = '$user_check'");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['Username'];

   if(!isset($_SESSION['username']))
   {
        header("location: ../Dash/direct.php");
   }
?>
