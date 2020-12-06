
<!DOCTYPE html>
<html translate="no">
<head>
  <title></title>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="comentariosylocalizacion.css">
  <script src="ideal.js" cache="false"></script>
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

      <div class="contenido col-xs-2">
        <form>

          <h1>¿Cuál es tu Tattoo ideal?</h1>
          
          <div class="form-group d-flex ml-5">
            <label for="exampleFormControlSelect1">-¿Cómo prefieres los dibujos?</label>
            <select class="form-control mx-auto" id="exampleFormControlSelect1" style="width: 550px">
              <option>A color</option>
              <option>Blanco y negro</option>
              
            </select>

          </div>

          <div class="form-group d-flex ml-5">
            <label for="exampleFormControlSelect1">-¿Te gusta destacar y llamar la atención?</label>
            <select class="form-control mx-auto" id="exampleFormControlSelect1" style="width: 550px">
              <option>¡Por supuesto!</option>
              <option>No, soy más discreto/a</option>
              
            </select>

          </div>

          <div class="form-group d-flex ml-5">
            <label for="exampleFormControlSelect1">-¿Te gustan los diseños innovadores?</label>
            <select class="form-control mx-auto" id="exampleFormControlSelect1" style="width: 550px">
              <option>Prefiero el estilo Old School</option>
              <option>¡Claro, mientras más colorido, llamativo y extravagante mejor!</option>
              
            </select>

          </div>
          
          <div class="mx-auto">
          <label>Email</label>

          <input type="Email" name=""><br>
          </div>
         <div class="enviar">
          <input type="submit" id= "enviar" name="">
        </div>

        </form>
      </div>
     
    <footer class="pie-de-pagina">
      <div class="comentarios"><p><a href="comentarios.php">Comentarios</a></p></div>
      <div class="localizacion"><p><a href="localizacion.php">Localización</a></p></div>
      <div class="tattooideal"><p><a href="tattooideal.php">¡Descubre cuál es tu tattoo ideal!</a></p></div>
    </footer>

  </div>
</body>
</html>