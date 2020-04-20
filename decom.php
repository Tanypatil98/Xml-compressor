<?php

//upload.php

if(!empty($_FILES))
{
	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
		sleep(1);
		$source_path = $_FILES['uploadFile']['tmp_name'];
		$target_path = 'dupload/' . $_FILES['uploadFile']['name'];
		if(move_uploaded_file($source_path, $target_path))
		{
			$hello =	shell_exec("python C:/xampp/htdocs/progress/download/Decompression File.py $target_path");
		
			echo "<table width='20%' class='table table-hover' >";
			echo "<tr>";
			echo "<th>Filename</th>";
			echo "<th>Download</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>".$_FILES['uploadFile']['name']."</td>";
			echo "<td><a href='download1.php?file=".urlencode($_FILES['uploadFile']['name'])."' >Download</a> | <a href='decompressor.php '>Reset</a></td>";
			echo "</table>";
		}
	}
}

?>