<?php
    include_once "db/dbconnect.php";
    include_once "Recipe.php";
    include_once "functions.inc.php";
    session_start();

    if($_GET == null){
    // echo "Get array isnt set";
    //If get array is null, reset local values to what was stored in the session array
      $title = $_SESSION['recipe_title'];
      $ingredients =  $_SESSION['recipe_ing'];
      $description = $_SESSION['recipe_desc'];
      $image =  $_SESSION['recipe_img'];
      $recID = $_SESSION['recipe_id'];
    
    }
    else{
      // var_dump($_GET);
      $title = $_GET['recipe_title'];
      $ingredients = $_GET['recipe_ing'];
      $description = $_GET['recipe_desc'];
      $image = $_GET['recipe_img'];
      $recID = $_GET['recipe_id'];
    
      //have to store these vars in session upon page refresh (setting new comments)
      $_SESSION['recipe_title'] = $_GET['recipe_title'];
      $_SESSION['recipe_ing'] = $_GET['recipe_ing'];
      $_SESSION['recipe_desc'] = $_GET['recipe_desc'];
      $_SESSION['recipe_img'] = $_GET['recipe_img'];
      $_SESSION['recipe_id'] = $_GET['recipe_id'];
    
    }


    if(isset($_POST['commentText']))
    {
        var_dump($_POST['commentText']);
        $userId = $_SESSION['userID']; 
        var_dump($userId);
        $recIDInt = (int)$recID;
        var_dump($recIDInt);

    // //Make query to comments table of database, storing the text, user_id of author (current logged in),recipe_id
    $inputtedComment = sanitizeStr($_POST['commentText']);

    $newCommentQuery = "INSERT INTO comments (Comment , User_ID, Recipe_ID)";
    $newCommentQuery .= "VALUES (? , ?, ?)";

    // mysqli_query($conn, $signupQuery);
    $stmt = $conn->prepare($newCommentQuery);
    $stmt->bind_param("sii", $inputtedComment, $userId, $recIDInt);
    // $newCommentQuery .= "WHERE Email = ? AND Password = ?";
    // $newCommentQuery .= "WHERE Email = ?";

    // $stmt = $conn->prepare($newCommentQuery);
    // // $stmt->bind_param("ss", $inputtedEmail, $inputtedPassword);
    // $stmt->bind_param("s", $inputtedEmail);
    $stmt->execute();

    }

    

    

?>