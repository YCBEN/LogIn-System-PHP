<?php

    if(isset($_POST['submit'])){
        require 'database.php';

        $username = $_POST['username'];
        $pass = $_POST['password'];


        if(empty($username) || empty($pass)){
            header("Location: ../logIn.php?error=emptyfields");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt =mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../logIn.php?error=sqlError");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if($row = mysqli_fetch_assoc($result)){

                   
                    $passcheck = password_verify($pass,$row['password']);

                    if($passcheck == false){
                        echo($pass);
                        echo("<br>");
                        echo($row['password']);

                        header("Location: ../logIn.php?error=WrongPassword");
                        exit();
                    }elseif($passcheck == true){
                        
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        header("Location: ../index.php?succes=LoggedIn");
                        exit();


                    }else{
                        header("Location: ../logIn.php?error=ERROR");
                        exit();
                    }
                } else{
                    header("Location: ../logIn.php?error=noUserFound");
                    exit();
                }
            }
        }


    }else{
        header("Location: ../index.php?error=AccessForbiden");
            exit();
    }

?>