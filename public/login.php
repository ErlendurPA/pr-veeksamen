<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../db_connect.php";
//||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||| Henter og validerer data fra index.php ||||||||
//||||||||||||||||||||||||||||||||||||||||||||||||||||||
if (isset($_POST['fornavn']) && isset($_POST['passord'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $fornavn = validate($_POST['fornavn']);
    $passord = password_hash($_POST['passord'], PASSWORD_DEFAULT);
    echo $passord;

    if (empty($fornavn)) {
        header("Location: index.php?error=fornavn is required!");
        exit();
    } else if (empty($passord)) {
        header("Location: index.php?error=passord is required!");
        exit();
    }

    //||||||||||||||||||||||||||||||||||||||||||||||||||||
    //|||||| Sjekker login detaljer med databasen ||||||||
    //||||||||||||||||||||||||||||||||||||||||||||||||||||

    $sql = "SELECT * FROM bruker WHERE fornavn='$fornavn' AND passord='$passord'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['fornavn'] === $fornavn && $row['passord'] === $passord) {
            echo "Innlogget";
            $_SESSION['fornavn'] = $row['fornavn'];
            $_SESSION['id'] = $row['id'];
            header("Location: ticket.php");
            exit();
        } else {
            header("Location: index.php?error=Ugyldig fornavn eller passord!");
            exit();
        }
    } else {
        header("Location: index.php?error=tom_db?");
        exit();
    }
}
