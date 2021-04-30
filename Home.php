<?php

include_once "db/dbconnect.php";

$query1 = "SELECT * ";
  $query1 .= "FROM USER ";

  $stmt = $conn->prepare($query1);

  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows === 0)
    echo "No Rows";

  $customers = $result->fetch_all(MYSQLI_ASSOC);
         

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
    <link   rel="stylesheet" href="Style/home.css">
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
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h1 class="text-center">Recipes</h1>
        <i id="AddRecipe" class="fas fa-plus-circle fa-3x" title="Create Recipe"></i>
      </div>

      <hr class="dropdown-divider mt-4">

      <div class="recipeContainer p-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">

        <!-- This is where we gonna map all the recipes to view them -->
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="..." alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-end">
                            <!-------------------- View/Delete  ------------------------------>
                            <a href="Recipe.php" class="text-dark" data-bs-toggle="tooltip" data-placement="bottom"  title="View"> <i class="far fa-eye fa-2x mx-3"></i></a>
                            <a href="#" class="text-dark" data-bs-toggle="tooltip" data-placement="bottom"  title="Delete"> <i class="far fa-trash-alt fa-2x "></i></a>
                            <!---------------------------------------------------------------------->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
         <!-------->
         
        
        </div>
      <div>
    </div>

    <!-- Creating New Recipe View -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Recipe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Title</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Ingredients</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div class="d-flex">
                <i class="fas fa-utensils mt-2 text-danger"></i>
                <h4 class="text-danger">RT</h4>
                </div>
                <button type="button" class="btn btn-dark">Submit Recipe</button>
            </div>
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
