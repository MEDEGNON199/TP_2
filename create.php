<?php include 'menu.php'; ?>
<div class="container mt-4">
    <h4 class="text-success fw-bold mb-4">Ajouter un nouveau Marché</h4>
    <form action="tr_create.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label fw-bold">Nom du marché *</label>
            <input type="text" class="form-control" name="nom_Marche"
                   placeholder="Nom du marché" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Description *</label>
            <textarea class="form-control" name="description"
                      placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Nom du groupe</label>
            <input type="text" class="form-control" name="nomGroupe"
                   placeholder="Nom du groupe">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Capacité du marché *</label>
            <input type="number" class="form-control" name="capacite"
                   placeholder="Capacité du marché" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Adresse</label>
            <input type="text" class="form-control" name="adresse"
                   placeholder="Adresse">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Téléphone</label>
            <input type="text" class="form-control" name="telephone"
                   placeholder="Téléphone">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-success" name="submit">
            Ajouter
        </button>
    </form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>