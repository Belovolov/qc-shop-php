<?php $this->assign('title', 'Index'); ?>

<div class="page-content-wrapper">
    <h2>Customer Details</h2>
    <p>Please, verify and correct present information and add missing</p>
    <row>
        <div class="col-md-6 offset-md-3">
            <?= $this->Form->create($customer,['url'=>'/orders/ConfirmDetails','method'=>'post']) ?>
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                <input type="hidden" asp-for="Id" />
                <div class="form-group">
                    <?= $this->Form->control("FirstName", ['class'=>"form-control"]) ?>
                    <span asp-validation-for="FirstName" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("LastName", ['class'=>"form-control"]) ?>
                    <span asp-validation-for="LastName" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("HomeNumber", ['class'=>"form-control",'required'=>'false',]) ?>
                    <span asp-validation-for="HomeNumber" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("MobileNumber", ['class'=>"form-control",'required'=>'false',]) ?> 
                    <span asp-validation-for="MobileNumber" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("WorkNumber", ['class'=>"form-control",'required'=>'false',]) ?>
                    <span asp-validation-for="WorkNumber" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("AddressLine1", ['class'=>"form-control"]) ?>
                    <span asp-validation-for="AddressLine1" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("AddressLine2", ['class'=>"form-control"]) ?>
                    <span asp-validation-for="AddressLine2" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("City", ['class'=>"form-control"]) ?>
                    <span asp-validation-for="City" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control("ZipCode", ['class'=>"form-control"]) ?>
                    <span asp-validation-for="ZipCode" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->button("Save&Proceed", ['class'=>"btn btn-info", 'type'=>'submit']) ?>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </row>
</div>
