<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">

        <form method="post">
            <p class="lead">Modifier l'immeuble</p>
            <input type="hidden" name="modify" value="modify">
            <input type="hidden" name="pk" value="<?= $data->__get('pk') ?>">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $data->__get('name') ?>">
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</main>