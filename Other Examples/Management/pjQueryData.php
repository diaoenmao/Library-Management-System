<?php
include 'dbinfo.php' ; 
?>  

<?php
//retrieve session data    
  session_start();  
//echo "Manager SSN is  ". $_SESSION['manager'] . "<br />";
 $manager = $_SESSION['manager'];  
?>

<?php

$link = mysqli_connect($host,$username,$password) or die( "Unable to connect");;
mysqli_select_db($link, $database) or die( "Unable to select database");

         //SQL Query
         $sql_query = "Select Distinct plocation From project AS P,department             
             Where dnum = dnumber And P.mgrssn =  $manager";

         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
           $num = mysqli_num_rows($result);

          //Close Database Connection
           mysqli_close ($link);

           echo "The Query returns $num rows <br>"  ;
?>




<html>
<head>
<title>Choose Data for Project Query    </title>
</head>


<html>
<body bgcolor="#000000">
<center>
<font color="#ffffff">
<p>CHOOSE DATA FOR PROJECT QUERY </p>
<br /><br />



<body>
<form action="pjQueryResult.php" method="post">

<b> Choose Project Cities : </b><br />

<?php
          while ($row = mysqli_fetch_assoc($result)) {
           $plocation = $row["plocation"];
 ?>

           <?php echo $plocation; ?>:<input type="checkbox" value= "<?php echo $plocation ?>" name="ploc[]"><br />


<?php
          }
 ?>    


<input type="submit" value="submit" name="submit">
</form>


<br /> 
<br /> 
<br /> 

<form action="menu.php" method="post">
  <input type="submit" value=" Return to Main Menu" name="submit">
</form>
