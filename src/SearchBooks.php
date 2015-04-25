<html>
<body>
<h1>SearchBooks</h1>

<form action="HoldRequestforaBook.php" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"/></td>
</tr>
<tr>
    <td>Publisher</td>
    <td><input type="text" name="publisher"/></td>
</tr>

<tr>
    <td>Title</td>
    <td><input type="text" name="title"/></td>
</tr>

<tr>
    <td>Edition</td>
    <td><input type="text" name="edition"/></td>
</tr>

<tr>
    <td>Author</td>
    <td><input type="text" name="author"/></td>
</tr>

</table>

<input type="submit" value="Search"/>

</form>

<form action="TrackBookLocation.php" method="post">
<table>
<input type="submit" value="Search Location"/>
<table>

<button type="button" onclick="alert('Hello world!')">Back</button>
<button type="button" onclick="alert('Hello world!')">Close</button>

</body>
</html>