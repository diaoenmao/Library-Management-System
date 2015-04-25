<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
?> 

<html>
<body>
<h1>Future Hold Request for a Book</h1>

<form action="FutureHoldRequestResult.php" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
</table>
<input type="submit" value="Request"/>
</form>

<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>


</body>
</html>