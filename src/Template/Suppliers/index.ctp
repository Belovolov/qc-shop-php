<?php $this->assign('title', 'Suppliers'); ?>
<?= $this->Flash->render() ?>

<h2>Suppliers</h2>
<p>
    <?= $this->Html->link('Create new', ['action' => 'create']) ?>
</p>
<table class="table">
    <thead>
        <tr>
            <th>
                Name
            </th>
            <th>
                HomeNumber
            </th>
            <th>
                WorkNumber
            </th>
            <th>
                MobileNumbe
            </th>
            <th>
                Email
            </th>
            <th>
                City
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($suppliers as $supplier): ?>
        <tr>
            <td>
                <?= $supplier->Name ?>
            </td>
            <td>
                <?= $supplier->HomeNumber ?>
            </td>
            <td>
                <?= $supplier->WorkNumber ?>
            </td>
            <td>
                <?= $supplier->MobileNumber ?>
            </td>
            <td>
                <?= $supplier->Email ?>
            </td>
            <td>
                <?= $supplier->City ?>
            </td>
            <td>
                <?= $this->Html->link('Details', ['action' => 'details', $supplier->SupplierId]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


