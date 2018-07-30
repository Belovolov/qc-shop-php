<?php 
    $this->assign('title', $gender.' collection');
    $bannerClass = $gender == "Men" ? "men-banner" : "women-banner";
    $action = $gender == "Men" ? "men" : "women";

?>

<?= $this->Flash->render() ?>
<section class=<?= $bannerClass ?>>
    <!-- <h2 class="section-header">Men</h2> -->
</section>

<div class="page-content-wrapper">
    <!-- Content page -->
    <section class="p-t-55 p-b-65">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 pb-4 pr-5">
                <div class="leftbar pr-4 pr-sm-0">
                    <h4 class="m-text14 pb-1">
                        Categories
                    </h4>

                    <ul class="pb-4">
                        <li class="pt-1">
                            <?= $this->Html->link('All', [
                                'action' => $action
                                ], [
                                    'class'=> "s-text13 active1 ".(empty($curr_category) ? "active":"")
                                ]) 
                            ?>
                        </li>
                        <?php foreach ($categories as $category): ?>                        
                            <li class="pt-1">
                                <?= $this->Html->link($category['Name'], [
                                    'action' => $action, 
                                    'category'=> $category['CategoryId']
                                    ], [
                                        'class'=> "s-text13 active1 ".($curr_category == $category['CategoryId'] ? "active":"")
                                    ]) 
                                ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!--  -->
                    <h4 class="m-text14 pb-1">
                        Filters
                    </h4>

                    <div class="filter-price p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-17">
                            Price
                        </div>

                        <div class="slider-range-wrapper">
                            <div id="slider-range"></div>
                        </div>

                        <div class="flex-sb-m flex-w pt-3">
                            <div class="w-size11">
                                <!-- Button -->
                                <button id="filter-price" class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                    Filter
                                </button>
                            </div>
                            <div class="d-flex s-text3 pt-2 pb-2 pl-1">
                                Range: <span style="color:#f6931f; font-weight: bold;">
                                    $<span id="value-lower">0</span>
                                    - $<span id="value-upper">100</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="search-product pos-relative bo4 of-hidden">
                        <input class="s-text7 size6 p-l-23 p-r-50"
                               id="search-query"
                               type="text"
                               name="search-product"
                               value="<?= $searchQuery ?>"
                               placeholder="Search Products...">

                        <div class="flex-c-m size5 ab-r-m">
                            <button id="search-clear" class="size7 color2 color0-hov trans-0-4"><i class="fs-15 fa fa-times" aria-hidden="true"></i></button>
                            <button id="search-submit" class="size7 color2 color0-hov trans-0-4"><i class="fs-15 fa fa-search" aria-hidden="true"></i></button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 pb-5">
                <!--  -->
                <div class="flex-sb-m flex-w pb-4">
                    <div class="flex-w">
                        <div class="flex-w">
                            <p class="flex-r-m m-0 mr-2">Sort order</p>
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <?= $this->Form->select(
                                    'sort-selection', 
                                    ['name_asc'=>'Name: A to Z','name_desc'=>'Name: Z to A','price_asc'=>'Price: low to high','price_desc'=>'Price: high to low'],
                                    ['class'=>'selection-2', 'val'=>$sortOrder, 'id'=>"sort-selection"]) 
                                ?>
                            </div>
                        </div>
                        <div class="flex-w">
                            <p class="flex-r-m m-0 mr-2">Items per page</p>
                            <div class="rs2-select2 bo4 of-hidden w-size11 m-t-5 m-b-5 m-r-10">
                                <?= $this->Form->select(
                                    'page-size-selection', 
                                    ['6'=>'6','12'=>'12','20'=>'20','50'=>'50'],
                                    ['class'=>'selection-2', 'val'=>$itemsPerPage, 'id'=>"page-size-selection"]) 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        if ($itemsTotal>0) {
                            $page  = $this->Paginator->current();
                            $total = $this->Paginator->total();
                            $startIndex = ($page - 1) * $itemsPerPage + 1;
                            $endIndex = min([$page * $itemsPerPage, $itemsTotal ]);
                            $status = "Showing $startIndex-$endIndex of $itemsTotal result(s)";
                        }
                        else {
                            $status = "0 result(s)";
                        }
                        
                    ?>
                    <span class="s-text8 p-t-5 p-b-5">
                        <?= $status ?>
                    </span>                    
                </div>

                <!-- Product -->
                <?php if ($itemsTotal>0): ?>
                <div class="row">
                    <?php foreach ($items as $item): ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src=<?= empty($item->ImageUrl) ? "/img/no-image.png" : $item->ImageUrl ?> alt="product image">

                                    <div class="block2-overlay trans-0-4">
                                        <div class="block2-controls w-size1 trans-0-4">
                                            <!-- Button -->
                                            <?= $this->Html->link('Add to Cart', [
                                                'controller'=>'shoppingcart',
                                                'action' => 'AddToShoppingCart',
                                                'itemId' => $item->ItemId
                                                ],['class'=>'flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4']) 
                                            ?>  
                                            <!-- Button -->
                                            <?= $this->Html->link('View details', [
                                                'controller'=>'shop',
                                                'action' => 'details',
                                                $item->ItemId
                                                ],['class'=>'flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-2']) 
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <?= $this->Html->link($item->Name, [
                                        'controller'=>'shop',
                                        'action' => 'details',
                                        $item->ItemId
                                        ],['class'=>'block2-name dis-block s-text3 p-b-5']) 
                                    ?>  

                                    <span class="block2-price m-text6 p-r-5">
                                        $<?= $item->Price ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>    
                </div>
                <?php else:?>
                    <p class="mt-4 text-center">Nothing found with current filters</p>
                <?php endif; ?>

                <!-- Pagination -->
                <?php if ($this->Paginator->total()>1): ?>
                <div class="pagination flex-m flex-w p-t-26">
                    <?php for ($i = 1; $i <= $this->Paginator->total(); $i++): ?>
                        <!-- //var active = (Model.items.PageIndex == i) ? "active-pagination" : ""; -->
                        <?php $active = $this->Paginator->current() == $i ? "active-pagination" : ""; ?>
                        <button data-page="<?= $i ?>"
                                class="item-pagination flex-c-m trans-0-4 <?= $active ?>">
                            <?= $i ?>
                        </button>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>

    <!--Hidden filter form-->
    <form id="filtering" asp-action="@aspAction" method="GET">
        <input type="hidden" name="category" value="<?= $curr_category ?>" />
        <input type="hidden" name="sortOrder" value="<?= $sortOrder ?>" />
        <input type="hidden" name="minPrice" value="<?= $minPrice ?>" />
        <input type="hidden" name="maxPrice" value="<?= $maxPrice ?>" />
        <input type="hidden" name="itemsPerPage" value="<?= $itemsPerPage ?>" />
        <input type="hidden" name="page" />
        <input type="hidden" name="searchQuery" value="<?= $searchQuery ?>" />

    </form>
</div>

<script type="text/javascript">
    //setting variables from controller for scripts
    window.MinScalePrice = <?= $minScalePrice ?>;
    window.MaxScalePrice = <?= $maxScalePrice ?>;
    window.MinPrice = <?= $minPrice ?>;
    window.MaxPrice = <?= $maxPrice ?>;
</script>
<?= $this->Html->css('shopping-page', ['block' => 'stylesTop']) ?>
<?= $this->Html->script('initShopUi', ['block' => 'scriptsBottom']) ?>
