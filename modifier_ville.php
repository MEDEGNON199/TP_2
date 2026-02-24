<?php

include 'connexion.php';

// 1. Récupération des données actuelles du marché
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connexion, $_GET['id']);
    $query = "SELECT * FROM ville WHERE id_Ville = '$id'";
    $resultat = mysqli_query($connexion, $query);
    $ville = mysqli_fetch_assoc($resultat);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Ville</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h3>Modifier les informations de la ville</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="tr_modifier_ville.php">
                    <input type="hidden" name="id_Ville" value="<?php echo $ville['id_Ville']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nom de la Ville</label>
                        <input type="text" name="nom_Ville" class="form-control" value="<?php echo $ville['nom_Ville']; ?>" required>
                    </div>

                    

                    <button type="submit" name="modifier" class="btn btn-success w-100">Enregistrer les modifications</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
