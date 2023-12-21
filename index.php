<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>ALUMNI AFPA</title>
</head>

<body>


    <header id="top">
        <?php include '../alumni/components/navbar.php'; ?>
    </header>


    <div>Bienvenue sur le site des anciens élèves de l'Afpa. Inscrivez-vous et retrouvez vos anciens camarades de sessions pour savoir ce qu'ils sont devenus, partager votre parcours, vos expériences.</div>
    <div class="parallax parallax1" id="adhérents">
        <h1>ALUMNI AFPA<img src="/assets/img/AFPA-symbole.jpg" class="symbole" alt="symbole afpa"></h1>


        <div class="container">
            <div class="row">
                <?php
                include './assets/data/data.php';
                $nb = 1;
                foreach ($data as $item) {

                    echo '<div class="child">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $item['name'] . '</h5>';
                    echo '<img class= "img" src="./assets/img/portrait-' . $nb . '.jpg" /> ';
                    echo '<p class="region card-text">' . $item['region'] . '</p>';
                    echo '<p class="mail card-text">' . $item['email'] . '</p>';
                    echo '<p class=" phone card-text">' . $item['phone'] . '</p>';
                    echo '</div></div></div>';
                    $nb++;
                }

                ?>

            </div>
        </div>





    </div>
    <div class="transit">Contactez vos anciens camarades et organisez des retrouvailles ! Les réunions d'anciens élèves sont affichées dans l'agenda de la communauté alors n'hésitez pas à vous inscrire à l'une d'entre elles pour y revoir vos collègues de formations mais aussi vos formateurs ! </div>
    <div class="parallax parallax2" id="calendrier">
        <h1>ALUMNI AFPA</h1>

        <!-- CALENDRIER -->

        <?php

        function createCalendar($year, $month)
        {
            // Tableau des jours de la semaine avec Lundi en première position
            $daysOfWeek = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

            // Calculer le premier jour du mois
            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

            // Jour de la semaine du premier jour du mois (1 = lundi, ..., 7 = dimanche)
            $firstDayOfWeek = date('N', $firstDayOfMonth);

            // Trouver le décalage par rapport à la première colonne
            $offset = $firstDayOfWeek - 1;

            // Nombre de jours dans le mois
            $daysInMonth = date('t', $firstDayOfMonth);

            // Affichage du calendrier
            echo "<div>";
            $dateTime = new DateTime("@$firstDayOfMonth");
            echo "<h2>" . $dateTime->format('F Y') . "</h2>";
            echo '<a href="#top" class="btnReturn">Haut de page</a>';
            echo "</div>";
            echo "<div>";
            echo "<a href=\"?year=" . date('Y', strtotime('-1 month', $firstDayOfMonth)) . "&month=" . date('n', strtotime('-1 month', $firstDayOfMonth)) . "\">Mois précédent</a>";
            echo " | ";
            echo "<a href=\"?year=" . date('Y', strtotime('+1 month', $firstDayOfMonth)) . "&month=" . date('n', strtotime('+1 month', $firstDayOfMonth)) . "\">Mois suivant</a>";
            echo "</div>";
            echo "<table>";
            echo "<tr>";

            // Affichage des jours de la semaine
            foreach ($daysOfWeek as $day) {
                echo "<th>$day</th>";
            }
            echo "</tr><tr>";

            // Ajouter des cellules vides pour les jours précédents du mois
            for ($i = 0; $i < $offset; $i++) {
                echo "<td></td>";
            }

            // Remplir le calendrier avec les jours du mois
            for ($day = 1; $day <= $daysInMonth; $day++) {
                if (($month == 2 && $day == 14) || ($month == 12 && $day == 24) || ($month == 7 && $day == 7)) {
                    echo "<td style='background-color: #44A33D;'>$day</td>";
                } else {
                    echo "<td>$day</td>";
                }

                // Passer à une nouvelle ligne chaque semaine
                if (($offset + $day) % 7 == 0) {
                    echo "</tr><tr>";
                }
            }

            // Ajouter des cellules vides pour les jours suivants du mois
            $lastDayOfWeek = ($offset + $daysInMonth) % 7;
            if ($lastDayOfWeek != 0) {
                for ($i = $lastDayOfWeek; $i < 7; $i++) {
                    echo "<td></td>";
                }
            }

            echo "</tr>";
            echo "</table>";
        }

        // Utilisation de la fonction pour afficher le calendrier du mois actuel
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $month = isset($_GET['month']) ? $_GET['month'] : date('n');
        createCalendar($year, $month);
        ?>

        <?php
        // Votre contenu dynamique en plusieurs lignes
        $ligne1 = "<span style='font-family: \"Diphylleia\", serif; font-size: 16px;  font-weight: bold;'><i class='bi bi-calendar-check'></i> Agenda</span>";
        $ligne2 = " <span style='font-family: \"Diphylleia\", serif; font-size: 14px; text-decoration: underline; font-weight: bold;'><i class='bi bi-dot'></i>
        24 décembre 2023</span>: Repas de Noël";
        $ligne3 = " <span style='font-family: \"Diphylleia\", serif; font-size: 14px; text-decoration: underline; font-weight: bold;'><i class='bi bi-dot'></i>14 février 2024</span>: Réunion d'anciens célibataires ";
        $ligne4 = " <span style='font-family: \"Diphylleia\", serif; font-size: 14px; text-decoration: underline; font-weight: bold;'><i class='bi bi-dot'></i>7 juillet 2024</span>: Barbecue géant.";
        ?>

        <div id="new">
            <div class="newParagraphe">
                <p><?php echo $ligne1; ?></p>
            </div>
            <div class="newParagraphe">
                <p><?php echo $ligne2; ?></p>
            </div>
            <div class="newParagraphe">
                <p><?php echo $ligne3; ?></p>
            </div>
            <div class="newParagraphe">
                <p><?php echo $ligne4; ?></p>
            </div>
        </div>
    </div>

    <footer>
        <?php include '../alumni/components/footer.php'; ?>
    </footer>

</body>

</html>