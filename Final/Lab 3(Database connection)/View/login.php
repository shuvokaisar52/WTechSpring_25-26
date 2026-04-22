<html>

<head>
    <titel>Login Page</titel>
</head>

<body>
    <h1>Login Now</h1>
    <form method='post' action="../Controller/loginvalidation.php">
        <table>
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
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>

</html>