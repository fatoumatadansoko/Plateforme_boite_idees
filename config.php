<?php
$serveur = "127.0.0.1"; // le nom du serveur
$utilisateur = "root"; // votre nom d'utilisateur MySQL
$motDePasse = "<nouveau>"; // votre mot de passe MySQL
$baseDeDonnees = "TraitementBoiteIdee"; // le nom de votre base de données

try {
    // Connexion à la base de données avec PDO
        // $connexion = new PDO("mysql:host=127.0.0.1;dbname=$baseDeDonnees", $utilisateur, $motDePasse);

           //$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $connexion=new mysqli($serveur,$utilisateur,$motDePasse,$baseDeDonneesbase);
        
        echo "Connexion réussie";

    // Vous pouvez maintenant exécuter vos requêtes SQL ici



} catch (PDOException $e) {
    // En cas d'erreur de connexion
    die("La connexion a échoué : " . $e->getMessage());
} finally {
    // Fermez la connexion lorsque vous avez terminé
    if (isset($connexion)) {
        $connexion = null;
    }
}