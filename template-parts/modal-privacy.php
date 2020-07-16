<?php $privacy = get_field('privacy_policy', 'option'); ?>

<div class="modal" id="privacy">
    <button class="modal--close" modal-close></button>
    <div class="modal--content">
        <div class="form-content">
            <?= $privacy; ?>
        </div>
    </div>
    <div class="modal--bg"></div>
</div>
