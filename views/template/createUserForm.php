<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">
        <?php
            if (isset($data) && isset($data['success'])) :?>
            <h3 class="color-success">Utilisateur enregistré</h3>
        <?php endif;
            if (isset($data) && isset($data['fail'])) :
        ?>
            <h3 class="color-danger"><?= $data['fail'] ?></h3>
        <?php endif; ?>
        <form method="post">
            <p class="lead">Entrez vos données</p>
            <input type="hidden" name="create" value="create">
            <input type="hidden" name="role" value="resident">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
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
                <label for="appartment_number">Numéro d'appartement</label>
                <input type="text" class="form-control" name="appartment_number" id="appartment_number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="checkPassword">Password</label>
                <input type="password" name="checkPassword" class="form-control" id="checkPassword">
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</main>