<?php
    include_once "db/dbconnect.php";

    $recID = $_SESSION['recipe_id'];
    $recIDINT = (int)$recID;

    // echo "In get-Comments, check rec_ID: ". $recIDINT;
    // Retrieve comments from the comment table, query has to be based on the recipe_id you are on.
    // $inputtedEmail = validateStr($_POST['email']);
    // $inputtedPassword = validateStr($_POST['password']);

    // Select needs to return the email of the user, and the comment text
    $getCommentsQuery = "SELECT u.EMAIL, c.Comment ";
    $getCommentsQuery .= "FROM COMMENTS AS c, USER AS u ";
    $getCommentsQuery .= "WHERE c.User_ID = u.User_ID AND c.Recipe_ID = ?";
    // $getCommentsQuery .= "WHERE Email = ?";

    $stmt = $conn->prepare($getCommentsQuery);
    // $stmt->bind_param("ss", $inputtedEmail, $inputtedPassword);
    $stmt->bind_param("i", $recIDINT);
    $stmt->execute();

    $commentQueryResult = $stmt->get_result();

    // Check if theres something that was returned
    if ($commentQueryResult->num_rows === 0) {
      // Verify password hash
      echo "No Comments for this Recipe!";
    }
    else {
      $commentDisplay = $commentQueryResult->fetch_all(MYSQLI_ASSOC);
      // echo "Email".$accountInfoDisplay['EMAIL'];
      // echo "ID".$accountInfoDisplay['USER_ID'];
    }
    // }
?>