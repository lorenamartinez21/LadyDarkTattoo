<?php
    $conn = mysqli_connect('localhost', 'root', '', 'ladydarktattoo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
               
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Crear</a>
                </p>
                 
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Edad</th>
                          <th>DNI</th>
                          <th>Email</th>
                          <th>Ocupación</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $select="SELECT * FROM empleados";
                      $result=mysqli_query($conn,$select);
                       while($row=mysqli_fetch_array($result)) {
                         ?>
                                <tr>
                                <td><?php echo $row["Id"]?>  </td>
                                <td><?php echo $row["Nombre"]?>  </td>
                                <td><?php echo $row["Apellidos"]?>  </td>
                                <td> <?php echo $row["Edad"]?>  </td>
                                <td> <?php echo $row["DNI"]?>  </td>
                                 <td> <?php echo $row["Email"]?>  </td>
                                <td> <?php echo $row["ocupación"] ?> </td>
                               
                                <td>
                                  <form method = "POST" action = "delete.php">
                                    <button class="btn btn-danger" type="submit" name= "eliminar" value="<?php echo $row["Id"]?>">Eliminar</button>


                       </form>


                                </td>

                                <td>
                                
                                    <a href="actualizar.php" value="<?php echo $row["Id"]?>" name= "actualizar">Actualizar</a>


                 
                       </td>
              
                              </tr>

                      </tbody>
                      <?php
                       }
                      
                      ?>
                </table>
                
        </div>
    </div> <!-- /container -->
  </body>
</html>
<?php
 mysqli_close($conn);
?>