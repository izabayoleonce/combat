<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Combats</title>
</head>
<body>
    <?php
     include('connexion.php');
    ?>
    <header class="container">
        <h1>Mini jeu combats</h1>
        <nav class="nav">
            <?php

                require('menu.php' );


            ?>
        </nav>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-12 mt-5">
        <?php


        $sql = "SELECT count(*) FROM personnages";
            $response = $db->query( $sql );
            $nbPerso = $response->fetch();

            echo '<p>Nombre de personnages créés : ' . $nbPerso[0] . '</p>';
        ?>
            </div>
        </div>

    </main>
    
    <footer class="container">

    </footer>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/custome.js"></script>

</body>
</html>