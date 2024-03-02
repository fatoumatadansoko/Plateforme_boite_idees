<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$idee_id = $_GET['id'];
if (isset($_POST['send'])) {
if (
    isset($_POST['categorie']) &&
    isset($_POST['titre']) &&
    isset($_POST['description']) &&
    isset($_POST['statut']) &&
    $_POST['categorie'] != "" &&
    $_POST['titre'] != "" &&
    $_POST['description'] != "" &&
    $_POST['statut'] != ""
) {

        include_once "config.php";
        extract($_POST);

        $sql = "UPDATE idees SET categorie = '$categorie' , titre = '$titre' , description = '$description' , statut = '$statut' WHERE idee_id = $idee_id";

        if (mysqli_query($conn, $sql)) {
            header("location:boites_idees.php");
        } else {
            header("location:boites_idees.php?message=ModifyFail");
        }
        }  else {
            header("location:boites_idees.php?message=EmptyFields");
            
        }
        }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include_once "config.php";


    //liste des infos utilisateurs
    $sql = "SELECT * FROM idees where idee_id = $idee_id";
    $result = mysqli_query($conn, $sql);
    //output dataofeach row
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <form action="" method="post">
            <h1>Modifier une idée</h1>
            <input type="text" name="categorie" value="<?= $row['categorie'] ?>" placeholder="categorie">
            <input type="text" name="titre" value="<?= $row['titre'] ?>" placeholder="titre">
            <input type="text" name="description" value="<?= $row['description'] ?>" placeholder="description">
            <input type="text" name="statut" value="<?= $row['statut'] ?>" placeholder="statut">
            <input type="submit" value="Modifier" name="send">
            <a class="link back" href="boites_idees.php">Annuler</a>
        </form>
    <?php
    }
    ?>
</body>

</html>