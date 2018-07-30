<?php 
    $this->assign('title', 'Home - Quality Caps');
?>

<?= $this->Flash->render() ?>
<div class="page-content-wrapper">
    <div class="hone-page__row-1">
        <div class="carousel__wrapper">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="img/banners/caps_banner.jpg" alt="caps" class="img-responsive" />
                    </div>
                    <div class="carousel-item">
                        <img src="img/banners/peru_caps_banner.jpg" alt="peru_caps" class="img-responsive" />
                    </div>
                    <div class="carousel-item">
                        <img src="img/banners/flat_caps_banner3.jpg" alt="flat_caps" class="img-responsive" />
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="shop-genders__wrapper">
            <div class="shop-gender shop-gender__men">
                <img src="img/ForMen.jpg" />
                <p>Men</p>
                <div class="click-overlay" data-link="shop/men">
                    <div class="shop-gender__shop-btn">Shop</div>
                </div>
            </div>
            <div class="shop-gender shop-gender__women">
                <img src="img/ForWomen.jpg" />
                <p>Women</p>
                <div class="click-overlay" data-link="shop/women">
                    <div class="shop-gender__shop-btn">Shop</div>
                </div>
            </div>
        </div>
    </div>
    <div class="latest-arrivals">
        <div class="latest-arrivals__title">
            <span class="latest-arrivals__title__text">Latest arrivals</span>
        </div>
        <?= $this->cell('LatestArrivals')->render(); ?>
    </div>
</div>

<?= $this->Html->script('deliveryInfo', ['block' => 'scriptsBottom']) ?>
<?= $this->Html->script('hover', ['block' => 'scriptsBottom']) ?>
<?= $this->Html->script('latest-arrivals', ['block' => 'scriptsBottom']) ?>

<?= $this->Html->css('home-page', ['block' => 'stylesTop']) ?>
<?= $this->Html->css('latest-arrivals', ['block' => 'stylesTop']) ?>
