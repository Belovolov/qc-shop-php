<?php
    $this->assign('title', 'Error');
?>

<div class="page-content-wrapper">
    <div class="card mb-3  alert alert-warning">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title">Ooops! Error</h5>
            <p class="card-text">
                Something went wrong with the page you have just reuqested. Our team is already notified.
            </p>
            <?= $this->Html->link(
                'Go shopping', 
                ['controller'=>'home', 'action'=>'index'],
                ['class'=>'btn btn-dark'])
            ?>
        </div>
    </div>
</div>