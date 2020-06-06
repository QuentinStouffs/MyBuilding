<main role="main" class="flex-shrink-0">
    <br>
    <br>
    <div class="container">
        <h3>Liste des immeubles</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $u ): ?>
                    <tr>
                            <th scope="row"><?= $u->__get('pk') ?></th>
                            <td><?= $u->__get('name') ?></td>
                            <td><a href="/MyBuilding/ModifyBuilding?pk=<?= $u->__get('pk') ?>" class="btn btn-primary">Modifier</a> <a href="/MyBuilding/ListBuildings?delete=<?= $u->__get('pk') ?>" class="btn btn-delete btn-danger">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>