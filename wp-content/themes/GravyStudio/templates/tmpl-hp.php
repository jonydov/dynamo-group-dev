<?php
/*
    Template Name: Homepage
*/

get_header();
?>

<?php if (have_rows('content_blocks')): while (have_rows('content_blocks')) : the_row(); ?>

    <?php if (get_row_layout() == 'slider') { ?>

        <section class="section-slider">

            <?php if( have_rows( 'slides') ): ?>
                <div class="slider">
	                <?php while ( have_rows('slides') ) : the_row(); ?>
                        <div class="item" style="background-image: url('<?=the_sub_field('image'); ?>');">
                            <div class="shell">
                                <div class="holder">

                                    <?php if( get_sub_field('title') != null ){ ?>
                                        <h2><?=the_sub_field('title'); ?></h2>
                                    <?php } ?>

                                    <?php if( get_sub_field('title') != null ){ ?>
                                        <div class="text">
                                            <?=the_sub_field('text'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
	                <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </section>

    <?php }elseif (get_row_layout() == 'subscribe_strip') { ?>

        <section class="section-subscribe-strip">

            <div class="shell">
				<div class="section-body">
                    <div class="holder cf">
						<span class="text animate fade-left" data-delay="100"><?=the_sub_field('text'); ?></span>

	                    <?php if( get_sub_field('button_text') != null ){ ?>
                            <a target="_blank" class="btn animate fade-right" data-delay="100" href="<?=the_sub_field('button_link'); ?>"><?=the_sub_field('button_text'); ?></a>
	                    <?php } ?>
                    </div>
                </div>
            </div>

        </section>

    <?php }elseif (get_row_layout() == 'large_image_strip') { ?>

        <section class="section-large-image-strip">

            <div class="shell">
				<?php if( get_sub_field('title') != null ){ ?>
                    <div class="section-header">
                        <h2><?=the_sub_field('title'); ?></h2>
                    </div>
				<?php } ?>
                <div class="section-body">
                    <div class="holder animate fade-bottom" data-delay="100">
						<?php if( get_sub_field('image') != null ){ $img = get_sub_field('image'); ?>
                            <img src="<?=$img['url']; ?>" width="<?=$img['width']; ?>" height="<?=$img['height']; ?>" alt="<?=$img['alt']; ?>" />
						<?php } ?>
                    </div>
                </div>
            </div>

        </section>

    <?php }elseif (get_row_layout() == 'text_strip') { ?>

        <section class="section-text-strip skrollable" <?php if( get_sub_field('bg_image') != null ){ ?>style="background-image: url('<?=the_sub_field('bg_image'); ?>');"<?php } ?>>

            <div class="shell">
				<?php if( get_sub_field('title') != null ){ ?>
                    <div class="section-header">
                        <h2><?=the_sub_field('title'); ?></h2>
                    </div>
				<?php } ?>
                <div class="section-body">
                    <div class="holder">
		                <?php if( get_sub_field('text') != null ){ ?>
                            <div class="text">
				                <?=get_sub_field('text'); ?>
                            </div>
		                <?php } ?>
                    </div>
                </div>
            </div>

        </section>

    <?php }elseif (get_row_layout() == 'features_strip') { ?>

        <section class="section-features-strip" <?php if( get_sub_field('bg_image') != null ){ ?>style="background-image: url('<?=the_sub_field('bg_image'); ?>');"<?php } ?>>
            <div class="shell">
                <?php if( get_sub_field('title') != null ){ ?>
                    <div class="section-header">
                        <h2><?=the_sub_field('title'); ?></h2>
                    </div>
                <?php } ?>
                <div class="section-body animate fade-bottom" data-delay="100">
                    <?php if( have_rows( 'features') ): ?>
                        <?php while ( have_rows('features') ) : the_row(); ?>

                            <div class="col">
                                <div class="holder">
                                    <?php if( get_sub_field('title') != null ){ ?>
                                        <h3>
                                            <?php if( get_sub_field('icon') != null ){ ?>
                                                <img class="icon" src="<?=get_sub_field('icon'); ?>" />
                                            <?php } ?>
                                            <?=the_sub_field('title'); ?>
                                        </h3>
                                    <?php } ?>

                                    <?php if( get_sub_field('text') != null ){ ?>
                                        <div class="text">
                                            <?=get_sub_field('text'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

        </section>

    <?php }elseif (get_row_layout() == 'contact_strip') { ?>

        <section class="section-contact-strip">

            <div class="shell">
				<div class="section-body">
                    <div class="holder animate fade-bottom" data-delay="100">
						<?php if( get_sub_field('map_image') != null ){ $img = get_sub_field('map_image'); ?>
                            <img src="<?=$img; ?>" />
						<?php } ?>
                    </div>
                </div>
            </div>
            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 100 10 0 10" /></svg>
        </section>

    <?php }elseif (get_row_layout() == 'info_strip') { ?>

        <section class="section-info-strip">
            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 100 10 0 10" /></svg>

            <div class="shell">
	            <?php if( get_sub_field('title') != null ){ ?>
                    <div class="section-header">
                        <h2><?=the_sub_field('title'); ?></h2>

	                    <?php if( get_sub_field('subtitle') != null ){ ?>
                            <span class="subtitle"><?=the_sub_field('subtitle'); ?></span>
	                    <?php } ?>
                    </div>
	            <?php } ?>
                <div class="section-body">
                    <?php if( have_rows( 'columns') ): ?>
                        <?php while ( have_rows('columns') ) : the_row(); ?>

                            <div class="col">
                                <div class="holder">
                                    <?php if( get_sub_field('title') != null ){ ?>
                                        <h3>
                                            <?php if( get_sub_field('icon') != null ){ ?>
                                                <img class="icon" src="<?=get_sub_field('icon'); ?>" />
                                            <?php } ?>
                                            <?=the_sub_field('title'); ?>
                                        </h3>
                                    <?php } ?>

                                    <?php if( get_sub_field('text') != null ){ ?>
                                        <div class="text">
                                            <?=get_sub_field('text'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

        </section>

    <?php } ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
