<?php
    include_once "db/dbconnect.php";
    include_once "functions.inc.php";

    if (isset($_POST['new_recipe'])) {
        var_dump($_FILES["photo"]);
        if( isset($_FILES["photo"]["type"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK){
            $target_dir = "photos/";
            $target_file = $target_dir.basename($_FILES["photo"]["name"]);
            // echo "<br><br>".$target_file."<br>";

            $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
            // echo "Extension: $file_type<br>";
            $accepted = array("jpg","JPG", "png", "gif");
            if(!in_array($file_type, $accepted)){
                echo "Images only";
            }
            else if(!move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))
            {
                echo "There was a problem uploading that photo".$_FILES["photo"]["error"];
            }else{
                $errors = [];
                $recipe_title = sanitizeStr($_POST['recipe_title']);
                $ingredients = sanitizeStr($_POST['ingredients']);
                $recipe_desc = sanitizeStr($_POST['recipe_desc']);
                // session_start();
                // $user_id = $_SESSION['userID'];
                $user_id = 3;
        
                $checkQ = "SELECT Title, Ingredients, Description, User_ID ";
                $checkQ .= "FROM RECIPES WHERE Title = ? and Ingredients = ? and Description = ?  and PHOTO = ? and User_ID = ?";
        
                $stmt = $conn->prepare($checkQ);
                $stmt->bind_param("ssssi", $recipe_title, $ingredients, $recipe_desc, $target_file, $user_id);
                $stmt->execute();
        
                // $result = $stmt->get_result();
                // var_dump($result);
        
                if ($stmt->get_result()->num_rows > 0) {
                    $errors["duplicate"] = "Recipe has already been made!";
                } else {
                    $insertQ = "INSERT INTO RECIPES (Title, Ingredients, Description, PHOTO, User_ID) ";
                    $insertQ .= "VALUES (?, ?, ?, ?, ?)";
        
                    $stmt2 = $conn->prepare($insertQ);
                    $stmt2->bind_param("ssssi", $recipe_title, $ingredients, $recipe_desc, $target_file, $user_id);
                    if (!$stmt2->execute()) {
                        $errors["insert"] = "We have a problem creating your recipe";
                    } else {
                        echo "The recipe has been created";
                    }
                }
            }
        }
        else{
            //checking errors
            switch($_FILES["photo"]["error"]){
                case UPLOAD_ERR_NO_FILE:
                    $message = "No image was uploaded. Make sure to upload an image";
                    break;
                default:
                    $message = "Server Issue";
            }
            echo "There was a problem uploading your Image. ".$message;
        }

    }
?>
