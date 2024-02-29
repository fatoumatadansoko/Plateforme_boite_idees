<?php

include_once ("config.php");
// $nom=$_POST['nom'];
// $prenom=$_POST['prenom'];
// $mail=$_POST['mail'];
// $pass=$_POST['pass'];
// $erreur = '';


// if(empty($nom) || empty($prenom) || empty($mail) || empty($pass)) {
//    $erreur = "tous les champs sont obligatoires";
//     header('Location: inscription.php');
// }
// else{
//     $mdpHache = password_hash ($pass, PASSWORD_DEFAULT);


//  //$sql="SELECT * FROM Utilisateur";

//  $sql= "INSERT INTO `Utilisateur` ( `nom`, 'prenom', `mail`,  `pass`)
// VALUES ('$nom', '$prenom', '$mail', '$mdpHache' )";

// $requete = $connexion->prepare($sql);

// $requete->execute([
//     ': nom'=>$nom,
//     ': prenom'=>$prenom,
//     ': mail'=>$mail,
//     ': pass'=>$mdpHache,
// ]);

header('Location: boites_idees.php');

// }



// ?>

<?php
if($_POST['inscrire']) {


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$erreur = '';

if (empty($nom) || empty($prenom) || empty($mail) || empty($pass)) {
    $erreur = "Tous les champs sont obligatoires";
    header('Location: inscription.php');
} else {
    $mdpHache = password_hash($pass, PASSWORD_DEFAULT);

    // Assumant que $connexion est votre objet de connexion à la base de données
    $sql = "INSERT INTO `Utilisateur` (`nom`, `prenom`, `mail`, `pass`) VALUES (?, ?, ?, ?)";
    
    $requete = $connexion->prepare($sql);

    $requete->execute([$nom, $prenom, $mail, $mdpHache]);

    header('Location: boites_idees.php');
}
}
?>
