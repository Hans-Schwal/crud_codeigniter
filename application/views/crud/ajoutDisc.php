<h1>Ajout</h1>    

<hr>
<?php echo validation_errors(); ?> 
<hr>
    <form action="<?= site_url("crud/ajoutDisc"); ?>" method="POST">
    <?php echo form_open_multipart(); ?> 
    <label for="title">Title: </label>
    <input type="text" name="disc_title" value="<?= set_value('disc_title', '') ?>"><br>
    <label for="year">Year: </label>
    <input type="text" name="disc_year" value="<?= set_value('disc_year', '') ?>"><br>
    <label for="picture">Picture: </label>
    <input type="file" name="disc_picture" value="<?= set_value('disc_picture', '') ?>"><br>
    <label for="label">Label: </label>
    <input type="text" name="disc_label" value="<?= set_value('disc_label', '') ?>"><br>
    <label for="genre">Genre: </label>
    <input type="text" name="disc_genre" value="<?= set_value('disc_genre', '') ?>"><br>
    <label for="price">Price: </label>
    <input type="text" name="disc_price" value="<?= set_value('disc_price', '') ?>"><br>

        <input type="submit" value="Ajouter">
    </form>
