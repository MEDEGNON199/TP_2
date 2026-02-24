<?php
include 'connexion.php';

// Récupération sécurisée de l'ID passé en paramètre GET
$marche_id = (int) $_GET['id'];

echo "ID reçu : " . $marche_id; // Debug: Vérification de l'ID reçu
if ($marche_id > 0) {
    $requete = "DELETE FROM marche WHERE id_Marche = $marche_id";
    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: index.php");
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($connexion);
    }
} else {
        echo "ID de marché invalide.";
}
?>
