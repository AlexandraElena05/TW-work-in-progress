<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhaF (What the Food)</title>
    <link rel="stylesheet" href="../css-admin/users.css">
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
                <p><a href="adminDashboard.php">Users</a></p>
                <p class="active"><a href="manageRecipes.php">Recipes</a></p>
                <!-- <p><a href="LeaderBoard.html">Leaderboard</a></p> -->
            </div>
        </div>
        
        <div class="right-menu">
            <p>Hi <?php echo $_SESSION['userUid'];  ?></p>
            <p><a href="../index.html">Logout</a></p>
        </div>
    </div>

    <hr>

    <div class="content">
        <h1>Manage Recipes</h1>

        <table class="users-table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>

            <?php include('../php_files/config.php');

                $result = mysqli_query($connection, "SELECT * FROM recipes;") or die(mysqli_error($connection));
                $nrRows = 1;

                while($row = mysqli_fetch_array($result)) {
                    $id = $row["id"];
                    $recipename = $row["name"];

                    ?>
 
                    <tr>
                        <td><?php echo $nrRows++; ?></td>
                        <td><?php echo $recipename; ?></td>
                        
                        <td>
                            <a href="http://localhost/what-food/admin/update-recipe.php?id=<?php echo $id; ?>" id="update-user">Update Recipe</a>
                            <a href="http://localhost/what-food/admin/delete-recipe.php?id=<?php echo $id; ?>" id="delete-user">Delete Recipe</a>
                        </td>
                    </tr>

                    
                    <?php
                }
            ?>
        </table>
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