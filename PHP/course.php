<?php
    require_once('details.php');

    // Fetch username stored in current session
    $user_check = $_SESSION['username'];

    // Query
    $query1 = "SELECT CourseID FROM Enrolment WHERE Username = '$user_check'";

    // Execute query
    $sql = mysqli_query($conn, $query1);
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

    // Fetch ID of course from database pull
    $courseid = $row['CourseID'];

    // Display text according to results
    if($courseid == "undefined")
    {
        // No details
        $search = "No course details found, please use the enrolment form.";
    }
    else
    {
        // Details found
        $search = "Overview for $courseid";
    }
?>
