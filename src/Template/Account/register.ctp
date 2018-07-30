<?php 
    $this->assign('title', "Register"); 
?>
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4 offset-lg-4 offset-sm-3">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2 class="text-center">New User Signup</h2>
                    <?= $this->Form->create($user, ['url'=>['controller'=>'account', 'action'=>'register', 'redirect'=>$redirect]]) ?>                    
                        <?= $this->Flash->render('flash',['element'=>'login_error']) ?>
                        <div>
                            <?php if ($this->Form->isFieldError('Email')) 
                            {
                                echo $this->Form->error('Email');
                            }
                            ?>
                            <?= $this->Form->text('Email',[
                                'type' => 'email',
                                'class' => "form-control",
                                'placeholder' => "Email"
                                ]) ?>
                            
                        </div>
                        <div>
                            <?= $this->Form->text('UserName',[
                                'class' => "form-control",
                                'placeholder' => "Username (optional)"
                                ]) ?>
                        </div>

                        <?php if ($this->Form->isFieldError('MobileNumber')): ?>
                                <?= $this->Form->error('MobileNumber') ?>
                            <?php endif;?>
                            <?php if ($this->Form->isFieldError('HomeNumber')): ?>
                                <?= $this->Form->error('HomeNumber') ?>
                            <?php endif;?>
                            <?php if ($this->Form->isFieldError('WorkNumber')): ?>
                                <?= $this->Form->error('WorkNumber') ?>
                            <?php endif;?>
                        <div class="phone-input">
                            
                            <select name="PhoneType">
                                <option value="mobile"><i class="fas fa-mobile-alt"></i> Mobile</option>
                                <option value="home"><i class="fas fa-home"></i> Home</option>
                                <option value="work"><i class="fas fa-building"></i> Work</option>
                            </select>
                            <?= $this->Form->text('MobileNumber',[
                                'class' => "form-control",
                                'placeholder' => "Mobile number",
                                'id'=>'phonenumber'
                                ]) ?>
                        </div>
                        <div>
                            <?php if ($this->Form->isFieldError('PasswordHash')): ?>
                                <?= $this->Form->error('PasswordHash') ?>
                            <?php endif;?>
                            <?= $this->Form->password('PasswordHash',[
                                'class' => "form-control",
                                'placeholder' => "Password"
                            ]) ?>                            
                        </div>
                        <div>
                            
                            <?= $this->Form->password('PasswordConfirm',[
                                'class' => "form-control",
                                'placeholder' => "Confirm password"
                            ]) ?>
                        </div>
                        <button type="submit" class="mt-3 btn btn-success">Signup</button>
                    <?= $this->Form->end() ?>
                </div><!--/sign up form-->
            </div>            
        </div>
    </div>
</section><!--/form-->

<?= $this->Html->script('passwordConfirm', ['block' => 'scriptsBottom']) ?>