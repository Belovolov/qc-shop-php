<?php
    $this->assign('title', 'Details');
?>

<div class="page-content-wrapper">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item">
                <?= $this->Html->link(
                    'Home', 
                    ['controller'=>'home', 'action'=>'index'])
                ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?= $item -> Name ?></li>
        </ol>
    </nav>
    <div class="row ml-0 mb-4">
        <div class="details-image col-md-5">
            <img src=<?= empty($item->ImageUrl) ? "/img/no-image.png" : $item->ImageUrl ?> alt=<?= $item -> Name ?> />
        </div>
        <div class="col-md-7">
            <h2>
                <?= $item -> Name ?>
            </h2>
            <p>
                $<?= $item -> Price ?>
            </p>
            <p>
                <?= $item -> Description ?>
            </p>
            <p>Category: <?= $item -> category->Name?></p>
            <p><?= $item -> Gender ?> </p>
            <div class="flex-l-m flex-w p-t-10">
                <div class="w-size16 flex-m flex-w">
                    <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                        <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                        </button>
                        <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">
                        <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="btn-addcart-product-detail size9 trans-0-4 mt-2 mb-2">
                        <!-- Button -->
                        <button id="add-to-cart" data-id=<?= $item->ItemId ?> class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->css('details-page', ['block' => 'stylesTop']) ?>
<?= $this->Html->script('itemToCart', ['block' => 'scriptsBottom']) ?>