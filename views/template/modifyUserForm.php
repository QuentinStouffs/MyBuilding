<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">

        <form method="post">
            <p class="lead">Modifier l'utilisateur</p>
            <input type="hidden" name="modify" value="modify">
            <input type="hidden" name="pk" value="<?= $data['user']->__get('pk') ?>">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $data['user']->__get('name') ?>">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $data['user']->__get('email') ?>">
            </div>
            <div class="form-group">
                <label for="appartment_number">Numéro d'appartement</label>
                <input type="text" class="form-control" name="appartment_number" id="appartment_number" value="<?= $data['user']->__get('appartment_number') ?>">
            </div>

            <div class="form-group">
                <label for="building">Immeuble</label>
                <select class="form-control" id="building" name="FK_building">
                    <?php foreach ($data['buildings'] as $g): ?>
                        <option value="<?= $g->__get('pk') ?>" <?= $data['user']->__get('building') == $g->__get('pk') ? "selected" : ''?> ><?= $g->__get('name') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="checkPassword">Répéter Password</label>
                <input type="password" name="checkPassword" class="form-control" id="checkPassword">
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</main>