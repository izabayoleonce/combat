<?php

$sql = "SELECT * FROM menu";
$response = $db->query( $sql );
$listMenu = $response->fetchAll();
// var_dump($listMenu);
foreach( $listMenu as $cle=>$menu ) {
    $nomScript = '#';
    if(  !empty( $menu['script'] ) ) {
        $nomScript = $menu['script'];
    }
    echo '<a class="nav-link" href="' . $nomScript . '">' . $menu['id'] . ' - ' . $menu['nom'] . '</a>';
} 