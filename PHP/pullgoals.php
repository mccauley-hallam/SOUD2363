<?php
    require_once("../PHP/details.php");

    // Query & execute
    $sql = "SELECT ID, Title, Description, Status FROM Goals WHERE Username = '$login_session'";
    $result = $conn->query($sql);

    // If results are found in the database
    if ($result->num_rows > 0)
    {
        // Output a table, format and display data
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
    // No results found
    else
    {
        echo "0 results";
    }
    // Close database connection
    $conn->close();
?>
