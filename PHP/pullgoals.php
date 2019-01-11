<?php
    require_once("../PHP/details.php");

    $sql = "SELECT ID, Title, Description, Status FROM Goals WHERE Username = '$login_session'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        echo "<table class='table'>";
        echo "<table class='table'>" . "<thead><tr>
        <th scope='col'>ID</th>
        <th scope='col'>Title</th>
        <th scope='col'>Description</th>
        <th scope='col'>Status</th>
        </tr></thead>";
        while($row = $result->fetch_assoc())
        {
            echo "<tbody><tr><td>" . $row['ID'] . "</td><td>" . $row['Title'] . "</td><td>" . $row['Description'] . "</td><td>" . $row['Status'] . "</td></tr></tbody>";
        }
        echo "</table>";
    }
    else
    {
        echo "0 results";
    }
    $conn->close();
?>
