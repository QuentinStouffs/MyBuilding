<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">
        <h3>Liste des utilisateurs</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">email</th>
                <th scope="col">Immeuble</th>
                <th scope="col">N°Ap.</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $u ): ?>
                    <tr>
                            <th scope="row"><?= $u->__get('pk') ?></th>
                            <td><?= $u->__get('name') ?></td>
                            <td><?= $u->__get('email') ?></td>
                            <td><?= $u->__get('building') ?></td>
                            <td><?= $u->__get('appartment_number') ?></td>
                            <td><a href="/MyBuilding/ModifyUser?pk=<?= $u->__get('pk') ?>" class="btn btn-primary">Modifier</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>