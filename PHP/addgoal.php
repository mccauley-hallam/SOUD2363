<?php
    require_once("details.php");

    if (isset($_POST['addgoal']))
    {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $query = "INSERT INTO Goals (Username, Title, Description, Status) VALUES ('$login_session', '$title', '$description', 'Incomplete')";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($result)
        {
            $code = "success";
            $status = "Success: A new goal has been added.";
        }
        else
        {
            $code = "danger";
            $status = "Error: An error has occurred, please try again.";
        }
    }
    else
    {
       // do nothing
    }
?>
