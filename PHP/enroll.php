<?php
    require_once("details.php");

    if (isset($_POST['enroll']))
    {
        $selection = $_POST['CourseID'];

        $query = "UPDATE Enrolment SET CourseID = '$selection'
                  WHERE Username = '$login_session'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            $status = "Successfully updated course.";
            $code = "success";
            $selection = "";
        }
        else
        {
            $status = "An error has occured, please try again.";
            $code = "danger";
            $selection = "";
        }
        $selection = "";
    }
?>
