<?php  include("config.php");

    $search = $_POST['search'];

    $sql = "SELECT * FROM recipes WHERE name='$search'";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $count = mysqli_num_rows($result);
    if($count > 0) {
        if($row = mysqli_fetch_array($result)) {
            header("Location: ../recipeDetails.php?name=" . $row['name']);
        }
        
    } else {
        echo "<script>
                alert('Oopsie, no such recipe');
                window.location.href='../Recipes.php';
            </script>";  
    }

?>