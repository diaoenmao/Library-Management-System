<html>
<body>
<h1>Add Recipe</h1>

<form action="Recipeadd.php" method="post">
<table>
<tr>
	<td>Recipe ID</td>
	<td>(auto-increment)</td>
</tr>
<tr>
	<td>Recipe Name</td>
	<td><input type="text" name="NewRecipeName"/></td>
</tr>
<tr>
	<td>Recipe Rating</td>
	<td><input type="text" name="NewRecipeRating"/></td>
</tr>
</table>

<input type="Submit" value="Add Recipe"/>
</form>



</body>
</html>