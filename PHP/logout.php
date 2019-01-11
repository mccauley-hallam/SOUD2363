<?php
   // Reset session
   session_start();

   // Check status of session
   if(session_destroy())
   {
        // Redirect to login page if true
        header("Location: ../index.php");
   }
?>
