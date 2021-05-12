<?php
    include_once "db/dbconnect.php";

    $sql = "SELECT * FROM RECIPES";
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) 
        echo("NO ROWS");
    $recipes = $result->fetch_all(MYSQLI_ASSOC);
?>
