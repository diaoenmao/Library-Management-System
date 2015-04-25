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
<h1>Request Extension On a Book</h1>

<form action="ExtensionResult.php" method="post">
<table>
<tr>
    <td>Enter your issue ID</td>
    <td><input type="text" name="issueid" required/></td>
</tr>
</table>

<input type="submit" value="submit"/>

</form>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
</body>
</html>