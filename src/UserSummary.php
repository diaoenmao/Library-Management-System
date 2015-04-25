<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);	
?> 
<html>
<body>
<h1>User Summary</h1>

<form action="SearchBooks.php" method="post">
<input type="submit" value="Search Books"/>
</form>

<form action="TrackBookLocation.php" method="post">
<input type="submit" value="Track Book Location"/>
</form>

<form action="BookCheckout.php" method="post">
<input type="submit" value="Checkout Book"/>
</form>

<form action="FutureHoldRequestforaBook.php" method="post">
<input type="submit" value="Future Hold Request"/>
</form>

<form action="RequestExtensionOnaBook.php" method="post">
<input type="submit" value="Extension Request"/>
</form>

<form action="ReturnBook.php" method="post">
<input type="submit" value="Return Book"/>
</form>

<form action="Login.php" method="post">
<input type="submit" value="Close"/>
</form>

</body>
</html>