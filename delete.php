<?php

    $conn = mysqli_connect('localhost', 'root', '', 'ladydarktattoo');
        $delete = "DELETE FROM empleados WHERE Id = '$_POST[eliminar]'";
        $result = mysqli_query($conn, $delete);
        header("location: mostrar.php");
    mysqli_close($conn);
?>
