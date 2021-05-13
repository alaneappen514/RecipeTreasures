<?php
    include_once "db/dbconnect.php";
    include_once "functions.inc.php";

    // var_dump($_POST);
    
    if ($_GET == null) {
        $recID = (int)$_SESSION['recipe_id'];

    }
    else{
        $recID = (int)$_GET['recipe_id'];
        //something else is getting this which is good
        // $_SESSION['recipe_id'] = $_GET['recipe_id'];
    }

    // var_dump($recID);

    if (isset($_POST['new_edit_submit'])) {
        $newTitle = sanitizeStr($_POST['newTitle']);
        $newIng = sanitizeStr($_POST['newIng']);
        $newDesc = sanitizeStr($_POST['newDesc']);
        $userId = $_SESSION['userID']; 

        //CHANGES won't load after submission, have to reenter page to see them this was the idea though:
        // //After input/form process, also update the $_GET array variables for title, description, and ingredients. 
        // //In the new comment section, this will update the $_SESSION array variables
        // $_GET['recipe_title'] = $newTitle;
        // $_GET['recipe_ing'] = $newIng;
        // $_GET['recipe_desc'] = $newDesc;
        
        $editRecipeQuery = "UPDATE RECIPES ";
        $editRecipeQuery .= "SET Title = ?, Ingredients= ?, Description = ?";
        $editRecipeQuery .= " WHERE Recipe_ID = ?";

        $stmt = $conn->prepare($editRecipeQuery);
        $stmt->bind_param("sssi", $newTitle, $newIng, $newDesc, $recID);

        $stmt->execute();

        //Go back to the home to load the changes
        header("Location: Home.php");

        // var_dump($newTitle);
        // var_dump($newIng);
        // var_dump($newDesc);
        // var_dump($userId);

    }
?>