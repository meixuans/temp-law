<?php
 include 'connect.php';
 $temp_from = $_POST["from_date"];
 $temp_to = $_POST["to_date"];
 print_r($temp_from);
 $item_from = strval($temp_from);
 $item_to = strval($temp_to);
 print_r($item_from);
 //todo: further adapt feature to corresponding input-->the DATE
 if (isset($_POST["from_date"], $_POST["to_date"])) {
 	$result_clause = pg_query($connection, "select * from public.\"Clause_Table\" WHERE date BETWEEN 
 		to_date('01 Jan 2021', 'DD Mon YYYY') AND to_date('06 Jan 2021', 'DD Mon YYYY') ");
 }
 if (!$result_clause) {
	echo "Unable to view the table\n";
	exit;
}
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