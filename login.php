<?php
include "function.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">     
    body{
        margin-top: 10%;
        margin-left: 40%;
        margin-right: 40%;
        background: silver;
        font-family: Calibri;
    }
    </style>
    </head>
    <body>
        <form method="post">
            <fieldset>
                <center>
                <h2>Aplikasi Kasir</h2><hr>
                Silahkan Login untuk dapat mengakses Aplikasi
                <br><br>
                <label for="inputUsername">Username</label>
                <input name="username" type="text" placeholder="Username" required> 
                <label for="inputPassword">Password</label>
                <input name="password" type="password" placeholder="Password" required>
                <br>
                <button type="submit" name="login">Login</button>
                </center>
            </fieldset>
        </form>
</body>
</html>
