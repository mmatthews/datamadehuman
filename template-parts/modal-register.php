<?php $contact_form = get_field('contact_form', 'option'); ?>

<div class="modal" id="register">
    <button class="modal--close" modal-close></button>
    <div class="modal--content">
        <div class="form-content">
            <h1><?= $contact_form['heading']; ?></h1>
            <?= $contact_form['intro_copy']; ?>
            <?php include(get_template_directory() . '/template-parts/form.php'); ?>
        </div>
        <div class="thank-you"></div>
    </div>
    <div class="modal--bg"></div>
</div>
