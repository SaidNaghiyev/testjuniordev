<?php
$mysqli = new mysqli("fdb29.awardspace.net", "3753007_test1", "S@id2002", "3753007_test1") or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM Products") or die($mysqli->error);
?>