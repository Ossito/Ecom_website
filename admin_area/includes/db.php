<?php

$db = mysqli_connect("localhost", "root" , "" , "ecom_store");


/* Vérification de la connexion */
if (!$db) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

$db->set_charset('utf8');
?>