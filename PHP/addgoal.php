<?php
    require_once("details.php");

    // If user press the add goal button
    if (isset($_POST['addgoal']))
    {
        // Title of goal
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        // Description of goal
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        // Query
        $query = "INSERT INTO Goals (Username, Title, Description, Status) VALUES ('$login_session', '$title', '$description', 'Incomplete')";

        // Try to execute
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        // If success
        if ($result)
        {
            $code = "success";
            $status = "Success: A new goal has been added.";
        }
        // If failure
        else
        {
            $code = "danger";
            $status = "Error: An error has occurred, please try again.";
        }
    }
    // Error catching
    else
    {
       // do nothing
    }
?>
