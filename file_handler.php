<?php
# Here: submit the files and store them tempararily before pushing them into DB
# todo: collect the data (some logic inside) and extract possible tags and relevant titles
if (isset($_POST["submit"])) {
	$file_name = $_FILES['file']['name'];
	$file_error = $_FILES['file']['error'];
	if ($file_error != 0) {
		echo "File error";
	}
	move_uploaded_file($_FILES['file']['tmp_name'], 'docs/'.$file_name);
	header("Location: index.php");
} else {
	# temp, todo: show a list of files under docs directory
	$myfiles = array_diff(scandir('docs'), array('.', '..')); 
	echo "<table border='1'>
	<tr>
	<th>current files</th>
	</tr>";
	foreach($myfiles as $row) {
		echo "<tr>";
		echo "<td>" . $row . "</td>";
	} 
	echo "</table>";
}



