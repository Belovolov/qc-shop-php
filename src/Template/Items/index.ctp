<?php $this->assign('title', 'Index'); ?>
<?= $this->Flash->render() ?>
<h2>Items</h2>

<p>
    <?= $this->Html->link('Create new', ['action' => 'create']) ?>
</p>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Arrival Date</th>
            <th>Gender</th>
            <th>Category</th>
            <th>Supplier</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td>
                <?= $item->Name ?>
            </td>
            <td>
                <?= $item->Description ?>
            </td>
            <td>
                $<?= $item->Price ?>
            </td>
            <td>
                <img src="<?= $item ->ImageUrl?>" asp-append-version="true" width="100" />
            </td>
            <td>
                <?= $item->ArrivalDate->i18nFormat('dd/MM/YYYY') ?>
            </td>
            <td>
                <?= $item->Gender ?>
            </td>
            <td>
                <!-- @Html.DisplayFor(modelItem => item.Category.Name) -->
                <?= $item->category->Name ?>
            </td>
            <td>
                <?= $item->supplier->Name ?>
            </td>
            <td>
                <!-- <a asp-action="Edit" asp-route-id="@item.ItemId">Edit</a> | -->
                <?= $this->Html->link('Details', ['action' => 'details', $item->ItemId]) ?>
                <!-- <a asp-action="Delete" asp-route-id="@item.ItemId" class="text-danger"><i class="fa fa-times"></i></a> -->
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
