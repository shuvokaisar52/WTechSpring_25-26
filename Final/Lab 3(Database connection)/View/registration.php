<html>

<head>
    <titel>Registration Page</titel>
</head>

<body>
    <h1>Join With Us</h1>
    <form action="../Controller/registrationvalidation.php" method="post">
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name"></td>
                <td>
                    <p style="color:red">*</p>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
                <td>
                    <p style="color:red">*</p>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password"></td>
                <td>
                    <p style="color:red">*</p>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>

</html>