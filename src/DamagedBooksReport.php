<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$ori_month = null;
$firstsubject = null;
$secondsubject = null;
$thirdsubject = null;
$firstisdamagednum = null;
$secondisdamagednum = null;
$thirdisdamagednum = null;
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
if(isset($_POST['month']) and isset($_POST['firstsubject']) and isset($_POST['secondsubject']) and isset($_POST['thirdsubject'])){
	$ori_month = $_POST['month'];
	$month = date('m',strtotime($ori_month ));
	$firstsubject = $_POST['firstsubject'];
	$secondsubject = $_POST['secondsubject'];
	$thirdsubject = $_POST['thirdsubject'];
	//Our SQL Query
	$sql_query1 = "Select Count(IsDamaged) AS damagednum From book AS B, bookcopy AS BC, issue AS I
		Where B.ISBN = I.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID AND Month(IssueDate) = '$month' AND SubName = '$firstsubject' Order by damagednum DESC LIMIT 3";
	//Run our sql query
	$result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	//Our SQL Query
	$sql_query2 = "Select Count(IsDamaged) AS damagednum From book AS B, bookcopy AS BC, issue AS I
		Where B.ISBN = I.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID AND Month(IssueDate) = '$month' AND SubName = '$secondsubject' Order by damagednum DESC LIMIT 3";
	//Run our sql query
	$result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));	
	if($result2 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	//Our SQL Query
	$sql_query3 = "Select Count(IsDamaged) AS damagednum From book AS B, bookcopy AS BC, issue AS I
		Where B.ISBN = I.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID AND Month(IssueDate) = '$month' AND SubName = '$thirdsubject' Order by damagednum DESC LIMIT 3";
	//Run our sql query
	$result3 = mysqli_query ($link, $sql_query3)  or die(mysqli_error($link));	
	if($result3 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row1 = mysqli_fetch_array($result1);
	$firstisdamagednum = $row1['damagednum'];
	$row2 = mysqli_fetch_array($result2);
	$secondisdamagednum = $row2['damagednum'];
	$row3 = mysqli_fetch_array($result3);
	$thirdisdamagednum = $row3['damagednum'];
}

?>




<html>
<body>
<h1>Damaged Book Report</h1>
<form action="" method="post">
<tr>
    <td>Month</td>
</tr>
<table>
<select name="month" required>
<option selected disabled hidden value=''></option>		
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
</select>
</table>
<tr>
    <td>Subject</td>
</tr>
</table>
<table>
<select name="firstsubject" required>
<option selected disabled hidden value=''></option>
<option value="Computer Architecture">Computer Architecture</option>
<option value="Psychology">Psychology</option>
<option value="Physics">Physics</option>
<option value="Calculus">Calculus</option>
<option value="Data Science">Data Science</option>
</select>
</table>

<tr>
    <td>Subject</td>
</tr>
</table>
<table>
<select name="secondsubject" required>
<option selected disabled hidden value=''></option>
<option value="Computer Architecture">Computer Architecture</option>
<option value="Psychology">Psychology</option>
<option value="Physics">Physics</option>
<option value="Calculus">Calculus</option>
<option value="Data Science">Data Science</option>
</select>
</table>
<tr>
    <td>Subject</td>

</tr>
</table>
<table>
<select name="thirdsubject" required>
<option selected disabled hidden value=''></option>
<option value="Computer Architecture">Computer Architecture</option>
<option value="Psychology">Psychology</option>
<option value="Physics">Physics</option>
<option value="Calculus">Calculus</option>
<option value="Data Science">Data Science</option>
</select>
</table>

<table border="1" style="width:100%">
  <tr>
    <th>Month</th>
    <th>Subject</th>
    <th>#damaged books</th>
  </tr>
  <tr>
    <td><?php echo $ori_month; ?></td>
    <td><?php echo $firstsubject; ?></td>
    <td><?php echo $firstisdamagednum; ?></td>
  </tr>
   <tr>
    <td><?php echo $ori_month; ?></td>
    <td><?php echo $secondsubject; ?></td>
    <td><?php echo $secondisdamagednum; ?></td>
  </tr>
   <tr>
    <td><?php echo $ori_month; ?></td>
    <td><?php echo $thirdsubject; ?></td>
    <td><?php echo $thirdisdamagednum; ?></td>
  </tr>
</table>
<input type="submit" value="Show Report"/>
</form>
<form action="AdminSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
</body>
</html>