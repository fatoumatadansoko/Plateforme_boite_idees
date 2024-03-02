<?php 
$idee_id = $_GET['id'];
include_once "config.php";
$sql = "DELETE FROM idees where idee_id = $idee_id";
if (mysqli_query($conn, $sql)) {
    header("location:boites_idees.php?message=DeleteSuccess");
}
else {
    header("location:boites_idees.php?message=DeleteFail"); 
}
?>