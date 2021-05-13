<!-- WHAT IS CURRENTLY MISSING: 
NO CHECKING IF THE USERNAME/PASSWORD ALREADY EXISTS IN DB
NO SUCCESS STATEMENT SAYING THAT THE ACCOUNT WAS CREATED. 
WOULD I REROUTE THEM THEN TO THE HOMEPAGE OR LOGIN? -->

<?php
    include_once "db/dbconnect.php";
    include_once "functions.inc.php";

    if (isset($_POST['submit'])) {
        if (empty($_POST['email'])) {
            $errors['email'] = "Missing email";
            //var_dump($errors);
        }
        if (empty($_POST['password'])) {
            $errors['password'] = "Missing Password";
            var_dump($errors);
        }
        // var_dump($_POST['email']);

        $noNull = (empty($errors['password'])) && empty($errors['user']);
        var_dump($noNull);
        if($noNull)
        {
            // $inputtedEmail = $_POST['email'];
            // $inputtedPassword = $_POST['password'];

            $inputtedEmail = sanitizeStr($_POST['email']);
            $inputtedPassword = sanitizeStr($_POST['password']);

            $hashedPassword = password_hash($inputtedPassword, PASSWORD_DEFAULT);
            $signupQuery = "INSERT INTO USER (Email, Password)";
            $signupQuery .= "VALUES (?, ?)";

            // mysqli_query($conn, $signupQuery);
            $stmt = $conn->prepare($signupQuery);
            $stmt->bind_param("ss", $inputtedEmail, $hashedPassword);
            $stmt->execute();

            header("Location: Login.php");
        }
    }
?>