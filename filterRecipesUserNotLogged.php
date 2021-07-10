<?php 

    include('php_files/config.php');

    $q = $_GET['q'];
    $sql = "SELECT * FROM recipes WHERE difficulty='$q'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

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