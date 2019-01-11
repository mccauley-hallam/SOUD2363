<?php
    // If user presses change password button
    if (isset($_POST['changepassword']))
    {
        // Current password
        $currentpassword = mysqli_real_escape_string($conn, $_POST['currentpassword']);
        // New Password 1
        $newpass1 = mysqli_real_escape_string($conn, $_POST['newpassword1']);
        // New Password Comparison
        $newpass2 = mysqli_real_escape_string($conn, $_POST['newpassword2']);

        // Pull results
        $query = "SELECT Password FROM Users WHERE Username = '$login_session'";

        // Store results
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        // Initialize variable for later use
        $hashed = "";
        // Fetch hash from DB and store in array
        while($row = mysqli_fetch_array($result)) { $hashed = $row[0]; }

        // Compare entered pass to the store hash
        if (password_verify($currentpassword, $hashed))
        {
            // Require new password to be entered twice and match (so no mistakes are made)
            if ($newpass1 != $newpass2)
            {
                // Does not match
                $code = "danger";
                $status = "Error: The entered passwords do not match.";
            }
            else
            {
                // Matches

                // Encrypt password
                $hash = password_hash($newpass1, PASSWORD_DEFAULT);

                // Query
                $query = "UPDATE Users SET Password = '$hash' WHERE Username = '$login_session'";

                // Try to push
                $result = mysqli_query($conn, $query);

                if ($result)
                {
                    // Success
                    $code = "success";
                    $status = "Success: Your password has been changed.";
                }
                else
                {
                    // Failure
                    $code = "danger";
                    $status = "Error: An unknown error occured.";
                }
            }
        }
        else
        {
            // Failure
            $code = "danger";
            $status = "Error: Your current password is incorrect.";
        }
    }
?>
