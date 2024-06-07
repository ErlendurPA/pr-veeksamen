<!DOCTYPE html>
<html>
<!--
//||||||||||||||||||||||||||||||||||||||||||||
//|||||| For for register_process.php ||||||||
//||||||||||||||||||||||||||||||||||||||||||||
-->

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
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
        <form class="loginForm" action="register_process.php" method="post">

            <label for="epost">Registrering</label><br>
            <input class="input" type="email" name="epost" placeholder="Epost"><br><br>

            <input class="input" type="text" name="fornavn" placeholder="Fornavn"><br><br>

            <input class="input" type="text" name="etternavn" placeholder="Etternavn"><br><br>

            <input class="input" type="password" name="passord" placeholder="Passord"><br><br>

            <input type="submit" value="Register">

        </form>
    </div>
    <footer><a href="logout.php">Logg ut</a></footer>
</body>

</html>