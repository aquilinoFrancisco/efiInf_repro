<?php
include "config.php";
include "utils.php";

echo '<script>
    (function(){
        window.history.back();
    })()
</script>';

$dbConn =  connect($db);

// Crear un nuevo comentario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST;   

    $sql = "INSERT INTO comentarios
          (comentario, fecha_creacion,videoID)
          VALUES
          (:comentario, :fecha_creacion, :videoID)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $comentarioId = $dbConn->lastInsertId();
    if($comentarioId){
      $input['id'] = $comentarioId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}
//En caso de que no se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>
