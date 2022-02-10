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
		while ($row = pg_fetch_row($result_client))
		{
			echo "<b>1. Client Table: </b><br>";
			echo "<b>unique_id: </b>" . $row[0] . "<br>";
			echo "<b>unqiue_client_id: </b>" . $row[1] . "<br>";
			echo "<b>parent_id: </b>" . $row[2] . "<br>";
			echo "<b>client_name: </b>" . $row[3] . "<br>";
		}
		echo "<br><br>";
		while ($row = pg_fetch_row($result_clause))
		{
			echo "<b>2. Clause Table: </b><br>";
			echo "<b>unique_id: </b>" . $row[0] . "<br>";
			echo "<b>title: </b>" . $row[2] . "<br>";
			echo "<b>tags: </b>" . $row[3] . "<br>";
			echo "<b>author: </b>" . $row[4] . "<br>";
			echo "<b>date: </b>" . $row[6] . "<br>";
			echo "<b>clause_string: </b>" . $row[10] . "<br>";
		}

		echo "<br><br>";
		while ($row = pg_fetch_row($result_document))
		{
			echo "<b>3. Document Table: </b><br>";
			echo "<b>unique_id: </b>" . $row[0] . "<br>";
			echo "<b>document type: </b>" . $row[2] . "<br>";
			echo "<b>author: </b>" . $row[3] . "<br>";
			echo "<b>date: </b>" . $row[5] . "<br>";
		}


		pg_close($connection);


	?>
</body>