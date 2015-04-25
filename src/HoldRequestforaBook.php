<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$username = $_SESSION['username'];

if($_POST['isbn'] != null)  { // ISBN
	$isbn = $_POST['isbn'];  
	// store session data
	//Our SQL Query
	$sql_query1 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	//Run our sql query
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$sql_query_copy = "Select COUNT(CopyId) AS copyavail From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	$result_copy = mysqli_query ($link, $sql_query_copy)  or die(mysqli_error($link));
	$row = mysqli_fetch_array($result_copy);
	$copyavail = $row['copyavail'];
	if($copyavail == 0){
		echo 'There are no available copies right now, please go back and make a future hold request.';
	}	
	//Our SQL Query
	$sql_query2 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	//Run our sql query
   $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
	if($result2 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}						
} elseif ($_POST['title'] != null) {
	$title = $_POST['title'];  
	// store session data
	$_SESSION['title']=$title;
	//Our SQL Query
	$sql_query1 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where Title = '$title' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";
	 //Run our sql query
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Title failed.';
			exit();
		}	
	$sql_query2 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where Title = '$title' AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";
	//Run our sql query
   $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
	if($result2 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}		
} elseif ($_POST['author'] != null) {
	$author = $_POST['author'];  
	// store session data
	$_SESSION['author']=$author;
	//Our SQL Query
	$sql_query1 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC, author AS A Where A.Author = '$author' AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";
	 //Run our sql query
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Author failed.';
			exit();
		}	
	//Our SQL Query
	$sql_query2 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC, author AS A Where A.Author = '$author' AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";
	 //Run our sql query
	   $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Author failed.';
			exit();
		}			
} else {
	header('Location: UserSummary.php');
}
$numrow = mysqli_num_rows($result1);
if($numrow == 0){
	echo 'There are no available copies right now, please go back and make a future hold request.';
}
?>
<html>
<body>
<h1>Hold Request for a Book</h1>
<form action="IssueIDgenerate.php" method="post">

<table border="1" style="width:100%">
  <tr>
	<th>Select</th>
    <th>ISBN</th>
    <th>Title of the book</th>
    <th>Edition</th>
    <th># copies available</th>

  </tr>
  <?php while($row = mysqli_fetch_array($result1)){ 
	  
	$ISBN = $row['ISBN'];
	$Title = $row['Title'];
	$Edition = $row['Edition'];
	$copynum = $row['copynum'];
  ?>
  <tr>
    <td><input type="radio" name="ISBN" value="<?php echo $ISBN; ?>" required></td>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Title; ?></td>
    <td><?php echo $Edition; ?></td>
    <td><?php echo $copynum; ?></td>
  </tr>
<?php
}
?>
</table>
<input type="Submit" value="submit"/>
</form>
<h2>Books on Reserve</h2>
<table border="1" style="width:100%">
  <tr>
    <th>ISBN</th>
    <th>Title of the book</th>
    <th>Edition</th>
    <th># copies available</th>

  </tr>
  <?php while($row = mysqli_fetch_array($result2)){ 
    
	$ISBN = $row['ISBN'];
	$Title = $row['Title'];
	$Edition = $row['Edition'];
	$copynum = $row['copynum'];
	
  ?>
  <tr>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Title; ?></td>
    <td><?php echo $Edition; ?></td>
    <td><?php echo $copynum; ?></td>
  </tr>
<?php
}
?>
</table>
</form>

<form action="SearchBooks.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>