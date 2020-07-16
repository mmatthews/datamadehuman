<?php

/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dmh
 */

$what = get_field('what');
$how = get_field('how');
$what = get_field('what');
$who = get_field('who');
$why = get_field('why');
$partners = get_field('partners');

get_header(); ?>

<div class="home-sections">
    <div class="what section">
        <div class="container">
            <div class="copy">
                <span class="underlined"><?= $what['section_title']; ?></span>
                <?= $what['heading']; ?>
                <?= $what['copy']; ?>
                <?= $what['subheading']; ?>
            </div>

            <div class="underlined-img">
                <img src="<?= $what['left_image']['url']; ?>" alt="<?= $what['left_image']['alt']; ?>" />
            </div>
            <img class="pull-left" src="<?= $what['right_image']['url']; ?>" alt="<?= $what['right_image']['alt']; ?>" />
        </div>
    </div>

    <div class="how section">
        <div class="container">
            <?= $how['intro_heading']; ?>

            <img class="pull-left" src="<?= $how['image']['url']; ?>" alt="<?= $how['image']['alt']; ?>" />
            <div class="copy">
                <span class="underlined"><?= $how['section_title']; ?></span>
                <?= $how['heading']; ?>
                <?= $how['copy']; ?>
                <?= $how['subheading']; ?>
            </div>
        </div>
    </div>

    <div class="who section">
        <!--<img src="<?= $who['background_image']; ?>" alt="" class="parallax" />-->
        <div class="container">
            <div class="copy">
                <span class="underlined"><?= $who['section_title']; ?></span>
                <?= $who['heading']; ?>
                <?= $who['copy']; ?>
                <?= $who['subheading']; ?>
            </div>

            <div class="values">
                <?php foreach($who['values'] as $value){ ?>
                    <div class="value">
                        <img src="<?= $value['icon']; ?>" alt="" />
                        <strong><?= $value['text']; ?></strong>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="why section">
        <div class="container">
            <div class="copy">
                <span class="underlined"><?= $why['section_title']; ?></span>
                <?= $why['heading']; ?>
                <?= $why['copy']; ?>
            </div>
        </div>

        <div class="expandables">
            <?php foreach($why['skills'] as $skill){ ?>
                <div class="expandable" style="background-image: url('<?= $skill['background_image'] ?>')">
                    <div class="overlay">
                        <p><?= $skill['copy']; ?></p>
                        <div expand>
                            <?php include(get_template_directory() . '/dist/img/expand.svg'); ?>
                            <div><?= $skill['intro_text']; ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="partners section">
        <div class="container">
            <span class="underlined"><?= $partners['section_title']; ?></span>
            <h2><?= $partners['heading']; ?></h2>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($partners['partners'] as $partner){ ?>
                    <div class="swiper-slide">
                        <img src="<?= $partner['url'] ?>" alt="<?= $partner['alt'] ?>" title="<?= $partner['title'] ?>" />
                    </div>
                <?php } ?>            
            </div>
            <div class="swiper-prev"></div>
            <div class="swiper-next"></div>
        </div>
    </div>

<?php get_footer(); ?>