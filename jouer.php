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
     include( 'connexion.php')
    ?>
    <header class="container">
        <h1>Mini jeu combats</h1>
        <nav class="nav">
            <?php

                require( 'menu.php' );


            ?>
        </nav>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-6 mt-3">
                <?php
                
                $perso = false;
                if (isset($_GET['id'])) {
                    $sql='SELECT * FROM personnages WHERE id='.$_GET['id'];
                    $response = $db->query($sql);
                    $persoGame = $response->fetch();
                }
                
                
            
                ?>
                <h5 class="text-center">Jouer</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" colspan="2">Choisissez un personnage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "SELECT * FROM personnages";
                        $response = $db->query( $sql );
                        $listPerso = $response->fetchAll();
                        $sel = '';
                        foreach( $listPerso as $cle=>$perso ) {
                            $sel = (isset($_REQUEST['id']) && $_REQUEST['id'] == $perso['id'])  ? 'selected' : '';
                            echo '<tr class="'.$sel.'"><th scope="row">' . $perso['id'] . '</a></th>
                            <td "><a href="jouer.php?id=' . $perso['id'] .'" ">' . $perso['nom'] . '</a></td></tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
                if ($persoGame) {
            ?>
                    <div class="row info">
                        <div class="col-6 mt-5 ">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body perso">
                                    <h5 class="card-title"><?=$persoGame['nom']?></h5>
                                    <p class="card-text">Dégat: <?=$persoGame['degat']?></p>
                                    <p class="card-text">Experience: <?=$persoGame['experience']?></p>
                                    <p class="card-text">Niveau: <?=$persoGame['niveau']?></p>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php
                }
            ?>

            <div class="row">
                <div class="col-auto">

                </div>
            </div>
            
        </div>

    </main>

    <footer class="container">

    </footer>
</body>
</html>