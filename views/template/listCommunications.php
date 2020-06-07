<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">
        <h1>Communications immeuble <?= $data[0]->building->name; ?></h1>
        <?php foreach ($data as $d): ;?>
            <div class="jumbotron">
                <h2><?= $d->title ?></h2>
                <h3><?= $d->date ?></h3>
                <p class="lead"><?= $d->text ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>