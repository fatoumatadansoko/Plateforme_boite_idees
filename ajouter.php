<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($categorie) && isset($titre) && isset($description) && $statut){
                //connexion à la base de donnée
                include_once "connexion1.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO Idees VALUES(NULL, '$categorie', '$titre','$description','$statut')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: boites_idees.php");
                }else {//si non
                    $message = "Idées  non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="boites_idees.php" class="back_btn"><img src="img/back.png"> Retour</a>
        <h2>Ajouter une idée</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Catégorie</label>
            <input type="text" name="categorie">
            <label>Titre</label>
            <input type="text" name="titre">
            <label>Description</label>
            <input type="text" name="description">
            <label>Statut</label>
            <input type="text" name="Statut">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>