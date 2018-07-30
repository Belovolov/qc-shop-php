<?php
    $this->assign('title', 'Checkout');
?>

<div class="page-content-wrapper">
    <div class="card mb-3">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title">Success</h5>
            <p class="card-text">Order has been successfully submitted. Our customer service will get in touch with you shortly to confirm the order.</p>
            <p class="card-text"> Meanwhile may be you have forgot to by something else?</p>
            <div>
                <?= $this->Html->link(
                    'Go shopping',
                    ['action' => 'index', 'controller'=>'home'],
                    ['class' => "btn btn-success"]) 
                ?>
                <?= $this->Html->link(
                    'Review my orders',
                    ['action' => 'orders', 'controller'=>'account'],
                    ['class' => "btn btn-primary"]) 
                ?>
            </div>
        </div>
    </div>
</div>