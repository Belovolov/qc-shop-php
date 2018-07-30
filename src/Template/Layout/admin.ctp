<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $this->fetch('title') ?></title>
    <base href='/'/>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css" />    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?= $this->Html->css('admin') ?>
    <?= $this->Html->css('dropdown') ?>
    <?= $this->Html->css('site') ?>    
</head>
<body>
    <?php 
        $session = $this->request->getSession();
        $user_data = $session->read('Auth.User');
        $controller = $this->request->getParam('controller');
    ?>
    <nav class="nav-main">
        <div class="nav-block nav-logo" style="justify-content: flex-start;">
            <?= $this->Html->link(
                '<img src="img/logo-qc.png" alt="logo" />',
                ['controller'=>'home', 'action'=>'index'], ['escapeTitle'=>false])
            ?>
        </div>
        <div class="nav-block nav-header">
            <?= $this->Html->link('Administation panel', ['controller'=> 'home', 'action' => 'admin'],['style' => "font-size: 3vw;"]) ?>               
        </div>
        <div class="nav-block nav-user-actions">
            <div class="nav-item dropdown">
                <p class="welcome pb-3 pt-3"><?= $user_data["UserName"] ?> <i class="fas fa-angle-down"></i></p>
                <div class="dropdown-content dropdown-content-to-right">                    
                    <?= $this->Html->link(
                        '<i class="fa fa-users"></i> View customer area', 
                        ['controller'=> 'home', 'action' => 'index'],
                        ['escapeTitle' => false]) 
                    ?>
                    <hr class="m-0" />
                    <?= $this->Html->link(
                        '<i class="fas fa-sign-out-alt"></i> Log off', 
                        ['controller'=> 'account', 'action' => 'logoff'],
                        ['escapeTitle' => false]) 
                    ?>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="body-content">
        <div class="page-content-wrapper">
            <ul class="nav nav-tabs mt-3 mb-3 justify-content-center">
                <li class="nav-item">                    
                    <?= $this->Html->link(
                        '<i class="fas fa-sitemap"></i> Categories', 
                        ['controller'=> 'categories', 'action' => 'index'],
                        ['class' => "nav-link".($controller=='Categories' ? ' active':'') , 'escapeTitle' => false]) ?>
                </li>                
                <li class="nav-item">
                    <?= $this->Html->link(
                        '<i class="fas fa-truck"></i> Suppliers', 
                        ['controller'=> 'suppliers', 'action' => 'index'],
                        ['class' => "nav-link".($controller=='Suppliers' ? ' active':''), 'escapeTitle' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        '<i class="fab fa-pied-piper-hat"></i> Items', 
                        ['controller'=> 'items', 'action' => 'index'],
                        ['class' => "nav-link".($controller=='Items' ? ' active':''), 'escapeTitle' => false]) ?>    
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        '<i class="fas fa-users"></i> Customers', 
                        ['controller'=> 'users', 'action' => 'index'],
                        ['class' => "nav-link".($controller=='Users' ? ' active':''), 'escapeTitle' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        '<i class="fa fa-list-ul"></i> Orders', 
                        ['controller'=> 'orders', 'action' => 'index'],
                        ['class' => "nav-link".($controller=='Orders' ? ' active':''), 'escapeTitle' => false]) ?>
                </li>
            </ul>
            <?= $this->fetch('content') ?>
        </div>
        <footer>
            <p>&copy; 2018 - Quality Caps. Administration panel</p>
        </footer>
    </div>    
    <script src="lib/jquery/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/fontawesome-free-5.0.10/svg-with-js/js/fontawesome-all.js"></script>
    <?= $this->Html->script('site') ?>
    <?= $this->fetch('scriptsBottom') ?>
</body>
</html>
