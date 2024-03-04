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

        // Utilisation d'une requête préparée
        $sql = "UPDATE idees SET categorie = ?, titre = ?, description = ?, statut = ? WHERE idee_id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Liaison des paramètres
        mysqli_stmt_bind_param($stmt, "ssssi", $categorie, $titre, $description, $statut, $idee_id);

        // Exécution de la requête préparée
        if (mysqli_stmt_execute($stmt)) {
            header("location:boites_idees.php");
        } else {
            header("location:boites_idees.php?message=ModifyFail");
        }
    } else {
        header("location:boites_idees.php?message=EmptyFields");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une idée</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include_once "config.php";

    // Liste des infos utilisateurs
    $sql = "SELECT * FROM idees WHERE idee_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idee_id);
    mysqli_stmt_execute($stmt);

    // Récupération des résultats
    $result = mysqli_stmt_get_result($stmt);

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <form action="" method="post">
            <h1>Modifier une idée</h1>
            <input type="text" name="categorie" value="<?= $row['categorie'] ?>" placeholder="Categorie">
            <input type="text" name="titre" value="<?= $row['titre'] ?>" placeholder="Titre">
            <input type="text" name="description" value="<?= $row['description'] ?>" placeholder="Description">
            <input type="text" name="statut" value="<?= $row['statut'] ?>" placeholder="Statut">
            <input type="submit" value="Modifier" name="send">
            <a class="link back" href="boites_idees.php">Annuler</a>
        </form>
    <?php
    }
    ?>
</body>

</html>
