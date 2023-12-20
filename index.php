<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>ALUMNI AFPA</title>
</head>

<body>


    <header>
        <?php include '../alumni/components/navbar.php'; ?>
    </header>


    <div>Bienvenue sur le site des anciens élèves de l'Afpa. Inscrivez-vous et retrouvez vos anciens camarades de sessions pour savoir ce qu'ils sont devenus, partager votre parcours, vos expériences.</div>
    <div class="parallax parallax1">
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
    <div class="parallax parallax2">
        <h1>ALUMNI AFPA</h1>

        <!-- CALENDRIER -->
        <?php
        function createCalendar($year, $month)
        {
            // Calculer le premier jour du mois
            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

            // Nombre de jours dans le mois
            $daysInMonth = date('t', $firstDayOfMonth);

            // Jour de la semaine du premier jour du mois (0 = dimanche, 1 = lundi, ..., 6 = samedi)
            $firstDayOfWeek = date('w', $firstDayOfMonth);

            // Tableau des jours de la semaine
            $daysOfWeek = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');

            // Affichage du calendrier
            echo "<div>";
            echo "<h2>" . date('F Y', $firstDayOfMonth) . "</h2>";
            
            echo "</div>";
            echo "<div>";
            echo "<a href=\"?year=" . date('Y', strtotime('-1 month', $firstDayOfMonth)) . "&month=" . date('n', strtotime('-1 month', $firstDayOfMonth)) . "\">Mois précédent</a>";
            echo " | ";
            echo "<a href=\"?year=" . date('Y', strtotime('+1 month', $firstDayOfMonth)) . "&month=" . date('n', strtotime('+1 month', $firstDayOfMonth)) . "\">Mois suivant</a>";
            echo "</div>";
            echo "<table>";
            echo "<tr>";
            foreach ($daysOfWeek as $day) {
                echo "<th>$day</th>";
            }
            echo "</tr><tr>";

            // Ajouter des cellules vides pour les jours précédents du mois
            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                echo "<td></td>";
            }

            // Remplir le calendrier avec les jours du mois
            for ($day = 1; $day <= $daysInMonth; $day++) {
                echo "<td>$day</td>";

                // Passer à une nouvelle ligne chaque semaine
                if (($firstDayOfWeek + $day) % 7 == 0) {
                    echo "</tr><tr>";
                }
            }

            // Ajouter des cellules vides pour les jours suivants du mois
            $lastDayOfWeek = ($firstDayOfWeek + $daysInMonth) % 7;
            if ($lastDayOfWeek != 0) {
                for ($i = $lastDayOfWeek; $i < 7; $i++) {
                    echo "<td></td>";
                }
            }

            echo "</tr>";
            echo "</table>";
        }

        // Utilisation de la fonction pour afficher le calendrier du mois actuel
        $year = ($_GET['year']) ? $_GET['year'] : date('Y');
        $month = ($_GET['month']) ? $_GET['month'] : date('n');
        createCalendar($year, $month);
        ?>


    </div>

    <footer>
        <?php include '../alumni/components/footer.php'; ?>
    </footer>


</body>

</html>