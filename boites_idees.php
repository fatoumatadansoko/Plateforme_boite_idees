<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boites à idées</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="container">
            <a href="ajouter.php">Ajouter une idée</a>
        </div>
        <table>
            <thead>

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "config.php";
//liste des utilisateurs
$sql =  "SELECT * FROM idees";
$result =mysqli_query($conn,$sql);
if (mysqli_num_rows($result) >0) {
    //Afficher les résultats
?>

                <tr>
                    <th>Categorie</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
<?php
                while($row = mysqli_fetch_assoc($result)) {
 ?>
                <tr>

                    <td><?=$row['categorie']?></td>
                    <td><?=$row['titre']?></td>
                    <td><?=$row['description']?></td>
                    <td><?=$row['statut']?></td>
                    <td class="image"> <a href="modifier.php?id=<?=$row['idee_id']?>"><img src="img/write.png" alt=""></a></td>
                    <td class="image"> <a href="supprimer.php?id=<?=$row['idee_id']?>"><img src="img/remove.png" alt=""></a></td>
                </tr>
 <?php
                }
                }
                else {
                   echo "<p class='message'>0 idée ajoutée !</p>"; 
                }
?>
            </tbody>
        </table>
    </main>
    
</body>
</html>