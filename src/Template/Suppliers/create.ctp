<h2>Create supplier</h2>
<hr />
<!-- <form action="Create" method="POST"> -->
<?= $this->Form->create($supplier) ?>
    <div class="row">
        <div class="col-md-4 pr-md-5 pl-md-4">
            <h4>Name</h4>
            <div class="form-group">
                <?= $this->Form->control('Name',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('Email',['class' => "form-control", 'type'=>'email']) ?>
            </div>
        </div>
        <div class="col-md-4 px-md-5">
            <h4>Contact phones</h4>
            <div class="form-group">
                <?= $this->Form->control('HomeNumber',['class' => "form-control", 'required'=>'false']) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('MobileNumber',['class' => "form-control", 'required'=>'false']) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('WorkNumber',['class' => "form-control", 'required'=>'false']) ?>
            </div>
        </div>

        <div class="col-md-4 px-md-4">
            <h4>Address</h4>
            <div class="form-group">
                <?= $this->Form->control('AddressLine1',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('AddressLine2',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('City',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('ZipCode',['class' => "form-control"]) ?>
            </div>
        </div>
    </div>

    <div class="form-group ml-2">
        <?= $this->Html->link(
            'Cancel',
            ['action' => 'index'], 
            ['class' => 'btn btn-dark']) 
        ?>
        <button id="save" type="submit" class="btn btn-info">Save</button>
    </div>
<?= $this->Form->end() ?>