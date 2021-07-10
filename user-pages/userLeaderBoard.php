<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhaF (What the Food)</title>
    <link rel="stylesheet" href="../css/leaderBoardStyle.css">
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
                <p class="active"><a href="userLeaderBoard.php">Leaderboard</a></p>
                <p><a href="userAddRecipe.php">Add a recipe</a></p>
            </div>
        </div>
        
        <div class="right-menu">
            <p><?php echo $_SESSION['userUid'];  ?></p>
            <p><a href="../php_files/logout.php">Logout</a></p>
        </div>
    </div>

    <hr>

    <div class="content">
        <p>We created a leaderboard with the most popular recipes, one with the most popular ingredients and one with the most frequently avoided ingredients. You can download any leaderboard from here in any format you want:</p>
        
        <div class="leaderboards">
            <button id="exportHTML" onclick="exportHTML()"> Most popular recipes (HTML format)</button>
            <button id="exportCSV" onclick="exportCSV()"> Most popular ingredients (CSV format)</button>
            <button id="exportJSON" onclick="exportJSON()"> Frequently avoided ingredients (JSON format)</button>
        </div>
        
        <div class="search-and-image">
            <div>
                <p>Or . . . you can always search for a new recipe</p>
    
                <div class="search-container">
                    <form action="/action_page.php" method="post" role="search" class="search">
                        <input type="text" name="search" class="search-item" placeholder="Search for a recipe">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            
            <img src="../img/deliciously-dressed-smoothie-bowl-with-berries.jpg" alt="smoothie-bowl" id="smoothie">
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
    </script>
        
</body>
</html>