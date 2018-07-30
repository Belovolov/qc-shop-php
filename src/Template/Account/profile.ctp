<?php
    $this->assign('title', 'Profile');
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
    <?= $this->Flash->render() ?>
    <?= $this->Form->create($user, ['url'=>['controller'=>'account', 'action'=>'profile'], 'id'=>'details']) ?>
        <div asp-validation-summary="ModelOnly" class="text-danger"></div>
        <input type="hidden" asp-for="Id" />
        <div class="row">
            <div class="col-md-4 pr-md-5 pl-md-4">
                <h4>Account</h4>
                <p>
                    Email: <em><?= $user['Email'] ?> </em>
                    <?php if ($user['EmailConfirmed']): ?>
                        <span class="badge badge-success">Confirmed</span>
                    <?php else: ?>
                        <span class="badge badge-secondary">Not confirmed</span>
                    <?php endif; ?>

                </p>
                <p>Username: <em><?= $user['UserName'] ?></em></p>
                <h4>Name</h4>
                <div class="form-group">
                    <?= $this->Form->control(
                        'FirstName',
                        ['readonly', 'class'=>"form-control", 'val'=> $user->FirstName]) ?>
                    <span asp-validation-for="FirstName" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control(
                        'LastName',
                        ['readonly', 'class'=>"form-control",'val'=>$user->LastName]) ?>
                    <span asp-validation-for="LastName" class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 px-md-5">
                <h4>Contact phones</h4>
                <div class="form-group">
                    <?= $this->Form->control('HomeNumber',['readonly', 'required'=>'false', 'class'=>"form-control",'val'=>$user->HomeNumber]) ?>                    
                </div>
                <div class="form-group">
                    <?= $this->Form->control('MobileNumber',['readonly', 'required'=>'false', 'class'=>"form-control",'val'=>$user->MobileNumber]) ?>                    
                </div>
                <div class="form-group">
                    <?= $this->Form->control('WorkNumber',['readonly', 'required'=>'false', 'class'=>"form-control",'val'=>$user->WorkNumber]) ?>                    
                </div>
            </div>

            <div class="col-md-4 px-md-4">
                <h4>Address</h4>
                <div class="form-group">
                    <?= $this->Form->control('AddressLine1',['readonly', 'class'=>"form-control",'val'=>$user->AddressLine1]) ?>
                    <span asp-validation-for="AddressLine1" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('AddressLine2',['readonly', 'class'=>"form-control",'val'=>$user->AddressLine2]) ?>
                    <span asp-validation-for="AddressLine2" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('City',['readonly', 'class'=>"form-control",'val'=>$user->City]) ?>
                    <span asp-validation-for="City" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('ZipCode',['readonly', 'class'=>"form-control",'val'=>$user->ZipCode]) ?>
                    <span asp-validation-for="ZipCode" class="text-danger"></span>
                </div>
            </div>
        </div>
                
        <div class="form-group">
            <button id="edit" type="button" class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</button>
            <button id="cancel" hidden type="button" class="btn btn-dark" >Cancel</button>
            <button id="save" hidden type="submit" class="btn btn-info" >Save</button>
        </div>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    window.unlocked = ("<?= $edit ?>" == "1")
</script>

<?= $this->Html->script('profile-switch', ['block' => 'scriptsBottom']) ?>