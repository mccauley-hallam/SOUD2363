<?php
    if (isset($_POST['changepassword']))
    {
        $currentpassword = mysqli_real_escape_string($conn, $_POST['currentpassword']);
        $newpass1 = mysqli_real_escape_string($conn, $_POST['newpassword1']);
        $newpass2 = mysqli_real_escape_string($conn, $_POST['newpassword2']);

        // Pull results
        $query = "SELECT Password FROM Users WHERE Username = '$login_session'";

        // Store results
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $hashed = "";
        // Fetch hash from DB and store in array
        while($row = mysqli_fetch_array($result)) { $hashed = $row[0]; }

        // Compare entered pass to the store hash
        if (password_verify($currentpassword, $hashed))
        {
            if ($newpass1 != $newpass2)
            {
                $code = "danger";
                $status = "Error: The entered passwords do not match.";
            }
            else
            {
                $hash = password_hash($newpass1, PASSWORD_DEFAULT);
                $query = "UPDATE Users SET Password = '$hash' WHERE Username = '$login_session'";

                $result = mysqli_query($conn, $query);

                if ($result)
                {
                    $code = "success";
                    $status = "Success: Your password has been changed.";
                }
                else
                {
                    $code = "danger";
                    $status = "Error: An unknown error occured.";
                }
            }
        }
        else
        {
            $code = "danger";
            $status = "Error: Your current password is incorrect.";
        }
    }
?>
