<?php
    include_once "db/dbconnect.php";
    include_once "functions.inc.php";

    if (isset($_POST['submit'])) {
        if (empty($_POST['email'])) {
            // $_POST['email'] = '';
            $errors['email'] = "Missing email";
            // var_dump($errors);
        }
        if (empty($_POST['password'])){
            // $_POST['password'] = '';
            $errors['password'] = "Missing Password";
            var_dump($errors);
        }
        // var_dump($_POST['email']);

        $noNull = (isset($_POST['email']) && isset($_POST['password']));
        var_dump($noNull);
        if($noNull)
        {
            $inputtedEmail = sanitizeStr($_POST['email']);
            $inputtedPassword = sanitizeStr($_POST['password']);

            $loginQuery = "SELECT USER_ID, EMAIL, PASSWORD ";
            $loginQuery .= "FROM USER ";
            // $loginQuery .= "WHERE Email = ? AND Password = ?";
            $loginQuery .= "WHERE Email = ?";

            $stmt = $conn->prepare($loginQuery);
            // $stmt->bind_param("ss", $inputtedEmail, $inputtedPassword);
            $stmt->bind_param("s", $inputtedEmail);
            $stmt->execute();

            $accountInfo = $stmt->get_result();

            // Check if theres something that was returned
            if ($accountInfo->num_rows === 0) {
                // Verify password hash
                echo "No account by those credentials";
            }
            else {
                $accountInfoDisplay = $accountInfo->fetch_all(MYSQLI_ASSOC);
                var_dump($accountInfoDisplay);
                // echo "Email".$accountInfoDisplay['EMAIL'];
                // echo "ID".$accountInfoDisplay['USER_ID'];
                if (password_verify($inputtedPassword, $accountInfoDisplay[0]['PASSWORD'])) {
                    session_start();
                    $_SESSION['email'] = $accountInfoDisplay[0]['EMAIL'];
                    $_SESSION['userID'] = $accountInfoDisplay[0]['USER_ID'];
                    echo "Credentials accepted";
                    var_dump($_SESSION);
                    header("Location: Home.php");
                }
                else {
                    $errors['password'] = "Credentials do not match!";
                }
            }  
        }
    }
?>