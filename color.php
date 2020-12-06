<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html translate="no">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="loggedin">
  <nav class="navtop">
              <div>
                  <h1>LadyDark Tattoo</h1>
                  <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                  <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </div>
          </nav>

  <div class="grid-container">

    <header class="encabezado">

     <div class="logo"><img src="logo interfaces.png" style="width: 130px"></div>

     <div class="titulo">
      <h1>LadyDark Tattoo</h1>
     </div>
      <div class="menu-principal">

        
    
          <a href="tatuajes.php">Tatuajes</a>
      
          <a href="piercings.php">Piercings</a>
       
        

      </div>
     </header>
     
         <div class="menu-secundario">

          <nav>
            <section>
          <a href="minitatoos.php">Mini Tattoos</a><br>
          <a href="medianos.php">Medianos</a><br>
          <a href="grandes.php">Grandes</a><br>
          <a href="color.php">A color</a><br>
          </section>

          </nav>

          </div>

    <div class="contenido">

          <img src="tatoo color.jpg">

      
     <p>Los tatuajes a color son más llamativos ya que los tonos brillantes que tienen muchos diseños son muy atractivos.</p>
     <p>Si quieres realizarte un tatuaje a color, muéstrale tus ideas a nuestros artistas tatuadores y déjate asesorar sobre las mejores combinaciones de color que mejor quedan con tu tono de piel.</p>

     </div>

    <footer class="pie-de-pagina">
      <div class="comentarios"><p><a href="comentarios.php">Comentarios</a></p></div>
      <div class="localizacion"><p><a href="localizacion.php">Localización</a></p></div>
      <div class="tattooideal"><p><a href="tattooideal.php">¡Descubre cuál es tu tattoo ideal!</a></p></div>
    </footer>
  </div>
</body>
</html>
