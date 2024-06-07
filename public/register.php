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
    <header>

        <a href="faq.php">
            <h1>FAQ</h1>
        </a>
        <h2>User Registration</h2>

        <a href="index.php">
            <h1>Login</h1>
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