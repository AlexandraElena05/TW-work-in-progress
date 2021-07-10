<?php include('config.php');

if (isset($_POST['login'])) {

    $mail = $_POST['email'];
    $password = $_POST['password'];

    if (empty($mail) || empty($password)) {
        header("Location: ../login.html?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.html?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['password']);
                if ($passwordCheck == false) {
                    header("Location: ../login.html?error=wrongpassword");
                    exit();
                } else if ($passwordCheck == true) {
                    session_start();

                    $_SESSION['userUid'] = $row['email'];
                    // $uname = $row['username'];
                    // $_SESSION['username'] = $uname;

                    if($row['isAdmin'] == 1) {
                        header("Location: ../admin/adminDashboard.php?login=success");
                        exit();
                    } else {
                        header("Location: ../user-pages/userHomePage.php?login=success");
                        exit();
                    }

                    // $_SESSION['userId'] = $row['id'];
                    //$_SESSION['userName'] = $row['username'];
                    // $_SESSION['userUid'] = $row['email'];
                   // echo $row['email'];
                    // $status = $row['isAdmin'];
                    // //echo $row['isAdmin'];
                    //  if($row['isAdmin'] == 1) {
                    // //     echo "hi";
                    //      header("Location: ../admin/adminDashboard.php?ogin=success");
                    //      exit();
                    //  } else {
                    //      header("Location: ../AddRecipe.html?login=success");
                    //      exit();
                    //  }
                } 
                // else {
                //     header("Location: ../index.php?error=wrongpassword");
                //     exit();
                // }
            } else {
                header("Location: ../login.html?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../login.html");
    exit();
}
