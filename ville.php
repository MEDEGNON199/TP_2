<?php
include "connexion.php";

// Récupérer tout les nom des villes 
$requete = "SELECT v.nom_ville, v.id_ville
            FROM ville v
            ORDER BY v.nom_ville ASC";

// Exécuter la requête
$execution = mysqli_query($connexion, $requete);

// Vérifier si la requête a échoué
if (!$execution) {
    die("Erreur dans la requête SQL : " . mysqli_error($connexion));
}

// Vérifier s'il y a des résultats
if (mysqli_num_rows($execution) == 0) {
    echo "<p>Aucune ville trouvée.</p>";
} else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des villes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="fixed-top mb-3">
        <?php include("menu.php"); ?>
    </div>

    <div class="container mt-5 pt-5">
        <h3 class="pt-3 mb-3 text-primary fw-bold">Liste de toutes les villes</h3>

        <!-- Alerte de succès pour suppression -->
        <?php if (isset($_GET['delete'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            ville supprimée avec succès !
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>ID Ville</th>
                    <th>Nom de la ville</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ville= mysqli_fetch_assoc($execution)): ?>
                <tr>
                    <td><?php echo $ville['id_ville']; ?></td>
                    <td><?php echo htmlspecialchars($ville['nom_ville']); ?></td>
                    
                    <td>
                        <a class="btn btn-warning btn-sm" href="modifier_ville.php?id=<?php echo $ville['id_ville']; ?>">
                            Modifier
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')" href="supprimer_ville.php?id=<?php echo $ville['id_ville']; ?>">
                            Supprimer
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>
