<html> 
<head>
  <title>Efi inf</title>
</head>

<body> 
	<h2 align="center">Reto Eficiencia Inf</h2>

	<div class="row" align="center">
		<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
		<td><font face="verdana"><b>Video</b></font></td>
		</tr>
		  
		<?php 
			include "config.php";
			include "utils.php";

			$data = json_decode(file_get_contents("http://localhost/rest/post.php"),true);
			if($data){
				for ($i=0; $i<count($data); $i++){
					$videoID = $data[$i]["videoID"];
					$videoNombre = $data[$i]["video"];
					echo "<tr><td><a href='videos.php?id=$videoID&video=$videoNombre'>"
					.$data[$i]["video"]."</a></td></tr> \n"; 
				}
			}else{
				echo "no hay videos";
			}
			echo "</table> \n"; 
			?> 
	</div>
</body> 
</html> 
