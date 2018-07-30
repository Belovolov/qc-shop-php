<?php 
    $this->assign('title', 'Cart'); 
    $session = $this->request->getSession();
    $user_data = $session->read('Auth.User');
?>

<div class="page-content-wrapper">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item">
                <?= $this->Html->link('Home', ['controller'=>'home', 'action'=>'index']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
        </ol>
    </nav>
    <?php if ($lines->count()>=1): ?>
        <section class="cart_info mb-3">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lines as $line):?>
                        <tr>
                            <td class="cart_product">
                                <?= $this->Html->link(
                                    '<img src='.$line->item->ImageUrl.' alt="">', 
                                    ['controller'=>'shop', 'action'=>'details', $line->item->ItemId],
                                    ['class'=>'cart_quantity_delete', 'escapeTitle'=>false])
                                ?>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <?= $this->Html->link(
                                        $line->item->Name, 
                                        ['controller'=>'shop', 'action'=>'details', $line->item->ItemId])
                                    ?>    
                                </h4>
                                <p>ID: <?= $line->item->ItemId ?></p>
                            </td>
                            <td class="cart_price">
                                <p>$<?= $line->item->Price ?></p>
                            </td>
                            <td class="cart_quantity flex-l-m">
                                <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2"
                                            data-itemId="<?= $line->item->ItemId ?>">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input data-itemId="<?= $line->item->ItemId ?>" class="size8 m-text18 t-center num-product" type="number" name="num-product" value="<?= $line->Amount ?>" min="1">
                                    <button data-itemId="<?= $line->item->ItemId ?>" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$<?= $line->Amount * $line->item->Price ?></p>

                            </td>

                            <td class="cart_delete">
                                <?= $this->Html->link(
                                    '<i class="fa fa-times"></i>', 
                                    ['controller'=>'shoppingcart', 'action'=>'RemoveFromShoppingCart', 'itemId'=>$line->item->ItemId],
                                    ['class'=>'cart_quantity_delete', 'escapeTitle'=>false])
                                ?>
                            </td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section> <!--/#cart_items-->
        <section class="col-md-6 col-sm-8 offset-sm-4 offset-md-6 total_area mb-5 ">
            <ul>
                <li>Cart Sub Total <span>$<?= $total?></span></li>
                <li>Sheeping <span>Free</span></li>
                <li>GST <span>15%</span></li>
                <li>Grand Total <span>$<?= round($total*1.15,2) ?></span></li>
            </ul>
            <div class="d-flex justify-content-between trans-0-4 mt-2 mb-2">
                <?= $this->Html->link(
                    '<i class="fa fa-times mr-2"></i> Clear cart',
                    ['controller'=>'ShoppingCart', 'action'=>'ClearShoppingCart'],
                    ['class'=>'flex-c-m bg1 bo-rad-23 hov6 s-text1 trans-0-4 p-2 ml-3 mt-3', 'escapeTitle'=>false])
                ?>
                <?php if ($user_data['Role']=="admin"):?>
                    <button class="btn flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-2 mr-3 mt-3"
                            type="button" data-toggle="popover"
                            data-trigger="focus"
                            title="Not allowed"
                            data-content="Sorry, admin. Only customers can make orders">
                        Proceed to checkout
                    </button>
                <?php else:?>
                    <?= $this->Html->link(
                        'Proceed to checkout',
                        ['controller'=>'orders', 'action'=>'checkout'],
                        ['class'=>'flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-2 mr-3 mt-3'])
                    ?>
                <?php endif; ?>

            </div>
        </section>
    <?php else:?>
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center flex-column">
                <h5 class="card-title">Cart is empty</h5>
                <p class="card-text">Go to the catalogue and add all the caps you like</p>
                <?= $this->Html->link(
                    'Go shopping',
                    ['controller'=>'home', 'action'=>'index'],
                    ['class'=>'btn btn-dark'])
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->Html->script('cart', ['block' => 'scriptsBottom']) ?>

<?= $this->Html->css('cart', ['block' => 'stylesTop']) ?>