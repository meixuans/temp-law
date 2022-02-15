<?php
include 'connect.php';

#Sort by date function <
function date_compare($element1, $element2) {
    $datetime1 = strtotime($element1['date']);
    $datetime2 = strtotime($element2['date']);
    return $datetime1 - $datetime2;
} 

#Queries
$result_document = pg_query($connection, "select * from public.\"Document_Table\"");
if (!$result_document) {
	echo "Unable to view the table\n";
	exit;
}
$arr = pg_fetch_all($result_document);
usort($arr, 'date_compare');

#Prints
echo "<table border='1'>
<tr>
<th>unique_id</th>
<th>document type</th>
<th>author</th>
<th>date</th>
</tr>";
foreach($arr as $row) {
	echo "<tr>";
	echo "<td>" . $row['unique_id'] . "</td>";
	echo "<td>" . $row['document_type'] . "</td>";
	echo "<td>" . $row['author'] . "</td>";
	echo "<td>" . $row['date'] . "</td>";
} 
echo "</table>";