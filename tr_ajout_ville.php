<?php
include 'connexion.php';

if (isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $nom_ville = mysqli_real_escape_string($connexion, trim($_POST['nom_ville']));
   
        echo "Nom de la ville : " . $nom_ville . "<br>";
    // Insertion dans la base de données
    $requete = "INSERT INTO ville (nom_ville)
                VALUES ('$nom_ville')";

    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: ajout_ville.php?success=1");
    } else {
        header("location: ajout_ville.php?error=1&msg=" . urlencode(mysqli_error($connexion)));
    }
} else {
    header("location: ajout_ville.php");
}
?>
