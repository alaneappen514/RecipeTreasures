<?php        
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        define("domain", "localhost");
        define("username", "root");
        define("pwd", "");
        define("database", "recipe_treasures");
        
        $conn = new mysqli(domain, username, pwd, database);
        
        $conn->set_charset("utf8mb4");
    } catch(Exception $e){
        error_log($e->getMessage());
        var_dump($e);
        exit("Error connecting to db");
    }

    if (isset($_POST['delete_recipe'])) {
        $recipe_ID = $_POST['Recipe_ID'];

        $deleteQL = "DELETE FROM likes  WHERE Recipe_ID = ?";

        $stmtL = $conn->prepare($deleteQL);
        $stmtL->bind_param("i", $recipe_ID);
        $stmtL->execute();

        $deleteQC = "DELETE FROM comments WHERE Recipe_ID = ?";

        $stmtC = $conn->prepare($deleteQC);
        $stmtC->bind_param("i", $recipe_ID);
        $stmtC->execute();

        $deleteQ = "DELETE FROM RECIPES WHERE Recipe_ID = ?";

        $stmt = $conn->prepare($deleteQ);
        $stmt->bind_param("i", $recipe_ID);
        $stmt->execute();
    }
?>
