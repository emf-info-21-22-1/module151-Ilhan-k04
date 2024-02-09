<?php


header('Access-Control-Allow-Origin: http://localhost:8087');
header('Access-Control-Allow-Credentials: true');


session_start(); // Démarrer la session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "connect") {
        if ($_POST['password'] == 'emf') { // Contrôle du mot de passe
            $_SESSION['logged'] = 'emf'; // Enregistrer "emf" dans une variable de session
            echo '<result>true</result>'; // Écrire '<result>true</result>'
        } else {
            unset($_SESSION['logged']); // Effacer la variable de session si le mot de passe est incorrect
            echo '<result>false</result>'; // Écrire '<result>false</result>'
        }
    }

    if ($_POST['action'] == "disconnect") {
        unset($_SESSION['logged']); // Effacer la variable de session
        echo '<result>true</result>'; // Écrire '<result>true</result>'
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getInfos") {
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'emf') { // Vérifier la variable de session
            echo '<users><user><name>Victor Legros</name><salaire>9876</salaire></user><user><name>Marinette Lachance</name><salaire>7540</salaire></user><user><name>Gustave Latuile</name><salaire>4369</salaire></user><user><name>Basile Ledisciple</name><salaire>2384</salaire></user></users>';
        } else {
            echo '<message>DROITS INSUFFISANTS</message>'; // Écrire <message>DROITS INSUFFISANTS</message>
        }
    }
}
?>