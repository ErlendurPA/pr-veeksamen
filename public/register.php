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
        <a href="index.php"><img src="imgs/chip.png" alt="barevifter logo" width="75px" height="75px"></a>
        <h2>User Registration</h2>
        <h2></h2>
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