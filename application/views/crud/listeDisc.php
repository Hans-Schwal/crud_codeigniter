<h1>Liste</h1>    

<hr>

<a href="<?= site_url("crud/ajoutDisc") ?>" class="btn btn-success">Ajouter</a>

<?php foreach($listeDisc as $disc): ?>

    <div>
        <?= $disc->disc_title ?><br>
        <?= $disc->disc_year ?><br>
        <?= $disc->disc_picture ?><br>
        <img src="./images/<?= $disc->disc_picture?>" style="width: 150px;"><br>
        <?= $disc->disc_label ?><br>
        <?= $disc->disc_genre ?><br>
        <?= $disc->disc_price ?><br>
        <a href="<?= site_url("crud/detailDisc/") . $disc->disc_id ?>" class="btn btn-primary">
            Details
        </a>
        <a href="<?= site_url("crud/modifDisc/") . $disc->disc_id ?>" class="btn btn-warning">
            modif
        </a>
        <a href="<?= site_url("crud/supprimDisc/") . $disc->disc_id ?>" class="btn btn-danger">
            supprimer
        </a>
    </div>

<?php endforeach; ?>