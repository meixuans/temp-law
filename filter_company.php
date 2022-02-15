<?php
include 'connect.php';
$q= $_REQUEST['q'];
$suggestion = "";

#Queries
$result_client = pg_query($connection, "select * from public.\"Client_Table\"");
if (!$result_client) {
	echo "Unable to view the table\n";
	exit;
}

#Push all companies into the array
$arr = array();
while ($row = pg_fetch_row($result_client))
{
	array_push($arr, $row[3]);
}

#Give corresponding suggestions
if ($q !== "") {
	$q = strtolower($q);
	$len = strlen($q);
	foreach($arr as $company) {
		$temp = strtolower($company);
		if (stristr($q, substr($temp, 0, $len))) {
			$suggestion = $company;
			break;
		}
	}
}

echo $suggestion === "" ? "No suggestion" : $suggestion;