<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhaF (What the Food)</title>
    <link rel="stylesheet" href="../css/addRecipeStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
</head>
<body onresize="resize()">
    <div class="menu">
        <div class="left-menu">
            <a id="logo">L &#8287 O &#8287 G &#8287 O &#8287</a>
        
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a> 

            <div id="myLinks">
                <p><a href="userHomePage.php">Home</a></p>
                <p><a href="userRecipes.php">Recipes</a></p>
                <p><a href="userLeaderBoard.php">Leaderboard</a></p>
                <p class="active"><a href="userAddRecipe.php">Add a recipe</a></p>
            </div>
        </div>
        
        <div class="right-menu">
            <p><?php echo $_SESSION['userUid'];  ?></p>
            <p><a href="../php_files/logout.php">Logout</a></p>
        </div>
    </div>

    <hr>

    <div class="content">
        <p>Here you can add your own recipe. If you have a special dish you would like to share with the other food lovers we highly encourage you to do so. It's easy and fun. Let's celebrate good food together!</p>
        
        <form action="#">
            <label for="description">Description</label> <br>
            <textarea name="description" id="description" dirname="description.dir" placeholder="Type the recipe's description, steps and instructions"></textarea>
            
            <br>

             <label for="ingredients">Ingredients:</label> <br>
            
            <div class="table_container">
                <table class="_table">
                  <thead>
                    <tr>
                      <th>Name of the ingredient</th>
                      <th>Quantity</th>
                      <th>Unit of measurement</th>
                      <th width="50px">
                        <div class="action_container">
                          <div onclick="create_tr('table_body')">
                            <i class="fa fa-plus"></i>
                          </div>
                        </div>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="table_body">
                    <tr>
                      <td>
                        <input type="short_text" class="form_control">
                      </td>
                      <td>
                        <input type="short_text" class="form_control">
                      </td>
                      <td>
                        <input type="short_text" class="form_control">
                      </td>
                      <td>
                        <div class="action_container">
                          <button class="danger" onclick="remove_tr(this)">
                            <i class="fa fa-close"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <script src="../script.js"></script>

            <br>

            <label for="dificulty">Dificulty</label>
            <select name="dificulty" id="dificulty">
                <option value="low">low</option>
                <option value="medium">medium</option>
                <option value="high">high</option>
            </select>

            <br> <br>

            <label for="preparationTime">Preparation Time</label>
            <select name="preparationTime" id="preparationTime">
                <option value="time1">15 minutes</option>
                <option value="time1">20 minutes</option>
                <option value="time1">30 minutes</option>
                <option value="time1">45 minutes</option>
                <option value="time2">60 minutes</option>
                <option value="time3">90 minutes</option>
                <option value="time4">120 minutes</option>
            </select>

            <br> <br>

            <label for="uploadImage">Select image:</label>
            <input type="file" id="uploadImage" name="uploadImage" accept="image/*">

            <br>

            <input type="submit" value="Add recipe">
        </form>
    </div>

    <script>
        function myFunction() {
          var x = document.getElementById("myLinks");
          if (window.innerWidth <= 700) {
            if (x.style.display === "flex") {
            x.style.display = "none";
          } else {  
                x.style.display = "flex";
                x.style.flexDirection = "column";
            }
          }
        }

        function resize() {
            if(window.innerWidth > 700) {
                document.getElementById("myLinks").style.display="flex";
                document.getElementById("myLinks").style.flexDirection = "row";
            } else {
                document.getElementById("myLinks").style.display="none";
            }
        }
    </script>
        
</body>
</html>
