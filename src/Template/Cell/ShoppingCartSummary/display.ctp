<?= $this->Html->link(
    "<i class='fas fa-shopping-bag'></i> $totalQuantity",
    ['controller'=>'ShoppingCart', 'action'=>'index'], ['escapeTitle'=>false, 'class'=>'nav-item'])
?>