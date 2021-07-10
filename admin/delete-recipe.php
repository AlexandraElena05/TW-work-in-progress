<?php include('../php_files/config.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM recipes WHERE id=$id";    
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $_SESSION['message'] = "Recipe has been deleted!";
        $_SESSION['msg_type'] = "danger";

        echo "<script>
            alert('Recipe has been deleted!');
            window.location.href='manageRecipes.php';
        </script>";  
    }

?>