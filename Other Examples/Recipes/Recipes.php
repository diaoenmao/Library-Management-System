<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysqli_select_db($link,'recipes');
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
?>
<html>
<body>
<h1>My Recipes</h1>

<!-- Create a table to display list of Recipes -->
<table>
<tr>
	<th>Recipe ID</th>
	<th>Recipe Name</th>
	<th>Recipe Rating</th>
</tr>


<?php
$query = "SELECT * FROM recipe ORDER BY Rating DESC";
$result = mysqli_query($link, $query);
if($result == false)
{
    echo 'The query failed.';
    exit();
}
$rowcount = mysqli_num_rows($result);


while($row = mysqli_fetch_assoc($result)) {
	
	$RecipeID = $row["RecipeID"];
	$RecipeName = $row["Name"];
	$RecipeRating = $row["Rating"]

	?>
	<tr>
		<td><?php echo $RecipeID; ?></td>
		<td><?php echo $RecipeName; ?></td>
		<td><?php echo $RecipeRating; ?></td>
	</tr>

<?php
}
?>

</table>

</body>
</html>