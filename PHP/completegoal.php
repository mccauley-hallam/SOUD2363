<?php
    require_once("details.php");

    if (isset($_POST['completegoal']))
    {
        $id = mysqli_real_escape_string($conn, $_POST['goalid']);

        $query = "UPDATE Goals SET Status = 'Complete' WHERE Username = '$login_session' AND ID = '$id'";
        $result = mysqli_query($conn, $query);
    }
?>
