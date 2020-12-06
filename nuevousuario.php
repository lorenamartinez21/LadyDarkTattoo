<?php

    include 'conexion.php';

    $link = mysqli_connect("localhost", "root", "", "ladydarktattoo");

$username = "username";
$email = $password = $confirmpassword = "";
$email_err = $passwordError = $confirmpasswordError = "";

 if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor inserte un Correo Electrónico.";
    } else {
        $sql = "SELECT id FROM usuarios WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["email"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Este email ya existe.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Lo sentimos! Algo ha ido mal. Por favor intentelo más tarde.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["password"]))){
        $passwordError = "Por favor inserte una Contraseña.";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $passwordError = "La contraseña debe contener al menos 8 carácteres";
    } else {
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirmpasswordError = "Por favor confirma la contraseña";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($passwordError) && ($password != $confirm_password)){
            $confirmpasswordError = "Las contraseñas no coinciden";
        }
    }

    if(empty($email_err) && empty($passwordError) && empty($confirmpasswordError)){
        $sql = "INSERT INTO usuarios (username, password, email) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);

            $param_username = "$_POST[username]";
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
           

            if(mysqli_stmt_execute($stmt)){
                header("location: register.php");
            } else {
                echo "Algo ha ocurrido. Por favor intentelo más tarde";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);

 }
 ?>