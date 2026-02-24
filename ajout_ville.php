<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une ville</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="fixed-top mb-3">
        <?php include('menu.php'); ?>
    </div>

    <div class="container mt-5 pt-5">
        <h4 class="pt-3 mb-3 text-primary fw-bold">Ajouter une nouvelle ville</h4>

        <!-- Alerte de succès -->
        <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            Ville ajoutée avec succès !
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <!-- Alerte d'erreur -->
        <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            Une erreur est survenue. Veuillez réessayer.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <!-- Formulaire d'ajout -->
        <form action="tr_ajouter_ville.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-bold">Nom de la ville</label>
                <input type="text" class="form-control" name="nom_ville" placeholder="Ex: Cotonou" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter la ville</button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
