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
  <h1>ALUMNI AFPA</h1>


  <div class="container">
            <div class="row">
                <?php
                include './assets/data/data.php';
                foreach ($data as $item) {
                    echo '<div class="col-md-3">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'. $item['name'] . '</h5>';
                    echo '<p class="card-text">' . $item['region'] . '</p>';
                    echo '<p class="card-text">' . $item['phone'] . '</p>';
                    echo '<p class="card-text">' . $item['email'] . '</p>';
                    echo '</div></div></div>';
                }
                ?>

            </div>
        </div>
 




</div>
<div class="transit">Contactez vos anciens camarades et organisez des retrouvailles ! Les réunions d'anciens élèves sont affichées dans l'agenda de la communauté alors n'hésitez pas à vous inscrire à l'une d'entre elles pour y revoir vos collègues de formations mais aussi vos formateurs !  </div>
<div class="parallax parallax2">
  <h1>ALUMNI AFPA</h1>
  


</div>

<footer>
<?php include '../alumni/components/footer.php'; ?>
</footer>


</body>
</html>