<?php $this->assign('title', 'Details'); ?>

<h2>Supplier details</h2>
<hr />
<div>
    
    <div class="row">
        <div class="col-md-4">
            <dl>
                <dt>
                    Name
                </dt>
                <dd>
                    <?= $supplier->Name ?>
                </dd>
                
                <dt>
                    Email
                </dt>
                <dd>
                    <?= $supplier->Email ?>
                </dd>
                
            </dl>
        </div>
        <div class="col-md-4">
            <dl>
                <dt>
                    Home Number
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->HomeNumber,'<em>None</em>') ?>
                </dd>
                <dt>
                    Work Number
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->WorkNumber,'<em>None</em>') ?>
                </dd>
                <dt>
                    Mobile Number
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->MobileNumber,'<em>None</em>') ?>
                </dd>
            </dl>
        </div>
        <div class="col-md-4">
            <dl>
                <dt>
                    Address line 1
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->AddressLine1,'<em>None</em>') ?>
                </dd>
                <dt>
                    Address line 2
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->AddressLine2,'<em>None</em>') ?>
                </dd>
                <dt>
                    City
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->City,'<em>None</em>') ?>
                </dd>
                <dt>
                    ZipCode
                </dt>
                <dd>
                    <?= decodeEmpty($supplier->ZipCode,'<em>None</em>') ?>
                </dd>
            </dl>
        </div>
    </div>
    
</div>
<div>
    <?= $this->Html->link('Back to List', ['action' => 'index']) ?>
</div>
