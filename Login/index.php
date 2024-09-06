
<?php
    include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
    include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
    include($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
    su_ave();
?>
<!-- <form method="post">
    <p>User Name : <input type="text" name="txtUNAME" id="id_txtUNAME" placeholder ="User Name"></p>
    <p>Password :<input type="password" name="txtPWD" id="id_txtPWD" placeholder ="Password"></p>
    <input type="submit" value="Sign In" name="butLOGIN">
    <p name="lblERRORPWD" id= "id_lblERRORPWD">pwd Error msg</p>
</form> -->

<?php 
    bootstarp_css("Login");
    ob_start();
?>
    <link rel="stylesheet" href="styles.css">

<body>
    <div class="background">

    </div>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="txtUNAME" id="id_txtUNAME" placeholder ="User Name" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="txtPWD" id="id_txtPWD" required>
            </div>
            <button type="submit" name="butLOGIN">Login</button>
        </form>
        <p id="id_lblERRORPWD"></p>
        <p class="toggle-form">&nbsp;</p>
        <p class="toggle-form">Not a member? <a href="/register/">Register now</a></p>
    </div>

<?php 
    bootstarp_js();
?>

</body>
</html>

<?php
    if(array_diff_key($_POST,["butLOGIN"]))
    {
        login();
    }

   
?>

