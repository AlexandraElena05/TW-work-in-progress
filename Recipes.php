<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhaF (What the Food)</title>
    <link rel="stylesheet" href="css/recipeStyle.css">
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
                <p class="active"><a href="Recipes.php">Recipes</a></p>
                <p><a href="LeaderBoard.html">Leaderboard</a></p>
            </div>
        </div>
        
        <div class="right-menu">
            <p><a href="login.html">Login</a></p>
            <p id="register"><a href="register.html">Register</a></p>
        </div>
    </div>

    <hr>

    <div class="content">
        <p>Here you can search for a specific recipe or you can even look for recipes that have your preferred ingredients. There are some other filters that you might like to try. Happy cooking!</p>

        <div class="search-container">
            <form action="php_files/food-search-recipes.php" method="POST" role="search" class="search">
                <input type="text" name="search" class="search-item" placeholder="Search for a recipe">
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <p>Filters:</p>
        
        <form action="#" class="sortForm">
            <div class="ingredients">
                <div class="likes">
                    <label for="iHave">I like / I have</label> <br>
                    <input type="text" id="iHave" name="iHave" placeholder="Ingredient...">
                </div> <br>
                <div class="dislikes">
                    <label for="iDontLike">I don't like</label> <br>
                    <input type="text" id="iHave" name="iHave" placeholder="Ingredient...">
                </div>
            </div>

            <div class="filters">
                <select name="dificulty" id="dificulty" onchange="filterByDifficultyUserNotLogged(this.value)">
                    <option value="" disabled selected hidden>Dificulty</option>
                    <option value="low">low</option>
                    <option value="medium">medium</option>
                    <option value="high">high</option>
                </select>

                <select name="preparationTime" id="preparationTime" onchange="filterByPrepTimeUserNotLogged(this.value)">
                    <option value="" disabled selected hidden>Preparation Time</option>
                    <option value="20">20 minutes</option>
                    <option value="30">30 minutes</option>
                    <option value="45">45 minutes</option>
                    <option value="60">60 minutes</option>
                    <option value="90">90 minutes</option>
                    <option value="120">120 minutes</option>
                    <option value="180">180 minutes</option>
                </select>
            </div>
        </form>

        <form action="/#" class="orderByForm">
            <label class="orderByLabel" for="ordering">Order by</label>
            <select name="ordering" id="ordering" onchange="orderRecipesNoUserLogged(this.value)">
                <option value="" disabled selected hidden>Order by...</option>
                <option value="popularity">Popularity</option>
                <option value="preparationTime">Preparation Time</option>
                <option value="difficultyNumber">Dificulty (low to high)</option>
                <!-- <option value="val1">Dificulty (high to low)</option> -->
            </select>
        </form>  

        <div class="recipes-feed" id="recipesPlace">
            <?php include('php_files/config.php');

                $result = mysqli_query($connection, "SELECT * FROM recipes;") or die(mysqli_error($connection));
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="image-container">
                        <a href="recipeDetails.php?name=' . $row['name'] . '" target="_blank">
                            <img src="img/' . $row['image'] . '">
                            <h4>' . $row['name'] . '</h4>
                            <span class="difficulty">' . $row['difficulty'] . '</span>
                            <span class="time">' . $row['preparationTime'] . 'min</span>
                            <span class="appreciations"><i class="fa fa-heart-o"></i></span>
                            <span>(0)</span>
                        </a>
                    </div>';
                }
            ?>
            
        </div>
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

        function filterByDifficultyUserNotLogged(str) {
        if (str == "") {
            document.getElementById("recipesPlace").innerHTML = "";
            return;
            } else {
            var xmlhttp = new XMLHttpRequest();
            console.log(str);
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("recipesPlace").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","filterRecipesUserNotLogged.php?q="+str,true);
            xmlhttp.send();
            }
        }

        function filterByPrepTimeUserNotLogged(str) {
        if (str == "") {
            document.getElementById("recipesPlace").innerHTML = "";
            return;
            } else {
            var xmlhttp = new XMLHttpRequest();
            console.log(str);
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("recipesPlace").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","filterByPrepTimeUserNotLogged.php?q="+str,true);
            xmlhttp.send();
            }
        }
    </script>

    <script src="src/sort.js"></script>
        
</body>
</html>