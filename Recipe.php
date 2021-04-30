<?php
$ingredients = array("chicken breasts","buttermilk","flour", "corn starch", "spices","brioche buns"); //Ingredients must be split into this format//

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
    <link   rel="stylesheet" href="Style/recipe.css">
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

  <div class="jumbotron jumbotron-fluid">
    </div>

    <div class="container test shadow">

        <div class="RecipeHeader">
            <div class="d-flex justify-content-between">
              <div  class="d-flex">
              <h1>Chicken Sandwich</h1>
              <!-------------------- Like ------------------------------>
              <i class="far fa-thumbs-up fa-2x mt-2 mx-3"></i>
              <!--------------------------------------------------->
              <h3 class="bg-dark text-white rounded px-2 py-1">157</h3> <!---Like Value -->
              </div>
             <i id="EditRecipe" class="far fa-edit fa-2x" title="Edit Recipe"></i></a>
            </div>  

            <div class="d-flex pt-2">
              <h6>By Alan Eappen</h6>
              <h6 class="mx-2">Feb. 24 2021</h6>
            </div>
        </div>

        <div class="RecipeContent">

        <div class="d-flex justify-content-center align-items-center my-4">
        <!-------------------- Image ------------------------------>
        <img src="Style/Images/bgImage.jpg" alt=RecipePicture class="img-fluid rounded"></img>
        <!--------------------------------------------------------------->
        </div>

              <div class="row">

              <div class="col">
                  <div class="ingredients my-5">
                    <h2>Ingredients</h2>
                    <hr class="dropdown-divider mt-3">
                      <div class="my-5">
                      <!-------------------- Ingredients ------------------------------>
                      <div class="form-group ">
                          <?php 
                          foreach($ingredients as $value){
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
                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin 
                            literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College 
                            in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through 
                            the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                            written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. 
                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                              exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                      </div> 
                       <!----------------------------------------------------------->   
                    </div>

                  <div class="comments my-4">
                        <h2 class="text-center ">Comments</h2>
                        <hr class="dropdown-divider mt-3">
                        <div class="mt-5 ">

                            <div class="input-group input-group-sm mb-3">
                            <input placeholder="Add a comment..." type="text" class="form-control inputTextbox" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>

                            <div class=" d-flex justify-content-end SubmitBtn" id="commentSubmit">
                            <button id="cancelBtn" type="button" class="btn btn-secondary mx-2">Cancel</button>
                            <button id="commentBtn" type="button" class="btn btn-dark">Comment</button>
                            </div>

                            <div class="comment_container mt-3">
                              <!------------ Comments --------------------------------------->
                                <div class="user_comment my-4">
                                    <h5>Alan Eappen</h5>
                                    <p class="addReadMore showlesscontent position-relative"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                      when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into e
                                      lectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                      and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="user_comment my-4">
                                    <h5>Alan Eappen</h5>
                                    <p class="addReadMore showlesscontent"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                      when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into e
                                      lectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                      and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="user_comment my-4">
                                    <h5>Alan Eappen</h5>
                                    <p class="addReadMore showlesscontent"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has </p>
                                </div>

                                <div class="user_comment my-4">
                                    <h5>Alan Eappen</h5>
                                    <p class="addReadMore showlesscontent"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has </p>
                                </div>
                                <div class="user_comment my-4">
                                    <h5>Alan Eappen</h5>
                                    <p class="addReadMore showlesscontent"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                      when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into e
                                      lectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                      and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="user_comment my-4">
                                    <h5>Alan Eappen</h5>
                                    <p class="addReadMore showlesscontent"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                      when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into e
                                      lectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                      and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <!------------------------------------------------------------>
                            <div>
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
    <script src="js/recipe.js"><script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  </body>
</html>
