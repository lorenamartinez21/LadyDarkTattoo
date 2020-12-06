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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="comentariosylocalizacion.css">
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

       <div class="contenido"><br>
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12676.736949294169!2d-5.9280075!3d37.40912!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc6aacb7db2dd738!2sInstituto+Tecnol%C3%B3gico+Superior+ADA!5e0!3m2!1ses!2ses!4v1486657884737"></iframe><br><br>
     
        <label>633197206</label><br>
        <label>lorenamargar17@gmail.com</label><br>
        <label>@ejemplo_instagram</label><br>
        <label>@ejemplo_twitter</label><br>

       </div>
     
    <footer class="pie-de-pagina">
      <div class="comentarios"><p><a href="comentarios.php">Comentarios</a></p></div>
      <div class="localizacion"><p><a href="localizacion.php">Localización</a></p></div>
      <div class="tattooideal"><p><a href="tattooideal.php">¡Descubre cuál es tu tattoo ideal!</a></p></div>
    </footer>

  </div>
</body>
</html>