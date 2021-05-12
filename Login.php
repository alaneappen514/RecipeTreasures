<?php
 include_once "db/dbconnect.php";

 //Protect from 
 function validateStr($str){
  $str = trim($str);
  $str = stripcslashes($str);
  $str = htmlspecialchars($str);

  return $str;
}

 if(isset($_POST['submit'])){
  if(empty($_POST['email'])){
    // $_POST['email'] = '';
    $errors['email'] = "Missing email";
    //var_dump($errors);
  }

  if(empty($_POST['password'])){
    // $_POST['password'] = '';
    $errors['password'] = "Missing Password";
    var_dump($errors);
  }
  // var_dump($_POST['email']);

  $noNull = (isset($_POST['email']) && isset($_POST['password']));
  var_dump($noNull);
  if($noNull)
  {
    $inputtedEmail = validateStr($_POST['email']);
    $inputtedPassword = validateStr($_POST['password']);

    $loginQuery = "SELECT USER_ID, EMAIL, PASSWORD ";
    $loginQuery .= "FROM USER ";
    // $loginQuery .= "WHERE Email = ? AND Password = ?";
    $loginQuery .= "WHERE Email = ?";

    $stmt = $conn->prepare($loginQuery);
    // $stmt->bind_param("ss", $inputtedEmail, $inputtedPassword);
    $stmt->bind_param("s", $inputtedEmail);
    $stmt->execute();

    $accountInfo = $stmt->get_result();

    //Check if theres something that was returned
    if($accountInfo->num_rows === 0){
      //Verify password hash
      echo "No account by those credentials";
    }
    else{
      $accountInfoDisplay = $accountInfo->fetch_all(MYSQLI_ASSOC);
      var_dump($accountInfoDisplay);
      // echo "Email".$accountInfoDisplay['EMAIL'];
      // echo "ID".$accountInfoDisplay['USER_ID'];
      if(password_verify($inputtedPassword, $accountInfoDisplay[0]['PASSWORD']))
      {
        session_start();
        $_SESSION['email'] = $accountInfoDisplay[0]['EMAIL'];
        $_SESSION['userID'] = $accountInfoDisplay[0]['USER_ID'];
        echo "Credentials accepted";
        var_dump($_SESSION);
        header("Location: Home.php");
      }
      else{
        $errors['password'] = "Credentials do not match!";
      }
     

      
    }

    
  }

}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link   rel="stylesheet" href="Style/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <title>Recipe Treasures</title>
  </head>
  <body>

    <div class="bg-Image"></div>

    <div class="loginContainer">
    
        <div class="d-flex justify-content-center mb-3">
            <i class="fas fa-utensils mt-2"></i>
            <h4>RT</h4>
        </div>

        <h1 class="text-center text-white">Login</h1>
       
        <!-- Login Form -->
        <form action="Login.php" method="POST">
            <div class="mb-3">
                 <h4 class="text-white">Email</h4>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <h4 class="text-white">Password</h4>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <p>Dont't have an Account? <a href="Signup.php">Sign Up</a></p>
            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
        </form>
        <!--  -->
        <?php

          echo isset($errors['email']) ?  $errors['email'] : '';
          echo isset($errors['password']) ? $errors['password'] : '';


        ?>

    </div>


 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  </body>
</html>
