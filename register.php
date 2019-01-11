<?php
    require_once("PHP/details.php");
    session_start();

    // Request received for registration (triggered on button press)
    if(isset($_POST['register']))
    {
        // Store entered details, this method prevents SQL injection.
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Generate hash
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Store details in DB
        $sql1 = "INSERT INTO Enrolment (Username, Module1Grade, Module2Grade, Module3Grade, Module4Grade, Module5Grade, Module6Grade)
        VALUES ('$username', '0', '0', '0', '0', '0', '0')";
        $sql2 = "INSERT INTO Users (Name, Username, Password, Email) VALUES ('$name', '$username', '$hash', '$email')";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        // Check if query was executed with no errors
        if ($result1 && $result2)
        {
            $status = "Account successfully registered. You may now login.";
            $code = "success";
        }
        // If errors display this message
        else
        {
            $status = "Account registration failed, do you already have an account?";
            $code = "danger";
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="CSS/loginstyles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>SDC:UC Progress Checker</title>
        <link rel="icon" href="Images/ico.png">
    </head>
    <body background="Images/login.png">
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post">
                    <input type="text" name="name" placeholder="Name" required/>
                    <input type="text" name="username" placeholder="username" required/>
                    <input type="email" name="email" placeholder="email" required/>
                    <input type="password" name="password" placeholder="password" required/>
                    <button name="register">REGISTER</button>
                    <p class="message">Already have an account? <a href="index.php">Login</a></p>
                    <br>
                    <?php if(isset($status)){ ?><div class="alert alert-<?php echo $code ?>" role="alert"> <?php echo $status; }?></div>
                </form>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
