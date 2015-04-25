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
<title>Employee Query Result  </title>
</head>


<body bgcolor="#000000">
<center>
<font color="#ffffff">
<p>EMPLOYEES FOR YOUR DEPARTMENT QUERY RESULTS </p>
<br /><br />


<!-- Manager SSN is   <?php echo $_SESSION['manager'] ?>  --> 

<?php

$gender = $_POST["gender"];
$relations = $_POST["relations"];

if ($gender =="M")
  $sex = 'Male';  
else
  if ($gender =="F")
    $sex = 'Female';  
  else
    $sex = 'All';  


mysql_connect($host,$username,$password) or die( "Unable to connect");;
mysql_select_db($database) or die( "Unable to select database");



         //Our SQL Query
         if ($sex == 'All') 
             $sql_query = "Select fname,lname,address,salary,dno From employee,department,dependent   
              Where ssn = essn And relationship = '$relations' And dno = dnumber 
               And mgrssn =  $manager";   
         else  
             $sql_query = "Select fname,lname,address,salary,dno From employee,department,dependent   
              Where ssn = essn And employee.sex = '$gender' And relationship = '$relations' And dno = dnumber 
               And mgrssn =  $manager";   

 
         //Run our sql query
           $result = mysql_query ($sql_query)  or die(mysql_error());  


           $num = mysql_numrows($result); 
 
          //Close Database Connection
         //  mysql_close ();

//            echo "The Query returns $num rows <br>"  ;


?>  




<?php 
$dno   = mysql_result($result,0,"dno");
?> 


<b><font color="#ffff00" face="Arial, Helvetica, sans-serif"> <?php echo $sex; ?> </font> EMPLOYEES from your department<font color=
"#ffff00" face="Arial, Helvetica, sans-serif">  <?php echo $dno; ?> </font>  with Dependent(s) of <font color="#ffff00" face="Arial,
 Helvetica, sans-serif"> <?php echo $relations; ?> </font> </b><br><br>  


<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">First Name  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Last Name  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Address</font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Salary</font></th>
</tr>

<?php   

          $i=0;
          while ($i < $num) {

//         echo "Iteration number $i<br>"  ;

           $first = mysql_result($result,$i,"fname");
           $last  = mysql_result($result,$i,"lname");
           $address= mysql_result($result,$i,"address");
           $salary = mysql_result($result,$i,"salary");

 ?>

<tr>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $first; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $last; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $address; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $salary; ?></font></td>
</tr>


<?php
             $i++;
          }

 ?>

</table>   






<?php
         //Our NEXT SQL Query
         $sql_query = "Select fname,lname,address,salary From employee,department             
             Where dno = dnumber And mgrssn =  $manager";


         //Run our sql query
           $result = mysql_query ($sql_query)  or die(mysql_error());


           $num = mysql_numrows($result);

          //Close Database Connection
           mysql_close ();

//            echo "The Query returns $num rows <br>"  ;


?>

<br><br><br><br>


<b>ALL EMPLOYEES from your department<font color="#ffff00" face="Arial, Helvetica, sans-serif">  <?php echo $dno; ?> </font> </b><br
><br>


<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">First Name  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Last Name  </font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Address</font></th>
<th><font color="#ffffff" face="Arial, Helvetica, sans-serif">Salary</font></th>
</tr>

<?php

         $i=0;
          while ($i < $num) {

//         echo "Iteration number $i<br>"  ;

           $first = mysql_result($result,$i,"fname");
           $last  = mysql_result($result,$i,"lname");
           $address= mysql_result($result,$i,"address");
           $salary = mysql_result($result,$i,"salary");

 ?>




<tr>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $first; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $last; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $address; ?></font></td>
<td><font color="#ffffff" face="Arial, Helvetica, sans-serif"><?php echo $salary; ?></font></td>
</tr>


<?php
             $i++;
          }

 ?>

</table>

<br><br>    

<form action="edQueryData.php" method="post">
  <input type="submit" value="Return to Employee Query" name="submit">
</form>

