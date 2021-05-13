<?php
     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

     try{
     define("DOMAIN", "localhost");
     define("USERNAME", "root");
     define("PWD", "");
     define("DATABASE", "recipe_treasures");
     
     
     $conn = new mysqli(DOMAIN, USERNAME, PWD, DATABASE);
     
     $conn->set_charset("utf8mb4");
     } catch(Exception $e){
         error_log($e->getMessage());
         var_dump($e);
         exit("Error connecting to db");
     }

     if (isset($_POST['liked'])) {
         //get the likes value from recipe
        $recipeID = $_POST['Recipe_ID'];
        $userID =   $_POST['User_ID'];
		$result = "SELECT * FROM recipes WHERE Recipe_ID=$recipeID";
        $stmt = $conn->prepare($result);
        $stmt->execute();
        $row = $stmt->get_result();
        $recipes = $row->fetch_all(MYSQLI_ASSOC); 
        $n = $recipes[0]['Likes'];


        //insert the record for likes table
		$insertQ = "INSERT INTO likes (User_ID, Recipe_ID) VALUES ($userID, $recipeID)";
        $stmt2 = $conn->prepare($insertQ);
        $stmt2 ->execute();

        //update the likes value from recipe
		$updateQ = "UPDATE recipes SET Likes=$n+1 WHERE Recipe_ID=$recipeID";
        $stmt3 = $conn->prepare($updateQ);
        $stmt3 ->execute();

        echo $n+1;
		exit();
	}
	if (isset($_POST['unliked'])) {
        //get the the likes value from recipe
        $recipeID = $_POST['Recipe_ID'];
        $userID =   $_POST['User_ID'];
		$result2 = "SELECT * FROM recipes WHERE Recipe_ID=$recipeID";
        $stmt4 = $conn->prepare($result2);
        $stmt4->execute();
        $row2 = $stmt4->get_result();
        $recipes2 = $row2->fetch_all(MYSQLI_ASSOC);
        $n2 = $recipes2[0]['Likes'];
 

        //delete the record for likes table
		$deleteQ = "DELETE FROM likes WHERE Recipe_ID=$recipeID AND User_ID=$userID";
        $stmt5 = $conn->prepare($deleteQ);
        $stmt5 ->execute();

        //update the likes value from recipe
		$updateQ2 = "UPDATE recipes SET Likes=$n2-1 WHERE Recipe_ID=$recipeID";
        $stmt6 = $conn->prepare($updateQ2);
        $stmt6 ->execute();

        echo $n2-1;
		exit();
	}

?>
