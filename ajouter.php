<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        $sql = "INSERT INTO idees (categorie, titre, description, statut) VALUES (?, ?, ?, ?)";
        
        // Utilisation de requête préparée pour éviter les injections SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $_POST['categorie'], $_POST['titre'], $_POST['description'], $_POST['statut']);
        
        if ($stmt->execute()) {
            header("location:boites_idees.php");
        } else {
            header("location:ajouter.php?message=AddFail");
        }
    } else {
        header("location:ajouter.php?message=EmptyFields");
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
    <form action="" method="post">
        <h1>Ajouter une idée</h1>
        <input type="text" name="categorie" value="" placeholder="categorie">
        <input type="text" name="titre" value="" placeholder="titre">
        <input type="text" name="description" value="" placeholder="description">
        <input type="text" name="statut" value="" placeholder="statut">
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="boites_idees.php">Annuler</a>
    </form>
</body>

</html>
