<html>
<head>
  <title>Efi inf</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  * {
    box-sizing: border-box;
  }
  .row {
    display: flex;
  }
  /* Crea dos columnsas, una al lado de la otras */
  .column {
    flex: 100%;
  }
  </style>
</head> 

<body>
  <h1>Reto Eficiena Inf</h1>

  <?php
  session_start();
  $_SESSION["videoID"] = $_GET['id'];
  $_ruta_video ='data/'.$_GET['video'];
  ?>

  <div class="row">
    <div class="column" style="background-color:#bbb;">
      <embed src="<?php echo $_ruta_video; ?>" width="500" height="350" autostart="true" loop="true" /> </embed>
  	<form action="http://localhost/rest/servicios_comentarios.php" method="post">
  		 <p>Comentario: <input type="text" name="comentario" required /></p>
  		 <p>Fecha: <input type="date" name="fecha_creacion" required /></p>
  		 <p><input type="hidden" name= "videoID" value=<?php echo $_SESSION["videoID"]?> /></p>
  		 <p><input type="submit" /></p>
  	</form>
    </div>
    <div class="column" style="background-color:#bbb;">
      <iframe src="http://localhost/efi_inf/comentarios.php" width="600" height="550" scrolling="auto">
    </div>
  </div>
</body> 
</html>