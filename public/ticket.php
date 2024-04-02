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
            <form class="loginForm" action="ticket_function.php" method="post">
                <select class="kategori" name="kategori">
                    <option value="faktura">Faktura</option>
                    <option value="vedlikehold">Vedlikehold</option>
                    <option value="programvarelisens">Programvarelisens</option>
                </select>
                <input class="problem" type="text" maxlength="255" name="problem" placeholder="Beskriv problemet">
                <button type="submit">Send</button>
            </form>
        </div>
        <footer></footer>
    </body>

    </html>
    <!-- -------->
<?php
}
?>