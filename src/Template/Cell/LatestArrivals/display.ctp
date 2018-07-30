<div class="owl-carousel owl-theme">
    <?php foreach($items as $item): ?>
    <?php $url = $this->Url->build(['controller'=>'shop', 'action'=>'details', $item->ItemId]) ?>
        <div class="item">
            <a href="<?=$url?>">
                <img src="<?= empty($item->ImageUrl) ? 'img/no-image.png' : $item->ImageUrl ?>" 
                    alt="<?= $item->Name ?>" 
                />
            </a>
            <p class="text-center"><?= $item->Name?></p>
        </div>        
    <?php endforeach; ?>
</div>

