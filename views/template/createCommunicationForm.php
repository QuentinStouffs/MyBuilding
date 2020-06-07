<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">
        <?php
        if (isset($data) && isset($data['success'])) :?>
            <h3 class="color-success">Communication enregistré</h3>
        <?php endif;
        if (isset($data) && isset($data['fail'])) :
            ?>
            <h3 class="color-danger"><?= $data['fail'] ?></h3>
        <?php endif; ?>
        <form method="post">
            <p class="lead">Entrez vos données</p>
            <input type="hidden" name="create" value="create">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="title" id="titre">
            </div>
            <div class="form-group">
                <label for="building">Immeuble</label>
                <select class="form-control" id="building" name="FK_building">
                    <?php foreach ($data['buildings'] as $g): ?>
                        <option value="<?= $g->__get('pk') ?>"><?= $g->__get('name') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="text"></label>
                <textarea class="form-control" id="text" name="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</main>