<html>
<body>
<h1>Create Profile</h1>

<form action="Login.php" method="post">
<table>
<tr>
    <td>First Name</td>
    <td><input type="text" name="firstname"/></td>
</tr>
<tr>
    <td>Last Name</td>
    <td><input type="text" name="lastname"/></td>
</tr>

<tr>
    <td>D.O.B</td>
    <td><input type="text" name="DOB"/></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="text" name="email"/></td>
</tr>

<tr>
    <td>Address</td>
    <td><input type="text" name="address"/></td>
</tr>

</table>


<tr>
    <td>Gender</td>

</tr>


<select>
  <option value="male">male</option>
  <option value="female">female</option>
</select>


<tr>
    <td>Are you a faculty</td>

</tr>

<table>
<select>
  <option value="yes">Yes</option>
  <option value="no">no</option>
</select>
</table>


<tr>
    <td>Associate Department</td>

</tr>
</table>
<table>
<select>
  <option value="electricalengineering">Electrical Engineering</option>
  <option value="computerscience">Computer Science</option>
</select>
</table>


<input type="submit" value="submit"/>




</form>



</body>
</html>