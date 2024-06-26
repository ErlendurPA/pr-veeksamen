<?php
if (!isset($_SESSION)) {
    session_start();
}
// Process register form

include '../db_connect.php';

// Validate user input and insert into database

if (isset($_SESSION['id'])) {
    $bruker_id = $_SESSION['id'];

    $sql2 = "SELECT rolle FROM bruker WHERE id='$bruker_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $rolle = $row2['rolle'];
    if ($rolle == 1) {
        $sql = "SELECT * FROM ticket where bruker_id='$bruker_id'";
        $result = mysqli_query($conn, $sql);
        $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $num_rows = mysqli_num_rows($result);

        echo '<!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" type="text/css" href="style.css">
            </head>
            <body>
    <header>
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
                <div class="bakgrunn">';

        foreach ($tickets as $ticket) {
            if ($ticket['status'] == 1) {
                $ticketStatus = "Active";
            } elseif ($ticket['status'] == 2) {
                $ticketStatus = "Completed";
            }

            $relevant_id = $ticket['bruker_id'];
            $sql3 = "SELECT bruker.epost FROM bruker INNER JOIN ticket ON bruker.id = ticket.bruker_id WHERE ticket.bruker_id='$relevant_id'";
            $result3 = mysqli_query($conn, $sql3);
            $emailString = "";

            while ($row3 = mysqli_fetch_assoc($result3)) {
                $emailString .= $row3['epost'] . ", ";
                break;
            }
            $emailString = rtrim($emailString, ", ");

            echo '<div class="ticket">
                                <h2>' . $emailString . '</h2>
                                <h2>' . $ticket['kategori'] . '</h2>
                                <p class="beskrivelse">' . $ticket['beskrivelse'] . '</p>
                                <p>Svar: ' . $ticket['svar'] . '</p>
                                <p>Status: ' . $ticketStatus . '</p>
                            </div>';
        }
        echo '
        </div>
        <footer><a href="logout.php">Logg ut</a></footer>
       </body>
       </html>';
        exit();
    } elseif ($rolle == 2) {
        $sql = "SELECT * FROM ticket";
        $result = mysqli_query($conn, $sql);
        $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $num_rows = mysqli_num_rows($result);

        echo '<!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
    <header>
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
            <img src="imgs/hello moderator.webp" alt="hello moderator">';

        // Arrays to store active and completed tickets
        $active_tickets = [];
        $completed_tickets = [];

        foreach ($tickets as $ticket) {
            if ($ticket['status'] == 1) { // 'aktiv' is 1
                $active_tickets[] = $ticket;
            } elseif ($ticket['status'] == 2) { // 'avsluttet' is 2
                $completed_tickets[] = $ticket;
            }
        }

        // Display active tickets
        echo '<h2>Active Tickets</h2>';
        foreach ($active_tickets as $ticket) {
            $relevant_id = $ticket['bruker_id'];
            $sql3 = "SELECT bruker.epost FROM bruker INNER JOIN ticket ON bruker.id = ticket.bruker_id WHERE ticket.bruker_id='$relevant_id'";
            $result3 = mysqli_query($conn, $sql3);
            $emailString = "";

            while ($row3 = mysqli_fetch_assoc($result3)) {
                $emailString .= $row3['epost'] . ", ";
                break;
            }
            $emailString = rtrim($emailString, ", ");

            echo '<div class="ticket">
                        <h2>' . $emailString . '</h2>
                        <h2>' . $ticket['kategori'] . '</h2>
                        <p class="beskrivelse">' . $ticket['beskrivelse'] . '</p>
                        <form action="tracking_function2.php" method="post">
                            <textarea name="answer" placeholder="Write your answer here"></textarea>
                            <select class="kategori" name="status">
                                <option value="1">aktiv</option>
                                <option value="2">avsluttet</option>
                            </select>
                            <input type="hidden" name="ticket_id" value="' . $ticket['id'] . '">
                            <button type="submit">Submit</button>
                        </form>
                    </div>';
        }

        // Display completed tickets
        echo '<h2>Completed Tickets</h2>';
        foreach ($completed_tickets as $ticket) {
            $relevant_id = $ticket['bruker_id'];
            $sql3 = "SELECT bruker.epost FROM bruker INNER JOIN ticket ON bruker.id = ticket.bruker_id WHERE ticket.bruker_id='$relevant_id'";
            $result3 = mysqli_query($conn, $sql3);
            $emailString = "";

            while ($row3 = mysqli_fetch_assoc($result3)) {
                $emailString .= $row3['epost'] . ", ";
                break;
            }
            $emailString = rtrim($emailString, ", ");

            echo '<div class="ticket">
                        <h2>' . $emailString . '</h2>
                        <h2>' . $ticket['kategori'] . '</h2>
                        <p class="beskrivelse">' . $ticket['beskrivelse'] . '</p>
                        <p>Svar: ' . $ticket['svar'] . '</p>
                    </div>';
        }

        echo '
            </div>
            <footer><a href="logout.php">Logg ut</a></footer>
            </body>
            </html>';

        exit();
    }
}

$conn->close();
