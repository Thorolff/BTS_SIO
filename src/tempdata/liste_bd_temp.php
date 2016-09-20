<?php

function getListeBD() {
    $listebd = array();
    $listebd[] = array(
        'id' => 1,
        'album' => 'Garulfo',
        'auteur' => 'Ayroles, Maïorana, Leprévost',
        'editeur' => 'Delcourt',
        'parution' => '15-05-2011'
    );
    $listebd[] = array(
        'id' => 2,
        'album' => 'horologiom',
        'auteur' => 'fabrice Lebeault',
        'editeur' => 'Delcourt',
        'parution' => '01-01-2005'
    );
    $listebd[] = array(
        'id' => 3,
        'album' => 'Le château des étoiles',
        'auteur' => 'Alex Alice',
        'editeur' => 'Rue De Sevres',
        'parution' => '01-05-2014'
    );
    $listebd[] = array(
        'id' => 4,
        'album' => 'Le voyage extraordinaire',
        'auteur' => 'Camboni, Filippi',
        'editeur' => 'Vents d\'Ouest',
        'parution' => '01-09-2012'        
    );
    return $listebd;
}