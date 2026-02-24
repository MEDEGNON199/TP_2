<?php

include 'connexion.php';

// 1. Récupération des données actuelles du marché
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connexion, $_GET['id']);
    $query = "SELECT * FROM marche WHERE id_Marche = '$id'";
    $resultat = mysqli_query($connexion, $query);
    $marche = mysqli_fetch_assoc($resultat);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Marché</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h3>Modifier les informations du marché</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="tr_modifier.php">
                    <input type="hidden" name="id_Marche" value="<?php echo $marche['id_Marche']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nom du Marché</label>
                        <input type="text" name="nom_Marche" class="form-control" value="<?php echo $marche['nom_Marche']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Capacité (places)</label>
                        <input type="number" name="capacite" class="form-control" value="<?php echo $marche['capacite']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" name="adresse" class="form-control" value="<?php echo $marche['adresse']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="telephone" class="form-control" value="<?php echo $marche['telephone']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image actuelle :</label> 
                        <div>
                            <img src="<?php echo $marche['image']; ?>" alt="Image du marché" style="max-width: 200px; max-height: 150px;">
                        </div>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Laissez vide pour conserver l'image act²uelle.</small>
                    </div>

                    <button type="submit" name="modifier" class="btn btn-success w-100">Enregistrer les modifications</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
