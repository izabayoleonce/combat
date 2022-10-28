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
            <div class="col-6 mt-5">
                <?php
                
                
                $action = isset( $_GET['action'] ) ? $_GET['action'] : 'create';
                
                // delete player
                if( isset( $_GET['action'] ) && $_GET['action'] == 'supp' ) {
                    $sql = "DELETE FROM personnages WHERE id=" . $_GET['id'];
                    if(  $db->exec( $sql ) ) {
                        echo '<p> Personnage supprimé</p>';
                    } else {
                        echo '<p> Erreur lors de la suppression</p>';
                    }
                }

                

                // create player
                $mess = '';
                if( isset( $_GET['action'] ) && $_GET['action'] == 'create' ) {
                    if( !empty( $_GET['nom'] ) ) {
                        $sql = 'INSERT INTO personnages (nom) VALUES ("' . $_GET['nom'] . '")';
                        $sql = 'INSERT INTO personnages (nom) VALUES ("' . $_GET['nom'] . '")';
                        if ($db->exec($sql)) {
                            $mess = 'Personnage créé !';
                        } else {
                            $mess = 'Erreur lors de la création';
                        }
                    } else {
                        $mess = 'Entrez un nom de personnage !';
                    }
                }

                // modification a player 
                $persoAModifier='';
                $idPerso=0;
                if ( isset( $_GET['action'] ) && $_GET['action'] == 'mod' ) {

                    if (isset($_GET['ok']) && !empty($_GET['id'])) {
                        $sql='UPDATE personnages SET nom ="'.$_GET['nom'].'" WHERE id='.$_GET['id'];
                        echo $sql;
                        if ($db->exec($sql)) {
                            $mess = 'Personnage modifié !';
                        } else {
                            $mess = 'Erreur lors de la modification';
                        }
                        $action = 'create'; 
                    } else {
                        $sql="SELECT * FROM personnages WHERE id=".$_GET['id'];
                        $response = $db->query($sql);
                        $perso = $response->fetch(); 
                        $persoAModifier=$perso['nom'];
                        $idPerso=$perso['id'];
                    }
                    
                }
                ?>
                <h5>Liste des personnages</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Supp.</th>
                        <th scope="col">Personnage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        // show all player
                        $sql = "SELECT * FROM personnages";
                        $response = $db->query( $sql );
                        $listPerso = $response->fetchAll();
                        $sel = '';
                        foreach( $listPerso as $cle=>$perso ) {
                            $sel = (isset($_REQUEST['id']) && $_REQUEST['id'] == $perso['id'])  ? 'selected' : '';
                            echo '<tr class="'.$sel.'"><th scope="row">' . $perso['id'] . '</a></th>
                                <td><a href="personnages.php?id=' . $perso['id'] .'&action=supp" class="text-danger">x</a></td>
                                </td><td class="persoName"><a href="personnages.php?id=' . $perso['id'] .'&action=mod" class="persoName">' . $perso['nom'] . '</a></td></tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-5">
                <h5>Ajouter un personnage</h5>
                <?php
                echo $mess;
                ?>
                <form class="row g-3" method="get" action="personnages.php">
                    
                    <div class="col-auto">
                        <input type="hidden" value="<?= $action; ?>" name="action">
                        <input type="hidden" value="<?=$idPerso?>" name="id" id="">
                        <input type="text" class="form-control" value="<?=$persoAModifier?>" name="nom" placeholder="Entrer un nom">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Ok</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <footer class="container">

    </footer>
</body>
</html>