<!DOCTYPE html>
<html>
    <head>
        <title>SkyVerse Login Page</title>
        <link rel="stylesheet" href="../Styles/styleLogin.css">
    </head>
    <body>
        <section style="background-image: url('../imgs/login.jpg');">
            <form action = "verify.php" method ="POST" class="formLogin">
                <br><h1>LOGIN</h1><br><br>    
                <div class="inputbox">
                    <lable for ="username"><b>Username</b></lable><br>
                    <input type = "text" name = "username" class="input" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">  <br><br>
                </div>
                <div class="inputbox">
                    <lable for ="email"><b>Email</b></lable><br>
                    <input type = "email" name = "email" class="input" >  <br><br>
                </div>
                <div class="inputbox">
                    <lable for ="password"><b>Password</b></lable><br>
                    <input type = "password" name = "password" class="input" >
                </div>
                <br><br>
                <button class ="btn" type="submit">LOGIN</button>
                <br><br>
                <p>Non hai un account? <a href ="register.php"><b>registrati</b></p>
            </form>
        </section>
    </body>
</html>
