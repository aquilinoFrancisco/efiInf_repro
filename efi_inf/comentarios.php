<html> 
<body> 

<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
<tr><th>Comentarios</th></tr>

<?php 
include "config.php";
include "utils.php";

$dbConn =  connect($db);
session_start();

$sql = $dbConn->prepare("SELECT * FROM comentarios where videoID =:videoID");
$sql->bindValue(':videoID', $_SESSION['videoID']);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
header("HTTP/1.1 200 OK");

$data = json_decode(json_encode($sql->fetchAll()),true);
	if($data){
		for ($i=0; $i<count($data); $i++){
			$comentarioNombre = $data[$i]["comentario"];
			echo "<tr><td>".$data[$i]['comentario']."</td></tr> \n";
			} 
	}else{
		echo "no hay comentarios";
	} 
	echo "</table> \n"; 
	?> 
  
</body> 
</html> 