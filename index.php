
<head>
    <style>

        h1 {
            text-align: center;
            color: darkblue;
        }

        table{
            font-size: 20px;
            margin-left: 30%;
        }

        td, th {
            background: slategrey;
            color: whitesmoke;
            border:solid black 2px;
            border-radius: 5px;
            margin-right: 10%;
            margin-left: 10%;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-right: 100px;
            padding-left: 100px;
        }

        th {
            background: black;
            color: white;
        }

    </style>

</head>



<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 14/01/2019
 * Time: 10:07
 */

include 'log.php';

function affichage_client () {

    GLOBAL $conn;

    $sql = "SELECT clients.lastname as nom, clients.firstname as prenom FROM clients";

    $result = $conn->query($sql);

    ?>

    <body>

        <h1> exo 1 </h1>
    <table>
        <th> Nom </th>
        <th> Prenom </th>

    <?php

    while($row = $result->fetch_assoc()) {

         ?>


        <tr>
            <td> <?= $row['nom'] ?> </td>
            <td> <?= $row['prenom'] ?> </td>

        </tr>

    <?php
    }
    ?>
    </table>
    <?php
}

affichage_client();

    function affichage_show () {

    GLOBAL $conn;

    $sql = "SELECT showtypes.type FROM showtypes";

    $result = $conn->query($sql);

    ?>

    <body>

    <h1> exo 2 </h1>

    <table>
        <th> Show </th>

        <?php

        while($row = $result->fetch_assoc()) {

            ?>


            <tr>
                <td> <?= $row['type'] ?> </td>

            </tr>

            <?php
        }
        ?>
    </table>
<?php
}

affichage_show();


function affichage_20_clients () {

GLOBAL $conn;

$sql = "SELECT clients.lastname as nom, clients.firstname as prenom FROM clients WHERE id <= 20";

$result = $conn->query($sql);

?>

    <body>
    <h1> exo 3 </h1>

    <table>
        <th> Nom </th>
        <th> Prenom </th>

        <?php

        while($row = $result->fetch_assoc()) {

            ?>


            <tr>
                <td> <?= $row['nom'] ?> </td>
                <td> <?= $row['prenom'] ?> </td>

            </tr>

            <?php
        }
        ?>
    </table>
<?php
}

affichage_20_clients();

function affichage_carte_fidelite () {

GLOBAL $conn;

$sql = "SELECT clients.lastname as nom, clients.firstname as prenom, cards.cardNumber FROM clients, cards WHERE cards.cardTypesId = 1 and cards.cardNumber = clients.cardNumber";

$result = $conn->query($sql);

?>

    <body>
    <h1> exo 4 </h1>

    <table>
        <th> Nom </th>
        <th> Prenom </th>

        <?php

        while($row = $result->fetch_assoc()) {

            ?>


            <tr>
                <td> <?= $row['nom'] ?> </td>
                <td> <?= $row['prenom'] ?> </td>

            </tr>

            <?php
        }
        ?>
    </table>
<?php
}

affichage_carte_fidelite();

function affichage_exo5 () {

GLOBAL $conn;

$sql = "SELECT clients.lastname as nom, clients.firstname as prenom FROM clients WHERE clients.lastname LIKE 'M%' and 1 ORDER BY clients.lastname ASC ";

$result = $conn->query($sql);

?>
    <h1> exo 5 </h1>


        <?php

        while($row = $result->fetch_assoc()) {

            ?>

            nom du client : <?= $row['nom'] ?> <br>
            prenom du client : <?= $row['prenom'] ?> <br> <br>

            <?php
        }

}

affichage_exo5();


function affichage_exo6 () {

GLOBAL $conn;

$sql = "SELECT shows.title as titre, shows.performer as artiste, shows.date, shows.startTime as temps FROM shows  ORDER BY shows.title ASC";

$result = $conn->query($sql);

?>
    <h1> exo 6 </h1>


    <?php

    while($row = $result->fetch_assoc()) {

    ?>

    <?= $row['titre'] ?> par <?= $row['artiste'] ?>, le <?= $row['date'] ?> à <?= $row['temps'] ?> heure <br> <br>


<?php
}

}

affichage_exo6();


function affichage_exo7 () {

GLOBAL $conn;

$sql = "SELECT clients.*, cards.cardTypesId FROM clients left join cards ON ( cards.cardNumber = clients.cardNumber )";

$result = $conn->query($sql);
?>

    <body>

    <h1> exo 7 </h1>

    <table>
        <th> Nom </th>
        <th> Prenom </th>
        <th> Date de naissance </th>
        <th> Carte de fidélité </th>
        <th> Numéro de carte </th>

        <?php

        while($row = $result->fetch_assoc()) {

            ?>

            <tr>
                <td> <?= $row['lastName'] ?> </td>
                <td> <?= $row['firstName'] ?> </td>
                <td> <?= $row['birthDate'] ?> </td>

                <?php

                if ($row['card'] == 1 && $row['cardTypesId'] == 1) {

                    ?>

                    <td> oui</td>

                    <td> <?= $row['cardNumber'] ?> </td>

                    <?php
                } else
                ?>
                    <td> non </td>
                    <td>  </td>


                <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
}
<?php
affichage_exo7();
