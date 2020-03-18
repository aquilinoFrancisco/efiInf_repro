<?php
include "config.php";
include "utils.php";

$dbConn =  connect($db);

//  listar todos los video o solo uno
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if (isset($_GET['id'])){
    //Mostrar un video
    $sql = $dbConn->prepare("SELECT * FROM videos where videoID=:id");
    $sql->bindValue(':id', $_GET['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
    exit();
  }
  else {
    //Mostrar lista de videos
    $sql = $dbConn->prepare("SELECT * FROM videos");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode( $sql->fetchAll()  );
    exit();
  }
}

// Crear un nuevo video
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $input = $_POST;
  $sql = "INSERT INTO videos
        (videoID,video, fecha_creacion)
        VALUES
        (:videoID, :video, :fecha_creacion)";
  $statement = $dbConn->prepare($sql);
  bindAllValues($statement, $input);
  $statement->execute();
  $postId = $dbConn->lastInsertId();
  if($postId){
    $input['id'] = $postId;
    header("HTTP/1.1 200 OK");
    echo json_encode($input);
    exit();
  }
}
//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>