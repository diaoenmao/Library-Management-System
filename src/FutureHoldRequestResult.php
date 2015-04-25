<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start();
$username = $_SESSION['username'];
if(isset($_POST['isbn'])) {
$availdate = null;
$copyid = null;
$isbn = $_POST['isbn'];
$_SESSION['isbn'] = $isbn;
//connect to the db
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "Select COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	//Run our sql query
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$copynum = $row['copynum'];
	if($copynum == 0) {
		$today = "2015-4-10";
		$sql_query = "Select Min(ReturnDate) AS availdate From book AS B, bookcopy AS BC, issue AS I Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND BC.ISBN = I.ISBN AND IsReserved = 0 AND IsDamaged = 0 AND BC.CopyID = I.CopyID AND (IsHold = 1 OR IsChecked = 1) AND ReturnDate > '$today'";
		//Run our sql query
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
		if($result == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
		$numrow = mysqli_num_rows($result);
		if($numrow != 0) {
			$row = mysqli_fetch_array($result);
			$availdate = $row['availdate'];
			$sql_query = "Select BC.CopyID AS copyid From book AS B, bookcopy AS BC, issue AS I Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND BC.ISBN = I.ISBN AND IsReserved = 0 AND BC.CopyID = I.CopyID AND (IsHold = 1 OR IsChecked = 1) AND ReturnDate > '$today' AND ReturnDate = '$availdate'";
			//Run our sql query
			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'The query by ISBN failed.';
				exit();
			}
			$row = mysqli_fetch_array($result);
			$copyid = $row['copyid'];
			$sql_query = "Select BC.FuRequester AS furequester From bookcopy AS BC Where BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";
			//Run our sql query
			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'The query by ISBN failed.';
				exit();
			}
			$row = mysqli_fetch_array($result);
			$furequester = $row['furequester'];
			if($furequester == null) {
				$sql_query = "UPDATE bookcopy AS BC SET FuRequester = '$username' Where BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";
				//Run our sql query
				$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
				if($result == false)
				{
					echo 'The query by ISBN failed.';
					exit();
				}
				echo 'Future Hold Success';
			} else {
				echo 'Someone have already made future hold request, sorry.';
			}
		} else {
			echo 'This book is on reserve or damaged.';
		}
	} else {
		echo 'There are available copies right now, please go back and make a hold request.';
	}
}
?>
<html>
<body>
<h1>Future Hold Request for a Book</h1>
<table>
<tr>
    <td>Copy number</td>
    <td><?php echo $copyid; ?></td>
</tr>

<tr>
    <td>Expected Available Date</td>
    <td><?php echo $availdate; ?></td>
</tr>
</table>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
<form action="Login.php" method="post">
<input type="submit" value="Close"/>
</form>
</body>
</html>