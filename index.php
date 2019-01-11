<?php
    require_once("PHP/details.php");
    session_start();

    // Username & Password pushed from through POST method (triggered on button press).
    if (isset($_POST['username']) and isset($_POST['password']))
    {
        // Store entered details, this method prevents SQL injection.
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Pull results
        $query = "SELECT Password FROM Users WHERE Username = '$username'";

        // Store results
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $hashed = "";
        // Fetch hash from DB and store in array
        while($row = mysqli_fetch_array($result)) { $hashed = $row[0]; }

        // Compare entered pass to the store hash
        if (password_verify($password, $hashed))
        {
            $smsg = "Login successful. You will be redirected to the dashboard.";
            $_SESSION['username'] = $username;
            sleep(1);
            header("location: Dash/overview.php");
        }
        // If the entered password hashed does not equal the stored hash
        else
        {
            $fmsg = "Login failed. Please try again.";
        }
    }

    // If user is already logged in redirect them to dashboard
    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        header("location: Dash/overview.php");
    } else { /* do nothing */ }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="CSS/loginstyles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>SDC:UC Progress Checker</title>
        <link rel="icon" href="Images/ico.png">
    </head>
    <body background="Images/login.png" style="background-size: cover;">
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post">
                    <input type="text" name="username" placeholder="username" required/>
                    <input type="password" name="password" placeholder="password" required/>
                    <button>LOGIN</button>
                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                    <br><?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; }?></div>
                </form>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
