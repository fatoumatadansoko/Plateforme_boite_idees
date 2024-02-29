<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boites à idées</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <a href="ajouter.html" class="Btn_add"> <img src="img/plus.png" alt="">Ajouter</a>


        <table>
            <tr>
                
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "boites_idees.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM Utilisateur");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['titre']?></td>
                            <td><?=$row['categorie']?></td>
                            <td><?=$row['description']?></td>
                            <td><?=$row['statut']?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="img/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="img/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
        </table>
    </div>
</body>
</html>