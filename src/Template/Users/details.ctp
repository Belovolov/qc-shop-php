<?php
    $this->assign('title', 'Details');
?>

<div class="row mb-4">
    <div class="col-md-6 offset-md-3">
        <div class="order-summary order-block  p-3">
            <h4>Customer details</h4>
            <dl class="dl-horizontal">
                <dt>
                    Name
                </dt>
                <dd>
                    <?= decodeEmpty($user->FullName,'<em>None</em>') ?>
                </dd>
                <dt>
                    Address
                </dt>
                <dd>
                    <?= decodeEmpty($user->Address,'<em>None</em>') ?>
                </dd>
                <dt>
                    Email
                </dt>
                <dd>
                    <?= $user->Email ?>
                </dd>
                <dt>
                    MobileNumber
                </dt>
                <dd>
                    <?= decodeEmpty($user->MobileNumber,'<em>None</em>') ?>
                </dd>
                <dt>
                    HomeNumber
                </dt>
                <dd>
                    <?= decodeEmpty($user->HomeNumber,'<em>None</em>') ?>
                </dd>
                <dt>
                    WorkNumber
                </dt>
                <dd>
                    <?= decodeEmpty($user->WorkNumber,'<em>None</em>') ?>
                </dd>
                <dt>
                    Orders total
                </dt>
                <dd>
                    <?= count($user->orders) ?>
                </dd>
                <dt>
                    Orders waiting
                </dt>
                <dd>                    
                    <?= $waitingCount ?>
                </dd>

            </dl>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6 offset-md-3">
        <?= $this->Html->link(
            'Back to List',
            ['action' => 'index', 'controller'=>'users']) 
        ?>
    </div>
</div>
