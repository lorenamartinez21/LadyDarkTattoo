<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Modificar empleado</h3>
                    </div>
             
                    <form class="form-horizontal" action="actualizar.php" method="post">
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($apellidosError)?'error':'';?>">
                        <label class="control-label">Apellidos</label>
                        <div class="controls">
                            <input name="apellidos" type="text"  placeholder="apellidos" value="<?php echo !empty($apellidos)?$apellidos:'';?>">
                            <?php if (!empty($apellidosError)): ?>
                                <span class="help-inline"><?php echo $apellidosError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($edadError)?'error':'';?>">
                        <label class="control-label">Edad</label>
                        <div class="controls">
                            <input name="edad" type="text"  placeholder="edad" value="<?php echo !empty($edad)?$edad:'';?>">
                            <?php if (!empty($edadError)): ?>
                                <span class="help-inline"><?php echo $edadError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($dniError)?'error':'';?>">
                        <label class="control-label">DNI</label>
                        <div class="controls">
                            <input name="dni" type="text"  placeholder="dni" value="<?php echo !empty($dni)?$dni:'';?>">
                            <?php if (!empty($dniError)): ?>
                                <span class="help-inline"><?php echo $dniError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ocupacionError)?'error':'';?>">
                        <label class="control-label">Ocupación</label>
                        <div class="controls">
                            <input name="ocupacion" type="text"  placeholder="ocupacion" value="<?php echo !empty($ocupacion)?$ocupacion:'';?>">
                            <?php if (!empty($ocupacionError)): ?>
                                <span class="help-inline"><?php echo $ocupacionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Actualizar</button>
                          <a class="btn" href="index.html">Volver</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

<?php
    require 'conexion.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    // if ( null==$id ) {
    //     header("Location: index.html");
    // }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $apellidosError = null;
        $edadError = null;
        $dniError = null;
        $emailError = null;
        $ocupacionError = null;
         
        // keep track post values
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $ocupacion = $_POST['ocupacion'];
         
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Please enter Name';
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
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }

        if (empty($ocupacion)) {
            $ocupacionError = 'Please enter ocupacion';
            $valid = false;
        }

         
        // update data
        if ($valid) {
            $pdo = Database::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE empleados SET Nombre =$nombre, Apellidos = $apellidos, Edad =$edad, DNI =$dni, Email =$email, ocupación =$ocupacion WHERE Id =?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id, $nombre, $apellidos, $edad, $dni, $email, $ocupacion));
            Database::disconnect();
            header("Location: index.html");
        }
    } else {
        $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM empleados where Id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $edad = $data['edad'];
        $dni = $data['dni'];
        $email = $data['email'];
        $ocupacion = $data['ocupacion'];
        Database::disconnect();
    }
?>