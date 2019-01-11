<?php
    require_once('details.php');

    $user_check = $_SESSION['username'];

    $query1 = "SELECT CourseID FROM Enrolment WHERE Username = '$user_check'";

    $sql = mysqli_query($conn, $query1);
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $courseid = $row['CourseID'];

    if($courseid == "undefined")
    {
        $search = "No course details found, please use the enrolment form.";
    }
    else
    {
        $search = "Overview for $courseid";
    }
?>
