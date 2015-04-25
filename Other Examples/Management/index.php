<?php
include 'dbinfo.php' ; 
?>  


<html>
<title>Corporate Administration Login     </title>
<body bgcolor="#000000">  
<center>
<font color="#ffffff">  
<p>CORPORATE ADMINISTRATION SYSTEM FOR DEPARTMENT MANAGERS</p>
<br /><br />
<b><p>SECURE LOGIN</p></b>
<br /><br />
<?php
//always start the session before anything else!!!!!! 
session_start(); 

if(isset($_POST['ssn']))  { //check null
$ssn      = $_POST['ssn']; //ssn of the text field for employee ssn 

// store session data
$_SESSION['manager']=$ssn;


//connect to the db 

$link = mysqli_connect($host,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");


         //Our SQL Query
           $sql_query = "Select dname,dnumber,mgrssn,mgrstartdate  From department Where mgrssn = $ssn";  

 
         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysql_error());  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}

//this is where the actual verification happens 
    if(mysqli_num_rows($result) == 1){ 
    //the ssn matches the ssn of a manager of a department 
    //move them to the page to which they need to go 
    header('Location: menu.php');
       
    }else{ 
    $err = 'Incorrect SSN for Manager' ; 
    } 
    //then just above your login form or where ever you want the error to be displayed you just put in 
    echo "$err";
    } 

echo "<html>"; 
echo "<head>"; 
echo "</head>"; 
echo "<body>"; 
echo "<form action=\"\" method=\"POST\">"; 
echo "<p>Employee Number:";  
echo "<input name=\"ssn\" size=\"9\" maxlength=\"9\"/>"; 
echo "</p>"; 
echo "<input type=\"submit\" name=\"login\" value=\"Login\" />"; 
echo "</form>"; 
echo "</body>"; 
echo "</html>"; 
?>

</font>
</center>
</body>
</html>
