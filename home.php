

<?php
        require_once 'login.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .login{
        width: 382px;
        overflow: hidden;
        margin: auto;
        margin: 20 0 0 450px;
        padding: 80px;
        background: #9884f1;
        border-radius: 15px ;

}
    </style>
    <div class="login">
        <form id="login" method="post" action="login.php"  >
            <label><b>User Name
            </b>
            </label>
            <input type="text" name="username"  placeholder="Username">
            <br><br>
            <label><b>Password
            </b>
            </label>
            <input type="Password" name="password"  placeholder="Password">
            <br><br>
            <button type="submit" name="submit" style=" background-color: #3f5abc;">LOGIN</button> 
            </form>
            </div>
            
</body>
</html>