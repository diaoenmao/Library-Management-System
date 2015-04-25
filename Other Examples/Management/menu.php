<?php
//retrieve session data
  session_start();
//echo "Manager SSN is  ". $_SESSION['manager'] . "<br />";
 $mgrssn = $_SESSION['manager'];  
?>

<?php
include 'dbinfo.php' ; 
?>  


<html>
<head>
<title>Corporate Administration System Main Menu   </title>

<body bgcolor="#000000">
<center>
<font color="#ffffff">


</head>
<body>

<p><b>CORPORATE ADMINISTRATION SYSTEM -- MAIN MENU</b></p>        
<br /><br />


<!-- ************************************************************* -->  

<?php
$link = mysqli_connect($host,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");


         //Our SQL Query
           
           $sql_query = "Select fname,lname From employee Where ssn = $mgrssn";

         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error());
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}

           $num = mysqli_num_rows($result);

          //Close Database Connection
           mysqli_close ($link);

            echo "The Query returns $num rows <br>"  ;

//         while($row = mysql_fetch_array($result))
           $row = mysqli_fetch_array($result);   
//           {
//             echo $row['fname'] . " " . $row['lname'];
               $first =  $row['fname'];  
               $last =  $row['lname'];
//             echo "<br />";
//           }


 ?>


<!-- ************************************************************* -->  

<p>WELCOME <font color="#ffff00" face="Arial, Helvetica, sans-serif">   <?php echo   $first." ". $last?> </font></p>      
<br /><br />


<p>PLEASE CHOOSE ONE OF THE FOLLOWING OPTIONS:</p>       
<br /><br />

<form action="edQueryData.php" method="post">
<!-- Employee Query :<input type="radio" value="Employee" name="qtype">  -->
Employee Query
<input type="submit" value="submit" name="submit">
</form>

<form action="pjQueryData.php" method="post">
<!-- Department Query:<input type="radio" value="Department" name="qtype">  -->
Project Query
<input type="submit" value="submit" name="submit">
</form>

<form action="logout.php" method="post">
Logout 
<input type="submit" value="submit" name="submit">
</form>
