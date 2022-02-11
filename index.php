<!DOCTYPE html>
<html>
<head>
	<title>AWS attempt</title>
</head>
<body>
	<h1>Hello Pastperfect</h1>
	<?php
		include 'connect.php';
		#Queries
		$result_client = pg_query($connection, "select * from public.\"Client_Table\"");
		$result_clause = pg_query($connection, "select * from public.\"Clause_Table\"");
		$result_document = pg_query($connection, "select * from public.\"Document_Table\"");
		if (!$result_client or !$result_clause or !$result_document) {
			echo "Unable to view the table\n";
			exit;
		}
		#Output
		echo "<table border='1'>
		<tr>
		<th>unique_id</th>
		<th>unqiue_client_id</th>
		<th>parent_id</th>
		<th>lient_name</th>
		</tr>";
		echo "<b>1. Client Table: </b><br>";
		while ($row = pg_fetch_row($result_client))
		{
			echo "<tr>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
		}
		echo "</table>";
		echo "<br><br>";


		echo "<table border='1'>
		<tr>
		<th>unique_id</th>
		<th>title</th>
		<th>tags</th>
		<th>author</th>
		<th>date</th>
		<th>clause_string</th>
		</tr>";
		echo "<b>2. Clause Table: </b><br>";
		while ($row = pg_fetch_row($result_clause))
		{
			echo "<tr>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			$string = explode ("||", $row[3]); 
			$temp_tag = $string[0].", ".$string[1];
			echo "<td>$temp_tag</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "<td>" . $row[6] . "</td>";
			echo "<td>" . $row[10] . "</td>";
		}
		echo "</table>";
		echo "<br><br>";


		echo "<table border='1'>
		<tr>
		<th>unique_id</th>
		<th>document type</th>
		<th>author</th>
		<th>date</th>
		</tr>";
		echo "<b>3. Document Table: </b><br>";
		while ($row = pg_fetch_row($result_document))
		{
			echo "<tr>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[5] . "</td>";
		}
		echo "</table>";

		pg_close($connection);


	?>
</body>