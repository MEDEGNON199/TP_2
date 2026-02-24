<?php
include 'connexion.php';





// Liste des marchés
$requete   = "SELECT * FROM marche ORDER BY id_Marche DESC";
$execution = mysqli_query($connexion, $requete);
?>
<?php include 'menu.php'; ?>
<div class="container mt-4">
    <h4 class="text-success fw-bold mb-4">Liste des Marchés du Bénin</h4>


   

    <!-- Liste des cartes -->
    <?php if (mysqli_num_rows($execution) > 0): ?>
    <div class="row">
        <?php while ($marche = mysqli_fetch_assoc($execution)): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="<?php echo $marche['image']; ?>"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;"
                     alt="<?php echo $marche['nom_Marche']; ?>">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">
                        <?php echo htmlspecialchars($marche['nom_Marche']); ?>
                    </h5>
                    <p class="card-text">
                        Capacité : <?php echo $marche['capacite']; ?> places
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="modifier.php?id=<?php echo $marche['id_Marche']; ?>"
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>
                        <a href="tr_supprimer.php?id=<?php echo $marche['id_Marche']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Voulez-vous supprimer ce marché ?')">
                            Supprimer
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
     <?php else: ?>
           <p class="text-center text-muted">Aucun marché disponible.</p>
        <?php endif; ?>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>