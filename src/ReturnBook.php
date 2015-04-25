<html>
<body>
<h1>Return Book</h1>

<form action="CreateProfile.php" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"/></td>
</tr>
<tr>
    <td>Copy Number</td>
    <td><input type="text" name="copynumber"/></td>
</tr>

<tr>
    <td>User Name</td>
    <td><input type="text" name="username"/></td>
</tr>

</table>

<tr>
    <td>Return in Damaged Condition</td>

</tr>

<table>
<select>
  <option value="yes">Yes</option>
  <option value="no">no</option>
</select>
</table>

<input type="submit" value="Locate"/>


</form>



</body>
</html>