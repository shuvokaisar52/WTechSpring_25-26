<?php 
include "../Controller/validation.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
</head>
<body>
	<form method="POST" action="welcome.php">
		<table>
			<tr>
				<td><p style="color: red;">* required field</p></td>
			</tr>
			<tr>
				<td><label for="name">Name: </label></td>
				<td><input type="text" name="name" id="name"></td>
				<td><p style="color: red;">*</p></td>
			</tr>
			<tr>
				<td><label for="email">E-mail: </label></td>
				<td><input type="email" name="email" id="email"></td>
				<td><p style="color: red;">*</p></td>
			</tr>
			<tr>
				<td><label for="website">Website: </label></td>
				<td><input type="url" name="website" id="website"></td>
			</tr>
			<tr>
                <td><label for="comment">Comment: </label></td>
                <td><textarea name="comment" id="comment" rows=5 cols=20></textarea></td>
            </tr>
			<tr>
				<td><label for="gender">Gender: </label></td>
				<td>
					<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
					<input type="radio" name="gender" value="Others">Others
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" id="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>