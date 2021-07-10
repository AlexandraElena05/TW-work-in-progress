<?php include('../php_files/config.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";    
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if($result == true) {
            $_SESSION['message'] = "User has been deleted!";
            $_SESSION['msg_type'] = "danger";
    
            echo "<script>
                alert('User has been deleted!');
                window.location.href='adminDashboard.php';
            </script>";  
        } else {
            header("Location: adminDashboard.php?delete=failedToDelete");
        }
       
    }

?>