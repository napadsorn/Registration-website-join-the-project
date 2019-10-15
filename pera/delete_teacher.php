<?php
	$serverName = "localhost";
	$userName ="root";
	$userPassword = "";
	$dbName = "project";
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn,"utf8");
	if(mysqli_connect_errno())
	{
		echo"ไม่สามารถติดต่อได้" . mysqli_connect_error();
	}
?>

<?php
	$sql = "delete from tbl_teacher where id = ".$_REQUEST['Sval_1'];
	$result = mysqli_query($conn, $sql);
	//if ($result) {echo "deleted_Pera";}
?>
<?php
	$sql = "select * from tbl_teacher";
	$result = mysqli_query($conn, $sql);
	$text = "";
	while ($row = mysqli_fetch_array($result)) {
		$sql_1 = "select fac_name from faculty where fac_id = '".$row['value_1']."'";
		$result_1 = mysqli_query($conn, $sql_1);
		$row_1 = mysqli_fetch_array($result_1);
		
		$sql_2 = "select saka_name from sakawicha where saka_id = '".$row['value_2']."'";
		$result_2 = mysqli_query($conn, $sql_2);
		$row_2 = mysqli_fetch_array($result_2);
		
		$sql_3 = "select name from nameinsaka where person_id = '".$row['value_3']."'";
		$result_3 = mysqli_query($conn, $sql_3);
		$row_3 = mysqli_fetch_array($result_3);
		
		$text .= $row['id']."|".$row_1['fac_name']."|".$row_2['saka_name']."|".$row_3['name']."|"."\n";
	}
	echo $text;
?>