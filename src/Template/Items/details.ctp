<?php $this->assign('title', 'Details'); ?>

<h2>Item details</h2>

<div>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Name
        </dt>
        <dd>
            <?= $item['Name'] ?>
        </dd>
        <dt>
            Description
        </dt>
        <dd>
            <?= decodeEmpty($item->Description,'<em>None</em>') ?>
        </dd>
        <dt>
            Price
        </dt>
        <dd>
            $<?= $item->Price ?>
        </dd>
        <dt>
            Arrival Date
        </dt>
        <dd>
            <?= $item->ArrivalDate->i18nFormat('yyyy-MM-dd') ?>
        </dd>
        <dt>
            Image
        </dt>
        <dd>
            <?php if (empty($item->ImageUrl)):?>
                <em>None</em>
            <?php else: ?>
                <img src="<?= $item->ImageUrl ?>" width="150"/>
            <?php endif; ?>
        </dd>
        <dt>
            Gender
        </dt>
        <dd>
            <?= $item->Gender ?>
        </dd>
        <dt>
            Category
        </dt>
        <dd>
            <?= $item-> category -> Name ?>
        </dd>
        <dt>
            Supplier
        </dt>
        <dd>
            <?= $item -> supplier -> Name ?>
        </dd>
    </dl>
</div>
<div>
    <?= $this->Html->link('Back to List', ['action' => 'index']) ?>
</div>