<h1>Liste</h1>    

<hr>

<a href="<?= site_url("crud/ajout") ?>" class="btn btn-success">Ajouter</a>

<?php foreach($liste as $artist): ?>

    <div>
        <?= $artist->artist_name ?><br>
        <a href="<?= site_url("crud/detail/") . $artist->artist_id ?>" class="btn btn-primary">
            Details
        </a>
        <a href="<?= site_url("crud/modif/") . $artist->artist_id ?>" class="btn btn-warning">
            modif
        </a>
        <a href="<?= site_url("crud/supprim/") . $artist->artist_id ?>" class="btn btn-danger">
            supprimer
        </a>
    </div>

<?php endforeach; ?>