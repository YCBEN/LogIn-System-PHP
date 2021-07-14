<?php


    if(isset($_POST["submit"])){
        
        require 'database.php';

        $username =$_POST["username"];
        $pass =$_POST["password"];
        $confirm =$_POST["confirmPassword"];

        if(empty($username) || empty($pass) || empty($confirm)){
            header("Location: ../register.php?error=emptyfields&username=".$username);
            exit();
        }elseif(!preg_match("/^[a-zA-Z0-9]*/",$username)){
            header("Location: ../register.php?error=InvalidUsername&username=".$username);
            exit();
            }elseif (!($pass == $confirm)){
            header("Location: ../register.php?error=passwordNotMatching&username=".$username);
            exit();
        }else{
            $sql ="SELECT username FROM users where username = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../register.php?error=sqlError");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                $rowCount = mysqli_stmt_num_rows($stmt);
                
                if ($rowCount > 0){
                    header("Location: ../register.php?error=usernameTaken");
                    exit();
                }else{
                    $sql ="INSERT INTO users (username,password) VALUES (?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../register.php?error=sqlError");
                        exit();
                    }else{
                        $hashedpass =password_hash($pass, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt,"ss",$username,$hashedpass);
                        mysqli_stmt_execute($stmt);}
                            header("Location: ../LogIn.php?succes=registred");
                            exit();
                }

            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
    
    }

?>