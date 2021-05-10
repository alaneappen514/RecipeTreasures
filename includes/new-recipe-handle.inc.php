<?php
    include_once "db/dbconnect.php";
    include_once "functions.inc.php";

    $errors = [];
    if (isset($_POST['new_recipe'])) {
        $recipe_title = sanitizeStr($_POST['recipe_title']);
        $ingredients = sanitizeStr($_POST['ingredients']);
        $recipe_desc = sanitizeStr($_POST['recipe_desc']);
        // session_start();
        // $user_id = $_SESSION['userID'];
        $user_id = 1;

        $checkQ = "SELECT Title, Ingredients, Description, User_ID ";
        $checkQ .= "FROM RECIPES WHERE Title = ? and Ingredients = ? and Description = ? and User_ID = ?";

        $stmt = $conn->prepare($checkQ);
        $stmt->bind_param("sssi", $recipe_title, $ingredients, $recipe_desc, $user_id);
        $stmt->execute();

        // $result = $stmt->get_result();
        // var_dump($result);

        if ($stmt->get_result()->num_rows > 0) {
            $errors["duplicate"] = "Recipe has already been made!";
        } else {
            $insertQ = "INSERT INTO RECIPES (Title, Ingredients, Description, User_ID) ";
            $insertQ .= "VALUES (?, ?, ?, ?)";

            $stmt2 = $conn->prepare($insertQ);
            $stmt2->bind_param("sssi", $recipe_title, $ingredients, $recipe_desc, $user_id);
            if (!$stmt2->execute()) {
                $errors["insert"] = "We have a problem creating your recipe";
            } else {
                echo "The recipe has been created";
            }
        }
    }
?>