<?php
include 'connexion.php';
echo "Connexion réussie !"; // Debug: Vérification de la connexion à la base de données

if (isset($_POST['submit'])) {

    $nom_Marche   = mysqli_real_escape_string($connexion, trim($_POST['nom_Marche']));
    $description = mysqli_real_escape_string($connexion, trim($_POST['description']));
    $capacite    = (int) $_POST['capacite'];
    $adresse     = mysqli_real_escape_string($connexion, trim($_POST['adresse']));
    $telephone   = mysqli_real_escape_string($connexion, trim($_POST['telephone']));
   echo "Nom du marché : " . $nom_Marche . "<br>";
    echo "Description : " . $description . "<br>"; 
    echo "Capacité : " . $capacite . "<br>";
    echo "Adresse : " . $adresse . "<br>";
    echo "Téléphone : " . $telephone . "<br>";
    // Gestion de l'image
    $chemin = "";
    $image = $_FILES['image']['name'];
    $extention = explode(".", $image);
    $vraiExtension = strtolower(end($extention));
    $tablrExt = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($vraiExtension, $tablrExt)) {
        $nomFichier     = date("Y-m-d") . "" . date("H-i-s");
        $vrainomFichier = $nomFichier . "." . $vraiExtension;
        $chemin         = "image/" . $vrainomFichier;
        $fichierTemp    = $_FILES['image']['tmp_name'];
        move_uploaded_file($fichierTemp, $chemin);
    }

    if (!empty($nom_Marche) && !empty($capacite)) {
        $requete = "INSERT INTO marche (nom_Marche, description, capacite, adresse, telephone, image)
                    VALUES ('$nom_Marche', '$description', '$capacite', '$adresse', '$telephone', '$chemin')";
        $execution = mysqli_query($connexion, $requete);

        if ($execution) {
            header("location: index.php");
        } else {
            echo "Erreur lors de l'insertion : " . mysqli_error($connexion);
        }
    } else {
        echo "Le nom du marché et la capacité sont obligatoires.";
    }
} else {
    header("location: create.php");
}
?>