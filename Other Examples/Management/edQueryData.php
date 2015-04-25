 <?php
//retrieve session data
  session_start();  
//echo "Manager SSN is  ". $_SESSION['manager'] . "<br />";
?>



<html>
<head>
<title>Enter Data for Employee Query    </title>
</head>


<body bgcolor="#000000">
<center>
<font color="#ffffff">
<p>RETRIEVE male OR female EMPLOYEES FROM YOUR DEPARTMENT <br /> WHO HAVE DEPENDENTS OF EITHER son OR daughter OR spouse </p>
<br /><br />

<!-- Manager SSN is   <?php echo $_SESSION['manager'] ?>   -->            



<form action="edQueryResult.php" method="post">
<!--   <form method="post" action="<?php echo $PHP_SELF;?>">   --> 
Gender:<br />
Male:<input type="radio" value="M" name="gender"><br />
Female:<input type="radio" value="F" name="gender"><br /><br />


<!-- <textarea rows="5" cols="20" name="quote" wrap="physical">Enter your favorite quote!</textarea><br /><br />  -->


Select a Relationship  Type:<br />
<select name="relations">
<option value="Son">Son</option>
<option value="Daughter">Daughter</option>
<option value="Spouse">Spouse</option></select><br /><br />


<input type="submit" value="submit" name="submit">
</form>

<br /> 
<br /> 
<br /> 

<form action="menu.php" method="post">
  <input type="submit" value=" Return to Main Menu" name="submit">
</form>
