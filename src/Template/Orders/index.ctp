<?php $this->assign('title', 'Index'); ?>

<h2>Orders</h2>
<div class="my-2">
    <label for="status">Select status filter</label>
    <?= $this->Form->select("status", ["All", "Waiting", "Shipped"], ['id'=>'status', 'val'=>$status]) ?>
</div>
<table class="table">
    <thead>
        <tr>
            <th>
                Status
            </th>
            <th>
                Date
            </th>
            <th>
                Subtotal
            </th>
            <th>
                GST
            </th>
            <th>
                GrandTotal
            </th>
            <th>
                Customer Name
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order):?>
            <tr>
                <td>
                    <?php if ($order->Status == "Shipped"): ?>
                        <span class="badge badge-success">Shipped</span>
                    <?php else: ?>
                        <span class="badge badge-warning">Waiting</span>
                    <?php endif;?>
                </td>
                <td>
                    <?= $order->Date ?>
                </td>
                <td>
                    <?= $order->Subtotal ?>
                </td>
                <td>
                    <?= $order->GST ?>%
                </td>
                <td>
                    <?= $order->GrandTotal ?>
                </td>
                <td>
                    <?= $this->Html->link(
                        $order->user->FullName,
                        ['action' => 'details', 'controller'=>'users', $order->CustomerID]) 
                    ?>
                </td>
                <td>
                    <?php if ($order->Status == "Shipped"):?>                    
                        <span class="text-secondary">Mark as shipped</span>                    
                    <?php else: ?>
                        <?= $this->Html->link(
                            'Mark as shipped',
                            ['action' => 'MarkShipped', $order->OrderID]) 
                        ?>
                <?php endif; ?>
                    |
                    <?= $this->Html->link(
                        'Details',
                        ['action' => 'details', $order->OrderID]) 
                    ?> |
                    <!-- <a asp-action="Delete" asp-route-id="@item.OrderID" class="text-danger"><i class="fa fa-times"></i></a> -->
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->script('orderFiltering', ['block' => 'scriptsBottom']) ?>