<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Nuevo usuario</h3>
                    </div>
             
                    <form class="form-horizontal" action="" method="post">
                      <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Nombre" value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Contraseña</label>
                        <div class="controls">
                            <input name="password" type="text"  placeholder="contraseña" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Crear</button>
                          <a class="btn" href="index.php">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

<?php

    require 'conexion.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $usernameError = null;
        $passwordError = null;
        $emailError = null;
     

        // keep track post values
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        

        // validate input
        $valid = true;
        if (empty($username)) {
            $usernameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($password)) {
            $passwordError = 'Please enter password';
            $valid = false;
        }


        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }




        // insert data
        if ($valid) {
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios (username, password, email) VALUES (?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($username, $password, $email));
            Database::disconnect();
            header("Location: index.html");
        }
    }
?>
