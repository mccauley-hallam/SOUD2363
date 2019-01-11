<?php
    require_once("details.php");

    // If user presses complete goal button
    if (isset($_POST['completegoal']))
    {
        // Get ID of the goal
        $id = mysqli_real_escape_string($conn, $_POST['goalid']);

        // Execute query
        $query = "UPDATE Goals SET Status = 'Complete' WHERE Username = '$login_session' AND ID = '$id'";
        $result = mysqli_query($conn, $query);
    }
?>
