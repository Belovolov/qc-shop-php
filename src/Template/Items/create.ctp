<h2>Create item</h2>
<hr />

<div class="row">
    <div class="col-md-4">
        <!-- <form enctype="multipart/form-data" action="Create" method="POST"> -->
        <?= $this->Form->create($item, ['enctype'=>'multipart/form-data']) ?>
            <div asp-validation-summary="ModelOnly" class="text-danger"></div>
            <div class="form-group">
                <?= $this->Form->control('Name',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('Description',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('Price',['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <label for="imageFile" class="control-label">Update image:</label>
                <input type="file" accept="image/*" name="imageFile" />
                <?= $this->Form->control('ImageUrl',['class' => "form-control", 'type' => 'hidden']) ?>
                <!-- <= $this->Form->control('ImageUrl', ['type' => 'file']); ?> -->
            </div>
            <div class="form-group">
                <?= $this->Form->control('Gender', [
                    'options'=>['Men'=>'Men','Women'=>'Women','Unisex'=>'Unisex'], 
                    'class' => "form-control"]) ?>
            </div>
            <!-- <div class="form-group">
                <= $this->Form->date('ArrivalDate',['class' => "form-control"]) ?>
            </div> -->
            <div class="form-group">                
                <?= $this->Form->control('SupplierId', ['options' => $suppliers, 'class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('CategoryId', ['options' => $categories, 'class'=>'form-control']); ?>
            </div>
            <div class="form-group mt-2">
                <?= $this->Html->link(
                    'Cancel',
                    ['action' => 'index'], 
                    ['class' => 'btn btn-dark']) 
                ?>
                <?= $this->Form->button(__('Create'),['class'=>'btn btn-info']) ?>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>