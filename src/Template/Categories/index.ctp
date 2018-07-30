<h2>Categories</h2>

<?= $this->Flash->render('flash') ?>
<p>
    <?= $this->Html->link('Create new', ['action' => 'create']) ?>
</p>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td>
                    <?= $category->Name ?>
                </td>
                <td>
                    <?= $this->Html->link('Details', ['action' => 'details', $category->CategoryId]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

