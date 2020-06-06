<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">
        <?php
        if (isset($data) && isset($data['success'])) :?>
            <h3 class="color-success">Nouvel immeuble enregistré</h3>
        <?php endif;
        if (isset($data) && isset($data['fail'])) :
            ?>
            <h3 class="color-danger"><?= $data['fail'] ?></h3>
        <?php endif; ?>
        <form method="post">
            <p class="lead">Nouveau Building</p>
            <input type="hidden" name="create" value="create">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</main>
