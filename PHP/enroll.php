<?php
    require_once("details.php");

    // If the user presses the enroll button
    if (isset($_POST['enroll']))
    {
        // Get the name of the course they've selected
        $selection = $_POST['CourseID'];

        // Query & execute
        $query = "UPDATE Enrolment SET CourseID = '$selection'
                  WHERE Username = '$login_session'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            // Success
            $status = "Successfully updated course.";
            $code = "success";
            $selection = "";
        }
        else
        {
            // Failure
            $status = "An error has occured, please try again.";
            $code = "danger";
            $selection = "";
        }
        // Reset Variable
        $selection = "";
    }
?>
