<?php $this->assign('title', 'Details'); ?>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="order-summary order-block  p-3">
            <h4>Order summary</h4>
            <dl class="dl-horizontal">
                <dt>
                    Status
                </dt>
                <dd>
                    <?= $order->Status ?>
                </dd>
                <dt>
                    Date
                </dt>
                <dd>
                    <?= $order->Date ?>
                </dd>
                <dt>
                    Subtotal
                </dt>
                <dd>
                    $<?= $order->Subtotal ?>
                </dd>
                <dt>
                    GST
                </dt>
                <dd>
                    <?= $order->GST ?>%
                </dd>
                <dt>
                    GrandTotal
                </dt>
                <dd>
                    $<?= $order->GrandTotal ?>
                </dd>
                <dt>
                    Customer                     
                </dt>
                <dd>
                    <?= $order->user->FullName ?>
                    <?= $this->Html->link(
                        'More details', 
                        ['controller'=> 'users', 'action' => 'details', $order->CustomerID ],
                        ['escapeTitle' => false, 'target'=>"_blank", 'rel'=>"nofollow nofollow"]) 
                    ?>
                </dd>
                <dt>
                    Delivery address
                </dt>
                <dd>
                    <?= $order->user->Address ?>
                </dd>
            </dl>
        </div>
    </div>
    <div class="col-md-6">
        <div class="order-items order-block p-3">
            <h4>Order items</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order->order_items as $order_item): ?>
                    <tr>
                        <td>
                            <?= $order_item->item->Name ?>
                        </td>
                        <td>
                            $<?= $order_item->item->Price ?>
                        </td>
                        <td>
                            <img src="<?= $order_item->item->ImageUrl ?>" asp-append-version="true" width="80" />
                        </td>
                        <td>
                            <?= $order_item->Quantity ?>
                        </td>
                        <td>
                            $<?= $order_item->Quantity * $order_item->item->Price ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
    </div>
</div>

<div>
    <?= $this->Html->link(
        'Back to List', 
        ['controller'=> 'orders', 'action' => 'index']) 
    ?>   
</div>
