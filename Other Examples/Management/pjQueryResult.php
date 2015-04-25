<?php
//retrieve session data    
  session_start();  
//echo "Manager SSN is  ". $_SESSION['manager'] . "<br />";
 $manager = $_SESSION['manager'];  
?>

<?php
include 'dbinfo.php' ; 
?>  


<html>
<head>
<title>Project Query Result  </title>
</head>


<body bgcolor="#000000">
<center>
<font color="#ffffff">
<p>PROJECT QUERY RESULT </p>
<br /><br />


<p>LOCATIONS CHOSEN: 

<?php

$ploc = $_POST["ploc"];
$numlocs = count($ploc);    

if ($numlocs > 0) { 
$i=0;
while ($i < $numlocs) {
?> 

<font color="#ffff00" face="Arial, Helvetica, sans-serif">   <?php echo  " " . $ploc[$i]; ?> </font>  

<?php
   $i++;
   if ($i < $numlocs) { echo ", "; }
}

} 
else {                                
?> 
<font color="#ffff00" face="Arial, Helvetica, sans-serif">   <?php echo  " NONE "; } ?> </font>  

</p>  


<?php
$link = mysqli_connect($host,$username,$password) or die( "Unable to connect");;
mysqli_select_db($link, $database) or die( "Unable to select database");

switch ($numlocs)
{
case 1:
  $sql_query = "Select pname,pnumber,plocation,dnum,Count(*) As numemps,Sum(Hours) As tothours From project,department,works_on Where mgrssn =  $manager  And dnumber = dnum And plocation =  '$ploc[0]' And pnumber = pno  Group By pname,pnumber,plocation,dnum"; 
  break;
case 2:
  $sql_query = "Select pname,pnumber,plocation,dnum,Count(*) As numemps,Sum(Hours) As tothours From project,department,works_on Where mgrssn =  $manager  And dnumber = dnum And (plocation =  '$ploc[0]' Or plocation =  '$ploc[1]') And pnumber = pno  Group By pname,
pnumber,plocation,dnum"; 
  break;
case 3:
  $sql_query = "Select pname,pnumber,plocation,dnum,Count(*) As numemps,Sum(Hours) As tothours From project,department,works_on Where mgrssn =  $manager  And dnumber = dnum And (plocation =  '$ploc[0]' Or plocation =  '$ploc[1]' Or plocation =  '$ploc[2]') And pnumber = pno  Group By pname,pnumber,plocation,dnum"; 
  break; 
default:
  $sql_query = "Select dnum,Count(*) As numemps,Sum(Hours) As tothours From project,department,works_on Where mgrssn =  $manager  And dnumber = dnum And pnumber = pno  Group By dnum"; 
//echo "No Projects chosen   <br /> ";
}

 
$result = mysql_query ($sql_query) or die(mysql_error());  

$num = mysql_numrows($result); 
 
mysql_close ();


?>  




<br><br><br><br>  
   

<?php 
if ($numlocs > 0) { 
?>

<b>Project Query Result </b><br><br>  

<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Project Name  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">ProjectNumber </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Location    </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Department Number  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Number of Employees </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Total Number of Hours  </font></th>
</tr>

<?php   

          $i=0;
          while ($i < $num) {

           $pname = mysql_result($result,$i,"pname");
           $pnumber  = mysql_result($result,$i,"pnumber");
           $plocation = mysql_result($result,$i,"plocation");
           $dnum  = mysql_result($result,$i,"dnum");
           $numemps  = mysql_result($result,$i,"numemps");
           $tothours = mysql_result($result,$i,"tothours");

 ?>

<tr>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $pname; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $pnumber; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $plocation; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $dnum; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $numemps; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $tothours; ?></font></td>
</tr>


<?php
             $i++;
          }

 ?>

</table>    

<?php 

} 

else { 

?> 

<b>Project Query Result Summary </b><br><br>  

<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Department Number  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Number of Employees </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Total Number of Hours  </font></th>
</tr>

<?php   

          $i=0;
          while ($i < $num) {

           $dnum  = mysql_result($result,$i,"dnum");
           $numemps  = mysql_result($result,$i,"numemps");
           $tothours = mysql_result($result,$i,"tothours");

 ?>

<tr>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $dnum; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $numemps; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $tothours; ?></font></td>
</tr>


<?php
             $i++;
          }

 ?>

</table>    

<?php
} 
 ?>



<br><br> 

<form action="pjQueryData.php" method="post">
  <input type="submit" value="Return to Project Query" name="submit">
</form>

