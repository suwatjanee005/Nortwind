<?php
require("orde_s1connect.php");
$sql="select * from Orderdetails";

if((int)phpversion() >= 7) {
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<center> orderid: " . $row["orderid"]. "- productid: " . $row["productid"]. "- unitprice: " . $row["unitprice"]."- quantity: " . $row["quantity"]."- discount: " . $row["discount"]. "<br/>";
		}
	} else {
		echo "no results";
	}
	$connect->close();
} else {	
	if (!$result=mysql_db_query($db,$sql)) die("Query : failed");
	echo "Display all records : <br/>";
	while ($object = mysql_fetch_object($result)) {
		echo $object->PID . "  " . $object->Pname . "<br/>";
	}
	echo "Total " . mysql_num_rows($result) ." records";
	mysql_close($connect);
}
echo "<center><a href=index.php>back</a>";
?>
