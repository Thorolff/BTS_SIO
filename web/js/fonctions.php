<?php
/**
 * Générateur d'un entête de page HTML
 * @param string $titre       Titre de la page HTML
 * @param string $encodage    Encodage (UTF-8 par défaut)
 * @return string
 */
function html_header ($titre='sans titre', $encodage='UTF-8') {
    
$html_head = "<!DOCTYPE html>
<html>
    <head>
        <title>$titre</title>
        <meta charset=\"$encodage\">
        <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">       
    </head>
    <body>
";
   return $html_head ; 
}

/**
 * Générateur de page HTML
 * @return string
 */
function html_footer() {
    return '</body></html>';
}

/**
 * Fonction de génération d'un champ de formulaire de type INPUT TEXT
 * @param string $nom_champ
 * @param string $valeur_champ (blanc par défaut)
 * @param boolean $required (false par défaut)
 * @return string
 */
function gen_form_input_text($nom_champ, $valeur_champ='', $required=false) {

    if ($required === true) {
        $attribute_required = 'required' ;
    } else {
        $attribute_required = '';
    }
   return '<input type="text" class="form-control" '
    . 'name="'.$nom_champ.'" value="' . 
            $valeur_champ . '" '.$attribute_required.' /><br>' . PHP_EOL;

}

/**
 * Fonction de connexion à MySQL 
 * @param string $user  ('root' par défaut)
 * @param string $password ('' par défaut)
 * @param string  $database ('testmysql' par défaut)
 * @return \PDO
 */
function connexion_pdo($user='root', $password='', $database='testmysql') {
    $user = "root";
    $password = "";
    $cnxstring = 'mysql:host=localhost;dbname=testmysql';
    return new PDO($cnxstring, $user, $password);    
}