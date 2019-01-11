<?php
    require_once("details.php");

    // If the user presses the update grade button
    if (isset($_POST['updategrade']))
    {
        // Get the value of the course from the dropdown
        $selection = $_POST['ModuleGrade'];

        // Get the value of the textbox (grade)
        $grade = mysqli_real_escape_string($conn, $_POST['GradeValue']);

        // Query (update grade)
        $query1 = "UPDATE Enrolment SET $selection = '$grade'
                   WHERE Username = '$login_session'";
        $result1 = mysqli_query($conn, $query1);

        if($result1)
        {
            // Success & refresh page
            $status = "Successfully updated grade.";
            $code = "success";
            header("Refresh:0");
        }
        else
        {
            // Failure
            $status = "An error has occured, please try again.";
            $code = "danger";
        }
    }
?>
