<?php

    if(isset($_POST['envoi'])){
        
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        if (!$nom) {
            echo '<script>alert("Le nom doit obligatoirement être renseigné !")</script>';
        }
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        if (!$prenom) {
            echo '<script>alert("Le prenom doit obligatoirement être renseigné !")</script>';
        }
        $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING);
        if (!$adresse) {
            echo '<script>alert("L\'adresse doit obligatoirement être renseigné !")</script>';
        }
        $cp = filter_input(INPUT_POST, 'cp', FILTER_VALIDATE_INT);
        if (!$cp) {
            echo '<script>alert("Le code postal doit obligatoirement être renseigné !")</script>';
        }
        $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
        if (!$ville) {
            echo '<script>alert("La ville doit obligatoirement être renseigné !")</script>';
        }
    }
