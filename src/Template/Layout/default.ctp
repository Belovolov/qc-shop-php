<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $this->fetch('title') ?></title>
    <base href='/' />
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="lib/select2/css/select2.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?= $this->Html->css('site') ?>
    <?= $this->Html->css('account') ?>
    <?= $this->Html->css('dropdown') ?>
    <?= $this->Html->css('utils') ?>
    <link rel="stylesheet" href="lib/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="lib/owl.carousel/assets/owl.theme.default.css">
    <?= $this->fetch('stylesTop') ?>
</head>
<body>
    <?php 
        $session = $this->request->getSession();
        $user_data = $session->read('Auth.User');
    ?>
    <nav class="nav-top justify-content-between pl-lg-2 pr-lg-2">
        <div>
            <?= $this->Html->link(
                '<i class="fas fa-phone"></i> +64123456789',
                ['controller'=>'home', 'action'=>'contact'], ['escapeTitle'=>false])
            ?>
            <a href="mailto:info@qc.co.nz"><i class="fas fa-envelope"></i> info@qc.co.nz</a>            
        </div>
        <div>
            <?= $this->Html->link('About',['controller'=>'home','action'=>'about']) ?>
            <?= $this->Html->link('Contact',['controller'=>'home','action'=>'contact']) ?>
        </div>
    </nav>
    <nav class="nav-main">
        <div class="nav-block nav-categories">
            <div class="nav-item dropdown">
                <?= $this->Html->link(
                    'Men <i class="fas fa-angle-down"></i>',
                    ['controller'=>'shop', 'action'=>'men'],
                    ['escapeTitle'=>false, 'class'=>'nav-item dropbtn'])
                ?>
                <div class="dropdown-content">
                    <?= $this->cell('Categories', ['Men'])->render(); ?>
                </div>

            </div>
            <div class="nav-item dropdown">
                <?= $this->Html->link(
                    'Women <i class="fas fa-angle-down"></i>',
                    ['controller'=>'shop', 'action'=>'women'],
                    ['escapeTitle'=>false, 'class'=>'nav-item dropbtn'])
                ?>
                <div class="dropdown-content">
                <?= $this->cell('Categories', ['Women'])->render(); ?>
                </div>
            </div>
            
        </div>
        
        <div class="nav-block nav-logo">
            <?= $this->Html->link('<img src="img/logo-qc.png" alt="logo" />', ['controller'=> 'home', 'action' => 'index'],['escapeTitle' => false]) ?>
        </div>
        <div class="nav-block nav-user-actions">
            
            <?php if (!empty($user_data)):?>                
                <div class="nav-item dropdown">
                    <p class="welcome pb-3 pt-3"><?=$user_data["UserName"]?> <i class="fas fa-angle-down"></i></p>
                    <div class="dropdown-content">
                        <?php if ($user_data['Role']=="customer"):?>                           
                            <?= $this->Html->link(
                                '<i class="fa fa-list-ul"></i> Orders',
                                ['controller'=>'account', 'action'=>'orders'],
                                ['escapeTitle'=>false])
                            ?>                            
                            <?= $this->Html->link(
                                '<i class="fa fa-user-circle"></i> Profile',
                                ['controller'=>'account', 'action'=>'profile'],
                                ['escapeTitle'=>false])
                            ?>
                        <?php elseif ($user_data['Role']=="admin"):?>                            
                            <?= $this->Html->link(
                                '<i class="fas fa-cog"></i> Admin Panel',
                                ['controller'=>'home', 'action'=>'admin'],
                                ['escapeTitle'=>false])
                            ?>
                        <?php endif;?>
                        <hr class="m-0" />
                        <?= $this->Html->link(
                            '<i class="fas fa-sign-out-alt"></i> Log off',
                            ['controller'=>'account', 'action'=>'logoff'],
                            ['escapeTitle'=>false])
                        ?>
                    </div>
                </div>             
            <?php else:?>
                <?= $this->Html->link(
                    '<i class="fas fa-user"></i> Login',
                    ['controller'=>'account', 'action'=>'login'],
                    ['escapeTitle'=>false, "class"=>"nav-item"])
                ?>
            <?php endif;?>

            <?= $this->cell('ShoppingCartSummary')->render(); ?>
        </div>
    </nav>
    <div class="body-content">
        
        <?= $this->fetch('content') ?>
        
        <footer class="d-flex flex-column pl-4 pr-0 pb-4 justify-content-between">
            <div class="row w-100 d-flex">
                <div class="col-md-3 col-sm-6 mt-4">
                    <h5>Navigation</h5>
                    <div class="d-flex flex-column">
                        <?= $this->Html->link('Home',['controller'=>'home', 'action'=>'index']) ?>
                        <?= $this->Html->link('Men',['controller'=>'shop', 'action'=>'men']) ?>
                        <?= $this->Html->link('Women',['controller'=>'shop', 'action'=>'women']) ?>
                        <?= $this->Html->link('About',['controller'=>'home', 'action'=>'about']) ?>
                        <?= $this->Html->link('Contact',['controller'=>'home', 'action'=>'contact']) ?>
                        <?= $this->Html->link('Profile',['controller'=>'account', 'action'=>'profile']) ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-4">
                    <h5>Categories</h5>
                    <div class="d-flex flex-column">
                        <?= $this->Html->link('Peruvian',['controller'=>'home', 'action'=>'index']) ?>
                        <?= $this->Html->link('Flat',['controller'=>'shop', 'action'=>'men']) ?>
                        <?= $this->Html->link('Basketball',['controller'=>'shop', 'action'=>'women']) ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-4 ">
                    <h5>Contact us</h5>
                    <div class="d-flex flex-column">
                        <div><i class="fas fa-phone"></i> +64123456789</div>
                        <div><i class="mr-1 fas fa-location-arrow"></i> 75 Queen Street, Auckland</div>
                    </div>
                    <h5 class="mt-4">Social</h5>
                    <div class="d-flex social">
                        <a href="#"><i class="mr-1 fab fa-facebook-square hover-orangebrown"></i></a>
                        <a href="#"><i class="mr-1 fab fa-twitter-square hover-orangebrown"></i></a>
                        <a href="#"><i class="mr-1 fab fa-instagram hover-orangebrown"></i></a>
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 mt-4 d-flex flex-column justify-content-between">
                    <div class="mb-4">
                        <h5>Payment methods</h5>
                        <div class="d-flex" style="font-size: 30px;">
                            <i class="mr-1 fab fa-cc-visa"></i>
                            <i class="mr-1 fab fa-cc-mastercard"></i>
                            <i class="mr-1 fab fa-cc-paypal"></i>
                        </div>
                    </div>
                    <div><p>2018 - Quality Caps. Belovolov 1484314</p></div>
                </div>
            </div>
            
        </footer>
    </div>

    <script src="lib/jquery/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="lib/popper.js/umd/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/fontawesome-free-5.0.10/svg-with-js/js/fontawesome-all.js"></script>
    <script src="lib/owl.carousel/owl.carousel.js"></script>
    <?= $this->Html->script('site') ?>
    <script src="lib/select2/js/select2.js"></script>

    <?= $this->fetch('scriptsBottom') ?>
</body>
</html>
