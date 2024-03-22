<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../db_connect.php"; {
?>
    <!-- 
    //|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    //|||||| Login form, selve funksjonene skjer i login.php ||||||||
    //|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    -->
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header style="padding: 1px;">
            <h1>Login</h1>
            <a href="register.php">
                <h1>Register</h1>
            </a>
        </header>
        <div class="bakgrunn">
            <h1>PROBLEM
            </h1>
            <form class="loginForm" action="login.php" method="post">

            </form>
        </div>
        <footer></footer>
    </body>

    </html>
    <!-- -------->
<?php
}
?>