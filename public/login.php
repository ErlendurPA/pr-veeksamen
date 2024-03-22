<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../db_connect.php";

//|||||||||||||||||||||||||||||||||||||||||
//|||||| Henter data fra index.php ||||||||
//|||||||||||||||||||||||||||||||||||||||||

if (isset($_POST['epost']) && isset($_POST['passord'])) {

    $epost = $_POST['epost'];
    $passord = $_POST['passord'];

    if (empty($epost)) {
        header("Location: index.php?error=epost is required!");
        exit();
    } else if (empty($passord)) {
        header("Location: index.php?error=passord is required!");
        exit();
    }

    //||||||||||||||||||||||||||||||||||||||||||||||||||||
    //|||||| Sjekker login detaljer med databasen ||||||||
    //||||||||||||||||||||||||||||||||||||||||||||||||||||

    $sql = "SELECT * FROM bruker WHERE epost='$epost'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($passord, $row['passord'])) {
            echo "Innlogget";
            $_SESSION['epost'] = $row['epost'];
            $_SESSION['id'] = $row['id'];
            header("Location: ticket.php");
            exit();
        } else {
            header("Location: index.php?error=Ugyldig epost eller passord!");
            exit();
        }
    } else {
        header("Location: index.php?error=ugyldig epost eller passord!2");
        exit();
    }
}
