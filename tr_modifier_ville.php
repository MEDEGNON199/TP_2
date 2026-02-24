<?php
include 'connexion.php';

if (isset($_POST['modifier'])) {

    $id = $_POST['id_Ville'];
    echo "ID de la ville : " . $id . "<br>"; // Debug: Vérification de l'ID reçu
    $nom = mysqli_real_escape_string($connexion, $_POST['nom_Ville']);
       
        $sql = "UPDATE ville SET nom_Ville='$nom' WHERE id_Ville=$id";
    } 
    if (mysqli_query($connexion, $sql)) {
        header("Location: ville.php");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
?>