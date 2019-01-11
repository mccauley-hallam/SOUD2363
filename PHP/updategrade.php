<?php
    require_once("details.php");

    if (isset($_POST['updategrade']))
    {
        $selection = $_POST['ModuleGrade'];

        $grade = mysqli_real_escape_string($conn, $_POST['GradeValue']);

        $query1 = "UPDATE Enrolment SET $selection = '$grade'
                   WHERE Username = '$login_session'";
        $result1 = mysqli_query($conn, $query1);

        if($result1)
        {
            $status = "Successfully updated grade.";
            $code = "success";
            header("Refresh:0");
        }
        else
        {
            $status = "An error has occured, please try again.";
            $code = "danger";
        }
    }
?>
