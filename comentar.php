<?php
//include("index.php");
    // Creamos la conexion con la base de datos
    $conn = mysqli_connect('localhost', 'root', '', 'ladydarktattoo');

    // Creamos un statement para insertar registros en la BD
    $insert = "INSERT INTO comentarios(texto, usuario) VALUES('$_POST[texto]', '$_POST[usuario]')";

    // Mostramos por pantalla los resultados
    $result = mysqli_query($conn, $insert);

    if($result){
        header("location: home.php");
    }

    //print_r($result);

    // Siempre hay que cerrar las conexiones a la BD para no sobrecargar el servidor de peticiones
    mysqli_close($conn);
?>