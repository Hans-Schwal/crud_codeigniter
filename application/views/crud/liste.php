
<h1>Liste</h1>    

<hr>

<a href="<?= site_url("crud/ajout") ?>" class="btn btn-primary">Ajouter</a>

<?php foreach($liste as $artist): ?>

    <div>
        <?= $artist->artist_name ?>
        <a href="<?= site_url("crud/detail/") . $artist->artist_id ?>">
            Detail
        </a>
        <a href="<?= site_url("crud/modif/") . $artist->artist_id ?>">
            modif
        </a>
    </div>

<?php endforeach; ?>