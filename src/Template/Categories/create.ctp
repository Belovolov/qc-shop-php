<h2>Create category</h2>
<hr />
<div class="row">
    <div class="col-md-4">
        <?= $this->Form->create($category) ?>
            <div class="form-group">
                    <label for="Name" class="control-label"></label>
                    <?= $this->Form->control('Name',['class' => "form-control"]) ?>
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