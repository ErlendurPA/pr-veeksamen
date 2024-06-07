<?php
if (!isset($_SESSION)) {
    session_start();
} {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header style="padding: 1px;">
        <a href="faq.php">
            <h2>FAQ</h2>
        </a>
        <a href="ticket.php">
            <h2>Ticket</h2>
        </a>
        <a href="tracking.php">
            <h2>Tracking</h2>
        </a>

        <h1>Bruker registrering</h1>

        <a href="index.php">
            <h2>Login</h2>
        </a>
        <a href="register.php">
            <h2>Registrering</h2>
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
                <input class="problem" type="text" maxlength="255" name="problem" placeholder="Beskriv problemet" autocomplete="off">
                <button type="submit">Send</button>
            </form>
        </div>
        <footer><a href="logout.php">Logg ut</a></footer>
    </body>

    </html>
    <!-- -------->
<?php
}
?>