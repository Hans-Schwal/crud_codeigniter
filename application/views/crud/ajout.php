
<h1>Ajout</h1>    

<hr>
<?php echo validation_errors(); ?>
<hr>

    <form action="<?= site_url("crud/ajout") ?>" method="POST">
    <input type="text" name="artist_name" value="<?= set_value('artist_name', '') ?>"><br>
    <input type="text" name="artist_url" value="<?= set_value('artist_url', '') ?>"><br>

        <input type="submit" value="Ajouter">
    </form>

