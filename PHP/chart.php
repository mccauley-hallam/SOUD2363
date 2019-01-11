<?php
    require_once("details.php");

    $Module1 = "";
    $Module2 = "";
    $Module3 = "";
    $Module4 = "";
    $Module5 = "";
    $Module6 = "";

    $query1 = "SELECT CourseID, Module1Grade, Module2Grade, Module3Grade, Module4Grade, Module5Grade, Module6Grade FROM Enrolment WHERE Username = '$login_session'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    while($row1 = mysqli_fetch_array($result1))
    {
        $CourseID = $row1[0];
        $Grade1 = $row1[1];
        $Grade2 = $row1[2];
        $Grade3 = $row1[3];
        $Grade4 = $row1[4];
        $Grade5 = $row1[5];
        $Grade6 = $row1[6];
    }

    $average = ($Grade1 + $Grade2 + $Grade3 + $Grade4 + $Grade5 + $Grade6) / 6;

    $query2 = "SELECT Module1, Module2, Module3, Module4, Module5, Module6 FROM CourseDetails WHERE CourseID = '$CourseID'";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    while($row2 = mysqli_fetch_array($result2))
    {
        $Module1 = $row2[0];
        $Module2 = $row2[1];
        $Module3 = $row2[2];
        $Module4 = $row2[3];
        $Module5 = $row2[4];
        $Module6 = $row2[5];
    }
?>
