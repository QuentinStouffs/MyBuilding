<table id="product-list">
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantité</th>
    </tr>
    <?php foreach($product_list as $product): ?>
        <tr>
            <td><?= $product->__get('name'); ?></td>
            <td><?= $product->__get('price'); ?></td>
            <td><?= $product->__get('quantity'); ?></td>
            <td>
                <form action="/routeur2/index/delete" method="post">
                    <input type="hidden" name="id" value="<?= $product->__get('pk'); ?>">
                    <input type="submit" class="delete-btn" name="delete" value="DELETE">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>