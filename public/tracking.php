<?php
if (!isset($_SESSION)) {
    session_start();
}
include "ticket_function.php"; {
?>
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
            <div class="ticket"></div>
        </div>
        <footer></footer>
    </body>

    </html>
    <!-- -------->
<?php
}
?>