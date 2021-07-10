<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhaF (What the Food)</title>
    <link rel="stylesheet" href="css/recipeDetailsStyle.css">
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
                <p><a href="index.html">Home</a></p>
                <p><a href="Recipes.php">Recipes</a></p>
                <p><a href="LeaderBoard.html">Leaderboard</a></p>
            </div>
        </div>
        
        <div class="right-menu">
            <p><a href="login.html">Login</a></p>
            <p id="register"><a href="#">Register</a></p>
        </div>
    </div>

    <hr>

    <div class="content">
        <?php include('php_files/config.php');
            $pageName = $_GET['name'];
            echo '<h1>' . $pageName . '</h1>' .
                '<div class="recipe"> 
                    <div class="instructions">
                        <h3>Directions</h3>
            
                        <ol>';

            $result = mysqli_query($connection, "SELECT rs.stepDescription, rs.step FROM recipessteps rs JOIN 
                                    recipes r ON rs.recipeId = r.id WHERE r.name='$pageName' ORDER BY rs.step;") or die(mysqli_error($connection));
            while($row = mysqli_fetch_array($result)) {
                echo '<li>' . $row['stepDescription'] . '</li>';
            }
        
            //get ingredients
            $ingredients = mysqli_query($connection, "SELECT ri.amount, i.unit, i.name FROM ingredients i JOIN 
                            recipesingredients ri ON i.id = ri.idIngredient Join recipes r on ri.idRecipe = r.id 
                            WHERE r.name='$pageName' ORDER BY i.id;") or die(mysqli_error($connection));
            echo '</ol>
            <h3>Ingredients</h3>
            <ul>';
            while($row = mysqli_fetch_array($ingredients)) {
                echo '<li>' . $row['amount'] . ' ' . $row['unit'] . ' ' . $row['name'] . '</li>';
            }
            echo '</ul>';

            //get preparationTime, difficulty and image
            $time = mysqli_query($connection, "SELECT preparationTime, image, difficulty FROM recipes WHERE name='$pageName';") or die(mysqli_error($connection));
            while($row = mysqli_fetch_array($time)) {
                $preparationTime = $row['preparationTime'];
                $difficulty = $row['difficulty'];
                $image = $row['image'];
            }
            echo '<h3 style="display: inline;">Total time: </h3> 
                        <span>&#8287 ' . $preparationTime . ' min</span> 
                        
                        <br> <br>

                        <h3 style="display: inline;">Dificulty: </h3> 
                        <span>&#8287 ' . $difficulty . '</span>
                    </div>
            
                    <div class="image">
                        <img src="img/' . $image . '" alt="' . $pageName . '">
                    </div>
                </div>';
        ?>    
        
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