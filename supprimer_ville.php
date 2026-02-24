<?php
include 'connexion.php';

// Récupération sécurisée de l'ID passé en paramètre GET
$ville_id = (int) $_GET['id'];

echo "ID reçu : " . $ville_id; // Debug: Vérification de l'ID reçu
if ($ville_id > 0) {
    $requete = "DELETE FROM ville WHERE id_ville = $ville_id";
    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: ville.php?delete=1");
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($connexion);
    }
} else {
        echo "ID de ville invalide.";
}
?>
