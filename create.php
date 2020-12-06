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
                        <h3>Nuevo empleado</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nombresError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="Nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($apellidosError)?'error':'';?>">
                        <label class="control-label">Apellidos</label>
                        <div class="controls">
                            <input name="Apellidos" type="text" placeholder="Apellidos" value="<?php echo !empty($apellidos)?$apellidos:'';?>">
                            <?php if (!empty($apellidos)): ?>
                                <span class="help-inline"><?php echo $apellidosError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($edadError)?'error':'';?>">
                        <label class="control-label">Edad</label>
                        <div class="controls">
                            <input name="Edad" type="text"  placeholder="Edad" value="<?php echo !empty($edad)?$edad:'';?>">
                            <?php if (!empty($edadError)): ?>
                                <span class="help-inline"><?php echo $edadError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($dniError)?'error':'';?>">
                        <label class="control-label">DNI</label>
                        <div class="controls">
                            <input name="DNI" type="text"  placeholder="DNI" value="<?php echo !empty($dni)?$dni:'';?>">
                            <?php if (!empty($edadError)): ?>
                                <span class="help-inline"><?php echo $dniError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($ocupacionError)?'error':'';?>">
                        <label class="control-label">Ocupacion</label>
                        <div class="controls">
                            <input name="ocupacion" type="text"  placeholder="Ocupacion" value="<?php echo !empty($ocupacion)?$ocupacion:'';?>">
                            <?php if (!empty($ocupacionError)): ?>
                                <span class="help-inline"><?php echo $ocupacionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">crear</button>
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
        $nombreError = null;
        $apellidosError = null;
        $dniError = null;
        $edadError = null;
        $emailError = null;
        $ocupacionError = null;

        // keep track post values
        $nombre = $_POST['Nombre'];
        $apellidos = $_POST['Apellidos'];
        $dni = $_POST['DNI'];
        $edad = $_POST['Edad'];
        $email = $_POST['email'];
        $ocupacion = $_POST['ocupacion'];

        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nameError = 'Please enter nombre';
            $valid = false;
        }

        if (empty($apellidos)) {
            $apellidosError = 'Please enter apellidos';
            $valid = false;
        }

        if (empty($edad)) {
            $edadError = 'Please enter edad';
            $valid = false;
        }

        
        if (empty($dni)) {
            $dniError = 'Please enter dni';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email';
            $valid = false;
        }

        if (empty($ocupacion)) {
            $ocupacionError = 'Please enter ocupacion';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO empleados (Nombre, Apellidos, Edad, DNI, Email, ocupación) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre, $apellidos, $edad, $dni, $email, $ocupacion));
            Database::disconnect();
            header("Location: index.html");
        }
    }

?>
