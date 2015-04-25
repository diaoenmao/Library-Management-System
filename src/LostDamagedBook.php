<html>
<body>
<h1>Lost Damaged Book</h1>

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
    <td>Last User of Book</td>
    <td><input type="text" name="lastuserofbook"/></td>
</tr>

<tr>
    <td>Amount to be charged</td>
    <td><input type="text" name="charge"/></td>
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

<input type="submit" value="Look for the last user"/>
<input type="submit" value="Submit"/>
<input type="submit" value="cancel"/>


</form>



</body>
</html>