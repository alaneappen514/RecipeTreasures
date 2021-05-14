<?php
  include "includes/new-comment.php";
  include "includes/get-comments.php";
  include "includes/handle-edit-recipe.php";
  // session_start();
  // var_dump($_POST);

  // }
  $arr = explode(',',$ingredients);
  // $recIDInt = (int)$recID, "\n";
  // var_dump($recIDInt);
  // var_dump((int)$recID);
  
  $userId = $_SESSION['userID']; 

  //$authorID = (int)$_GET['author_id'];
  // var_dump($authorID);
  //var_dump($_GET['author_id']);
  // var_dump($_GET);
  if($_GET == null) {
    $authorID = $_SESSION['author_id'];
  }
  else{
    $authorID = (int)$_GET['author_id'];
    $_SESSION['author_id'] = $_GET['author_id'];
  }
  var_dump($authorID);
  $sql = "SELECT user.Email FROM user INNER JOIN recipes ON user.User_ID = $authorID";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  $email = $result->fetch_all(MYSQLI_ASSOC);
  $authorName=$email[0]['Email'];
  var_dump($authorName);
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
    <link rel="stylesheet" href="Style/recipe.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
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
    <div class="jumbotron jumbotron-fluid"></div>
    <div class="container test shadow">
      <div class="RecipeHeader">
        <div class="d-flex justify-content-between">
          <div class="d-flex">
            <?php echo "<h1> $title </h1>";?>
          </div>

          <!-- UNCOMMENT THIS ONCE YOU FIGURE OUT HOW TO PUT IN THE USER ID FOR THE RECIPES-->
           <?php //Only show this edit button if they are the user that created it. 
            if($authorID == $userId)
              echo "<i id='EditRecipe' class='far fa-edit fa-2x' title='Edit Recipe'></i></a>"       
          ?>

        </div>  

        <div class="d-flex pt-2">
        <?php echo "<h6> By " .truncateEmail($authorName)."</h6>";?>
        </div>
      </div>

      <div class="RecipeContent">
        <div class="d-flex justify-content-center align-items-center my-4">
          <!-------------------- Image ------------------------------>
          <?php echo"<img src='$image' alt=RecipePicture class='img-fluid rounded'></img>"?>
          <!--------------------------------------------------------------->
        </div>
        <div class="row">
          <div class="col">
            <div class="ingredients my-5">
              <h2>Ingredients</h2>
              <hr class="dropdown-divider mt-3">
              <div class="my-5">
                <!-------------------- Ingredients ------------------------------>
                <div class="form-group">
                  <?php 
                    foreach($arr as $value){
                      echo"<div class='col-md-5 mt-2'>";
                      echo "<div class='checkbox d-flex'>";
                      echo   "<input class='mx-2' type='checkbox' name='packersOff' id='packers' value='1'/>";
                      echo "<label for='packers' class='strikethrough' style='font-size: 25px'>$value</label>";
                      echo   "</div>";
                      echo "</div>";
                    }
                  ?> 
                </div>
                <!-------------------------------------------------->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="description my-5">
              <h2 class="text-center ">Description</h2>
              <hr class="dropdown-divider mt-3">
              <!-------------------- Description ------------------------------>
              <div class="contentDescription mt-5 p-3">
                <?php echo "<p> $description </p>"?>
              </div> 
              <!----------------------------------------------------------->   
            </div>
            <div class="comments my-4">
              <form action="Recipe.php" method="POST">
                <h2 class="text-center ">Comments</h2>
                <hr class="dropdown-divider mt-3">
                <div class="mt-5">
                  <div class="input-group input-group-sm mb-3">
                    <input placeholder="Add a comment..." type="text" name="commentText" class="form-control inputTextbox" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <div class="d-flex justify-content-end SubmitBtn" id="commentSubmit">
                    <button id="cancelBtn" type="button" class="btn btn-secondary mx-2">Cancel</button>
                    <button id="commentBtn" type="submit" name="new_comment" class="btn btn-dark">Comment</button>
                  </div>
                </div>
              </form> 

              <div class="comment_container mt-3">
                <!------------ Comments --------------------------------------->
                <?php
                  if(isset($commentDisplay)) {
                    foreach($commentDisplay as $subArray)
                    {
                      echo "<div class='user_comment my-4'>";
                      echo "<h5>". truncateEmail($subArray['EMAIL']) ."</h5>";
                      echo "<p class='addReadMore showlesscontent position-relative'>". $subArray['Comment'];
                      echo "</p>";
                      echo "</div>";
                    }
                  }
                  else {
                    echo "<div class='user_comment my-4'>";
                    echo "<p class='addReadMore showlesscontent position-relative'> No Comments for this Recipe Yet!";
                    echo "</p>";
                    echo "</div>";
                  }
                ?>
                <!------------------------------------------------------------>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Editing Recipe View -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Recipe</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="Recipe.php" method="POST">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Title</label>
                <input type="text" name="newTitle" value="<?php echo $title ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Ingredients</label>
                <textarea class="form-control" name="newIng" id="message-text">
                <?php echo $ingredients ?>
                </textarea>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description</label>
                <textarea class="form-control" name="newDesc" id="message-text">
                <?php echo $description ?>
                </textarea>
              </div>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <div class="d-flex">
              <i class="fas fa-utensils mt-2 text-danger"></i>
              <h4 class="text-danger">RT</h4>
            </div>
            <button type="submit" name="new_edit_submit" class="btn btn-dark">Submit Recipe</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-------->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/recipe.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  </body>
</html>
