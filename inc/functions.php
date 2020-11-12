<?php


function connexion_BDD()
{

    $hote = "localhost";
    $utilisateur = "root";
    $motdepasse = ""; 
    $base = "yourtouch"; 

    return mysqli_connect($hote, $utilisateur, $motdepasse, $base);
}

function formatage_date($date_sql)
{

    $timestamp = strtotime($date_sql);

    $date_formatee = date("d/m/Y", $timestamp);

    return $date_formatee;
}


function check_role($role)
{
    if ($role == "administrateur") {
        return "administrateur";
    }

    if ($role == "utilisateur") {
        return "utilisateur";
    }
    return null;
}

function snippet($text, $cut = 150, $end = '...')
{
    $output = substr($text, 0, $cut);
    if (strlen($text) > $cut) {
        $output .= '<span class="snippet_end">' . $end . '</span>';
    }

    return '<div id="snippet">' . $output . '</div>';
}
