
<h1>page1</h1>    

<hr>


<?php foreach($liste as $artist): ?>

    <div>
        <?= $artist->artist_name ?>
    </div>

<?php endforeach; ?>