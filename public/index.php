<?php
if (!isset($_SESSION)) {
    session_start();
}
include "login.php";
if (isset($_SESSION['id']) && isset($_SESSION['epost'])) {
    header("Location: ticket.php");
    exit();
} else {

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

            <a href="faq.php">
                <h1>FAQ</h1>
            </a>
            <h1>Login</h1>

            <a href="register.php">
                <h1>Register</h1>
            </a>
        </header>
        <div class="bakgrunn">
            <h1>Fjell login</h1>
            <form class="loginForm" action="login.php" method="post">
                <h2>Login:</h2>
                <input class="input" type="text" name="epost" placeholder="Epost"><br />
                <input class="input" type="password" name="passord" placeholder="Passord"><br />
                <button type="submit">Login</button><br />
            </form>
        </div>
        <footer></footer>
    </body>

    </html>
<?php
}
?>