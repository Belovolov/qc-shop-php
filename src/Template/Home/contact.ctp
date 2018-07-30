<?php $this->assign('title', 'Contact'); ?>

<!-- <section class="contact-banner d-flex justify-content-end align-items-center pr-5">
    <h2 class="arial-font">Contact info</h2>
</section> -->
<section class="col-12 pr-0 pl-0 map-container">
    <div class="contact-map w-100 h-100" id="google_map" data-map-x="-36.845360" data-map-y="174.766243" data-pin="img/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
</section>
<div class="page-content-wrapper">
    <section class="pt-4 pb-4">
        <div class="row">
            <div class="col-md-6 offset-md-3 contact-info">
                <h4><span class="bg-white pos-relative pl-2 pr-2">Contact info</span></h4>
                <p>
                    <strong>Address:</strong> 75 Queen Street, Auckland
                </p>
                <p><strong>Working hours: </strong>Monday to Friday 16:00-20:00,<br/>Saturday-Sunday 10:00-16:00 </p>
                <p><strong>Phone:</strong> +64123456789</p>
                <p><strong>E-mail:</strong> info@qc.co.nz</p>
            </div>
        </div>
    </section>
</div>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBQFoolzt4sLvXg2nSIWlmxjKDO_0CI_zE', ['block' => 'scriptsBottom','fullBase'=>true ]) ?>
<?= $this->Html->script('map', ['block' => 'scriptsBottom']) ?>

<?= $this->Html->css('contact-page', ['block' => 'stylesTop']) ?>
