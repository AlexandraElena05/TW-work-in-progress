<?php include('../php_files/config.php');
 session_start();

    if(isset($_GET['id']))
    {
        //all the details
        $id = $_GET['id'];

        $sql2 = "SELECT * from recipes where id=$id";

        $res2 = mysqli_query($connection, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $name = $row2['name'];
        $description = $row2['description'];
        $prepTime = $row2['preparationTime'];
        $difficulty = $row2['difficulty'];
    }
    // else
    // {
    //     header('location: manageRecipes.php');
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhaF (What the Food)</title>
    <link rel="stylesheet" href="../css-admin/updateRecipes.css">
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
                <!-- <p><a href="userHomePage.php">Home</a></p>
                <p><a href="userRecipes.php">Recipes</a></p>
                <p class="active"><a href="userLeaderBoard.php">Leaderboard</a></p>
                <p><a href="userAddRecipe.php">Add a recipe</a></p> -->
            </div>
        </div>
        
        <div class="right-menu">
            <!-- <p><//?php echo $_SESSION['userUid'];  ?></p> -->
            <p><a href="../php_files/logout.php">Logout</a></p>
        </div>
    </div>

    <hr>

   <div class="content">
        <div class="search-container">
            <h1>Update recipe</h1>
            <br><br>

            <form action="#" method="POST">

                <table>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="text" name="name" placeholder="Recipe name..." value="<?php echo $name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" cols="40" rows="5" placeholder="Description..."><?php echo $description; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Preparation time: </td>
                        <td> 
                            <input type="text" name="preptime" placeholder="Preparation time..." value="<?php echo $prepTime; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Difficulty: </td>
                        <td>
                            <input type="text" name="difficulty" placeholder="Difficulty..." value="<?php echo $difficulty; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update recipe">
                        </td>
                    </tr>
                </table>
            
            </form>

            <?php
                // if ($_SERVER["REQUEST_METHOD"] == "POST")
                // {
                    if(!empty($_POST['submit']))
                    {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $description = $_POST['description'];
                        $prepTime = $_POST['preptime'];
                        $difficulty = $_POST['difficulty'];
                        //echo "clicked";
                    }
                // }
                 

                $sql3 = "UPDATE recipes SET 
                        name = '$name',
                        description = '$description',
                        preparationTime = '$prepTime',
                        difficulty = '$difficulty'
                        WHERE id = $id
                ";

                $res3 = mysqli_query($connection, $sql3);
                if($res3 == true)
                {
                    $_SESSION['update'] = "<div class='success'> Recipe updated successfully.</div>";
                    header('location: manageRecipes.php');
                }
                // else
                // {
                //     $_SESSION['update'] = "<div class='error'> Failed to update recipe.</div>";
                //     header('location: manageRecipes.php');
                // }

            ?>

        </div>
   
   </div>
</body>
</html>