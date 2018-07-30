<?php
    $class = 'danger';
    $title = "Error";
    if (!empty($params['class'])) {
        $class .= ' ' . $params['class'];
    }
    if (!empty($params['title'])) {
        $title = $params['title'];
    }
    if (!isset($params['escape']) || $params['escape'] !== false) {
        $message = h($message);
    }
?>  
<div class="modal" id="confirmation-message" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-<?= $class ?>">
                <h5 class="modal-title"><?= $title ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?= $message ?></p>
            </div>
        </div>
    </div>
</div>