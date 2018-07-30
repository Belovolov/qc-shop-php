<?= $this->Html->link('All', [
        'controller'=>'shop',
        'action' => $gender
    ]) ?>
<?php foreach($categories as $category): ?>
    <?= $this->Html->link($category['Name'], [
        'controller'=>'shop',
        'action' => $gender,
        'category' => $category['CategoryId']
    ]) ?>    
<?php endforeach; ?>

