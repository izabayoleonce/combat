<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Document</title>
</head>
<body >
    <header class="container">
        <h1>Bienvenue sur le jeu de combat</h1>
        <nav class="navbar navbar-expand-lg bg-light">
            <div >
                <ul class="nav">
                    <?php
                        try
                        {
                            $db = new PDO('mysql:host=localhost;dbname=combat;charset=utf8', 'root', '');
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                        }
                        catch(Exception $e)
                        {
                                die('Erreur : '.$e->getMessage());
                        }
                        $sql= 'SELECT * FROM menu ORDER BY id ASC';
                        // echo $sql;
                        $q= $db->prepare($sql);
                        $q->execute([
                            'nom'   => 'nom'
                        ]);
                        $donnees=$q->fetchAll(PDO::FETCH_ASSOC);
                        
                        // var_dump($donnees);
                        foreach($donnees as $cle=>$menu)
                        {
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="#">' . $menu['id']. ' - '. $menu['nom'] . '</a> 
                                </li>';
                        }
                        

                    ?>
                </ul>
            </div> 
        </nav>
      
    </header>

    <main class="container">

    </main>

    <footer class="row footer">

    </footer>
</body>
<script src="./js/jquery.min.js"></script>
</html>