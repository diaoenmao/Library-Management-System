<?php

$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Not connected : ' . mysqli_error());
}
$db_selected = mysqli_select_db($link,'recipes');
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysqli_error());
}

$NewRecipeName = $_POST['NewRecipeName'];
$NewRecipeRating = $_POST['NewRecipeRating'];

$insertStatement = "INSERT INTO Recipe (Name, Rating) VALUES ('$NewRecipeName', $NewRecipeRating)";
mysqli_query($link, $insertStatement);

?>

<html>
<body>
<h1>Recipe Added:  <?php echo $NewRecipeName ?></h1>
</body>
</html>