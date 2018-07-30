<?php 
    $this->assign('title', "Login"); 
?>
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 offset-md-2 offset-sm-0">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <?= $this->Form->create('', ['url'=>['controller'=>'account', 'action'=>'login', 'redirect'=>$redirect]]) ?>
                        
                        <?= $this->Flash->render('flash',['element'=>'login_error']) ?>
                        <div class="form-group">
                            <?= $this->Form->text('Email',[
                            'class' => "form-control",
                            'placeholder' => "Email",
                            'required'
                            ]) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->password('PasswordHash',[
                            'class' => "form-control",
                            'placeholder' => "Password",
                            'required'
                            ]) ?>
                        </div>
                        
                        <button type="submit" class="mt-3 btn btn-primary align-self-center">Login</button>
                    <?= $this->Form->end() ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-2 align-self-center">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4 align-self-center create-new">
                <?= $this->Html->link(
                    'Create new account', 
                    ['controller'=> 'account', 'action' => 'register', 'redirect'=>$redirect],
                    ['class'=>"btn btn-info"]) 
                ?> 
            </div>
        </div>
    </div>
</section><!--/form-->