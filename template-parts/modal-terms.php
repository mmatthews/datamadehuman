<?php $terms = get_field('terms_of_use', 'option'); ?>

<div class="modal" id="terms">
    <button class="modal--close" modal-close></button>
    <div class="modal--content">
        <div class="form-content">
            <?= $terms; ?>
        </div>
    </div>
    <div class="modal--bg"></div>
</div>
