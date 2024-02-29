<?php


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$erreur = '';

require_once "boites_idees.php";

if(empty($nom) || empty($prenom) || empty($mail) || empty($pass)) {
   $erreur = "tous les champs sont obligatoires";
    header('Location: inscription.php');
}
else{
    $mdpHache = password_hash ($pass, PASSWORD_DEFAULT);


 //$sql="SELECT * FROM Utilisateur";

 $sql= "INSERT INTO `Utilisateur` ( `nom`, 'prenom', `mail`,  `pass`)
VALUES ('$nom', '$prenom', '$mail', '$mdpHache' )";

$requete = $connexion->prepare($sql);

$requete->execute([
    ': nom'=>$nom,
    ': prenom'=>$prenom,
    ': mail'=>$mail,
    ': pass'=>$mdpHache,
]);

header('Location: boites_idees.php');

}



?>