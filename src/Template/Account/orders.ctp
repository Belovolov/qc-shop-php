<?php
    $this->assign('title', 'My orders');
    $action = $this->request->getParam('action');
?>
<div class="page-content-wrapper">
    <ul class="nav nav-tabs mt-3 mb-3">
        <li class="nav-item">
            <?= $this->Html->link(
                'Profile details', 
                ['action'=>'profile'], 
                ['class'=>"nav-link ".($action == "profile" ? "active" : "" )]) 
            ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(
                'My orders', 
                ['action'=>'orders'], 
                ['class'=>"nav-link ".($action == "orders" ? "active" : "" )]) 
            ?>
        </li>
    </ul>
    <!-- <h2 class="pl-2">My orders</h2> -->
    <?php if ($orders->count()>0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        OrderID
                    </th>
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
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td>
                            <?= $order->OrderID ?>
                        </td>
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
                            $<?= $order->Subtotal ?>
                        </td>
                        <td>
                            <?= $order->GST ?>%
                        </td>
                        <td>
                            $<?= $order->GrandTotal ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center flex-column">
                <h5 class="card-title">No orders yet</h5>
                <p class="card-text">Go to the catalogue and make your first order!</p>
                <?= $this->Html->link(
                    'Go shopping', 
                    ['action'=>'index', 'controller'=>'home'], 
                    ['class'=>"btn btn-success"]) 
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>
