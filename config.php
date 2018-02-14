<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


if(isset($_POST['username']) AND isset($_POST['photo']) AND isset($_POST['userid']))
{

    $_SESSION['username']=$_POST['username'];
    $_SESSION['photo']=$_POST['photo'];
    $_SESSION['userid']=$_POST['userid'];
    echo "ok";

}

if (isset($_POST['deconnexion']))
{
    unset($_SESSION['username']);
    unset($_SESSION['photo']);
    echo "Vous etes deconnected";
}

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/


//Email du webmaster
$mail_webmaster = 'samymwamba@gmail.com';

//Adresse du dossier de la top site
$url_root = 'http://virgo-music.com';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'default';
?>