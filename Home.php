<?php
    include "db/dbconnect.php";
    include "includes/new-recipe-handle.inc.php";
    include "includes/retrieve_recipe.php";

    session_start();
    var_dump($_SESSION);
    // if (!isset($SESSION["id"])) {
    //     header("Location: Login.php");
    // }
?>

<?php
// include_once "db/dbconnect.php";
// $query1 = "SELECT * ";
// $query1 .= "FROM USER ";
// $stmt = $conn->prepare($query1);
// $stmt->execute();
// $result = $stmt->get_result();
//
// if ($result->num_rows === 0) echo "No Rows";
// $customers = $result->fetch_all(MYSQLI_ASSOC);
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
    <link rel="stylesheet" href="Style/home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Brush+Script&display=swap" rel="stylesheet">
    <title>Recipe Treasures</title>
  </head>
  <body>
  <!-- NavBar-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="d-flex">
                <i class="fas fa-utensils fa-2x text-danger"></i>
                <a class="text-decoration-none"href="Home.php"><h2 class=" mx-2 text-danger">RT</h2></a>
            </div>
            <div class="float-right ">
                <button class="navbar-toggler float-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Signout</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-------->

    <div class="jumbotron jumbotron-fluid  d-flex justify-content-center align-items-center">
        <div class="bannertextContainer rounded-pill p-3">
            <h1 class="bannertext">Recipe Treasures</h1>
        </div>
    </div>
    
    <div class="container">
<<<<<<< HEAD
    <?php echo "<h3 class='text-center p-3 text-white bg-dark'> Welcome " .truncateEmail($_SESSION['email'])."</h3>" ;?>
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h1 class="text-center">Recipes</h1>
        <i id="AddRecipe" class="fas fa-plus-circle fa-3x" title="Create Recipe"></i>
      </div>

      <hr class="dropdown-divider mt-4">

      <div class="recipeContainer p-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">

        <!-- This is where we gonna map all the recipes to view them -->
        <?php 
        foreach($recipes as $recipe): ?>
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0 shadow border-0">
                        <div class="col-xl-4">
                        <img class="card_image" src=<?=$recipe['PHOTO']?> alt="...">
                        </div>
                        <div class="col-xl-8">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-xl-end ">
                            <h5 class="card-title"><?=$recipe['Title']?></h5>
                            <br><br><br><br><br><br>
                            <div class="d-flex mt-2">
                            <div class="test1">
                                    <?php 
                                        $sql = " SELECT * FROM likes WHERE User_ID=".$_SESSION['userID']." AND Recipe_ID=".$recipe['Recipe_ID']."";
                                        $stmt = $conn->prepare($sql);
                                        $stmt -> execute();
                                        $result = $stmt->get_result();
                                        if($result->num_rows == 1) { ?>
                                            <i class="fas fa-thumbs-up fa-2x unlike" data-id="[<?php echo $recipe['Recipe_ID']; ?>,<?php echo $_SESSION['userID']; ?>]"></i>
                                            <i class="far fa-thumbs-up fa-2x like d-none" data-id="[<?php echo $recipe['Recipe_ID']; ?>,<?php echo $_SESSION['userID']; ?>]"></i>
                                        <?php } else { ?>
                                            <i class="far fa-thumbs-up fa-2x like" data-id="[<?php echo $recipe['Recipe_ID']; ?>,<?php echo $_SESSION['userID']; ?>]"></i>
                                            <i class="fas fa-thumbs-up fa-2x unlike d-none" data-id="[<?php echo $recipe['Recipe_ID']; ?>,<?php echo $_SESSION['userID']; ?>]"></i>
                                        <?php } ?>
                                        <span class="likes_count"><?php echo $recipe['Likes']; ?></span>
                                </div>
                                <!-------------------- View/Delete  ------------------------------>
                                <?php
                                echo '<a href="Recipe.php?recipe_title='.$recipe['Title']. '&recipe_ing='.$recipe['Ingredients'].'&recipe_desc='.$recipe['Description'].'&recipe_img='.$recipe['PHOTO'].'&recipe_id='.$recipe['Recipe_ID'].'&likes='.$recipe['Likes'].'" class="text-dark" data-bs-toggle="tooltip" data-placement="bottom"  title="View"> <i class="far fa-eye fa-2x  mx-3"></i></a>';
                                //'&recipe_id='.$recipe['Recipe_ID']'
                                ?>
                                <a href="#" class="text-dark" data-bs-toggle="tooltip" data-placement="bottom"  title="Delete"> <i class="far fa-trash-alt fa-2x"></i></a>
                                <!---------------------------------------------------------------------->
                             </div>
=======
        <?php echo "I am " .$_SESSION['email']. ' '.$_SESSION['userID'] ;?>
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h1 class="text-center">Recipes</h1>
            <i id="AddRecipe" class="fas fa-plus-circle fa-3x" title="Create Recipe"></i>
        </div>
        <hr class="dropdown-divider mt-4">
        <div class="recipeContainer p-5">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- This is where we gonna map all the recipes to view them -->
                <?php 
                    var_dump($recipes);
                    foreach($recipes as $recipe): 
                ?>
                <div class="col">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-xl-4">
                                <img class="card_image" src=<?=$recipe['PHOTO']?> alt="...">
                            </div>
                            <div class="col-xl-8">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-xl-end">
                                        <h5 class="card-title"><?=$recipe['Title']?></h5>
                                        <br><br><br><br><br><br>
                                        <div class="d-flex mt-2">
                                            <!-------------------- View/Delete  ------------------------------>
                                            <?php
                                                echo '<a href="Recipe.php?recipe_title='.$recipe['Title']. '&recipe_ing='.$recipe['Ingredients'].'&recipe_desc='.$recipe['Description'].'&recipe_img='.$recipe['PHOTO'].'&recipe_id='.$recipe['Recipe_ID'].'" class="text-dark" data-bs-toggle="tooltip" data-placement="bottom"  title="View"> <i class="far fa-eye fa-2x  mx-3"></i></a>';
                                                //'&recipe_id='.$recipe['Recipe_ID']'
                                            ?>
                                            <a href="#" class="text-dark" data-bs-toggle="tooltip" data-placement="bottom"  title="Delete"> <i class="far fa-trash-alt fa-2x"></i></a>
                                            <!---------------------------------------------------------------------->
                                        </div>
                                    </div>
                                </div>
>>>>>>> c4d983298a797c04d8a0180d6d4b506b1f56c2d6
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-------->
            </div>
        <div>
    </div>

    <!-- Creating New Recipe View -->
    <?php
        if (!empty($errors)) {
            echo "<ul>";
            foreach ($errors as $e) {
                echo "<li>$e</li>";
            }
            echo "</ul>";
        }
    ?>
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="Home.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="recipe_title" id="recipient-name" value="<?php echo $recipe_title ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                            <label for="message-text" class="col-form-label">Ingredients</label>
                            <label for="message-text" class="col-form-label">(Put a comma after each Ingredient)</label>
                            </div>
                            <textarea class="form-control" name="ingredients" id="message-text" value="<?php echo $ingredients ?? ''; ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description </label>
                            <textarea class="form-control" name="recipe_desc" id="message-text-2 value="<?php echo $recipe_desc ?? ''; ?>""></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label for="photo" class="col-form-label">Upload Image</label><br>
                            <input type="file" name="photo" id="photo" value=""/>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div class="d-flex">
                            <i class="fas fa-utensils mt-2 text-danger"></i>
                            <h4 class="text-danger">RT</h4>
                        </div>
                        <input type="submit" class="btn btn-dark" name="new_recipe" value="Submit Recipe">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-------->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  </body>
</html>
