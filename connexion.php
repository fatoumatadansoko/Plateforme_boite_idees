<?php


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];


require_once "config.php";

if(empty($nom) || empty($prenom) || empty($mail) || empty($pass)) {
    echo "tous les champs sont obligatoires";
    exit;
}
$mdpHache = password_hash ($pass, PASSWORD_DEFAULT);


 $sql="SELECT * FROM Utilisateur";

 $query= "INSERT INTO `Utilisateur` ( `Nom`, 'prenom', `mail`,  `pass`)
VALUES (:nom, :prenom, :mail, :pass )";

$requete = $connexion->prepare($sql);

$requete->execute([
    ': nom'=>$nom,
    ': prenom'=>$prenom,
    ': mail'=>$mail,
    ': pass'=>$mdpHache,
]);

header('Location: idees.php');




?>