<?php
/*
    Template Name: Location
*/

get_header();

?>

<?php if ( have_rows( 'content_sections' ) ): while ( have_rows( 'content_sections' ) ) : the_row(); ?>

	<?php if ( get_row_layout() == 'full_width_image' ) { ?>

		<section class="section-full-width-image">

            <?php if( get_sub_field('image') != null ){ ?>
                <div class="bg-img skrollable" data-top="transform: translateY(5%);" data-top-bottom="transform: translateY(-10%);" style="background-image: url('<?=get_sub_field('image'); ?>');"></div>
            <?php } ?>
            <div class="shell">
                <div class="holder">
                    <?php if ( get_sub_field( 'text' ) != null ) { ?>
                        <<?php the_sub_field('text_type'); ?> class="animate fade-top" data-delay="100">
                            <?php the_sub_field('text'); ?>
                        </<?php the_sub_field('text_type'); ?>>
                    <?php } ?>

                    <?php if ( get_sub_field( 'text' ) != null ) { ?>
                        <div class="text animate fade-bottom" data-delay="100">
                            <?php the_sub_field('subtext'); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

		</section>

	<?php } elseif ( get_row_layout() == 'grid' ) { ?>

        <section class="section-grid" <?php if( get_sub_field('bg_color') != null ){ echo 'style="background-color:'.get_sub_field('bg_color').'";'; } ?>>

            <div class="shell">
                <?php if ( have_rows( 'items' ) ): $i = 100; ?>
                    <?php while ( have_rows( 'items' ) ) : the_row(); ?>

                        <?php
                            if( get_sub_field('link_url') != null ){
                                $tag = 'a';
                            }else{
	                            $tag = 'div';
                            }

                            $style = array();

                            if( get_sub_field('bg_color') != null ){
                                $style[] = 'background-color: '.get_sub_field('bg_color').';';
                            }
                        ?>

                        <<?=$tag;?> class="item <?=the_sub_field('type'); ?> animate fade-bottom" data-delay="<?=$i; ?>" style="<?php echo implode($style); ?>" <?php if( get_sub_field('link_url') != null ){ ?>href="<?=get_sub_field('link_url'); ?>" target="<?=get_sub_field('link_target'); ?>"<?php } ?>>
                            <div class="holder">
	                            <?php if( get_sub_field('bg_image') != null ){ ?>
                                    <div class="bg-img" style="background-image: url('<?=get_sub_field('bg_image'); ?>');">
                                        <?php if( get_sub_field('bg_color') != null ){ ?>
                                            <span class="overlay" style="background-color: <?=get_sub_field('bg_color'); ?>;"></span>
                                        <?php } ?>
                                    </div>
	                            <?php } ?>
	                            <?php if( get_sub_field('type') == 'text' ){ ?>
                                    <div class="text animate fade-right" data-delay="50" <?php if( get_sub_field('text_color') != null ){ echo 'style="color: '.get_sub_field('text_color').';"'; } ?>>
                                        <?=get_sub_field('text'); ?>

	                                    <?php if( get_sub_field('link_text') != null ){ ?>
                                            <span class="btn" style="color: <?=get_sub_field('bg_color'); ?>; background-color: <?=get_sub_field('text_color'); ?>"><?=get_sub_field('link_text'); ?></span>
	                                    <?php } ?>
                                    </div>
	                            <?php }?>
                            </div>
                        </<?=$tag;?>>

                    <?php $i = $i+50; endwhile; ?>
                <?php endif; ?>
            </div>

        </section>

	<?php } elseif ( get_row_layout() == 'highlighted_text' ) { ?>

		<section class="section-highlighted-text" <?php if( get_sub_field( 'bg_image') != null ){ ?>style="background-image: url('<?=get_sub_field( 'bg_image'); ?> ');"<?php } ?>>
            <span class="custom-arrow top">
                <i></i>
            </span>
			<span class="custom-arrow bottom">
            </span>
			<div class="shell">
				<div class="section-body animate fade-bottom" data-delay="100">
					<?php the_sub_field('text'); ?>
				</div>
			</div>

		</section>

	<?php } elseif ( get_row_layout() == 'numbers_section' ) { ?>

		<section class="section-numbers" <?php if( get_sub_field( 'bg_image') != null ){ ?>style="background-image: url('<?=get_sub_field( 'bg_image'); ?> ');"<?php } ?>>
			<div class="shell">

				<div class="section-header">
					<h2><?=get_sub_field('title'); ?></h2>
				</div>

				<?php if ( have_rows( 'items' ) ):  $i = 1; ?>
					<div class="section-body">
						<?php while ( have_rows( 'items' ) ) : the_row(); ?>
							<div class="item animate fade-bottom" data-delay="50">
								<div class="holder">
									<span class="number" data-count="<?php the_sub_field('text'); ?>"></span>
									<h4><?php the_sub_field('title'); ?></h4>
								</div>
							</div>
							<?php $i++; endwhile; ?>
					</div>
				<?php endif; ?>

			</div>

		</section>

	<?php } elseif ( get_row_layout() == 'slider' ) { ?>

		<section class="section-slider">

			<div class="shell">

                <a class="link-home" href="<?php bloginfo('url'); ?>">מעבר לאתר הלורנס</a>

                <div class="section-header">
                    <h2><?=get_sub_field('title'); ?></h2>
                </div>

				<?php if ( have_rows( 'slides' ) ): ?>
					<div class="gallery-slider">
						<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
							<div class="item">
                                <span class="text"><?=get_sub_field('title'); ?></span>
                                <img src="<?php the_sub_field('image'); ?>" />
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

			</div>

		</section>

	<?php } ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
