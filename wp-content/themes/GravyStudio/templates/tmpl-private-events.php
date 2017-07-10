<?php
/*
    Template Name: Private Events
*/

get_header();

?>

<?php if ( have_rows( 'content_sections' ) ): while ( have_rows( 'content_sections' ) ) : the_row(); ?>

	<?php if ( get_row_layout() == 'locations_slider' ) { ?>

		<section class="section-locations-slider">

			<?php if ( have_rows( 'slides' ) ): $i = 1; ?>
				<div class="locations-slider">
					<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
						<div class="item" id="slide-<?=$i; ?>">

							<?php if( get_sub_field('bg_type') == 'image'){ ?>
								<div class="bg-holder" style="background-image: url('<?=get_sub_field('image'); ?>');"></div>
							<?php }elseif( get_sub_field('bg_type') == 'youtube'){ ?>
								<div class="bg-holder" style="background-image: url('<?=get_sub_field('image'); ?>');">
									<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=get_sub_field('youtube_id'); ?>?rel=0&loop=1&controls=0&mute=1&enablejsapi=1<?php if( $i == 1){ echo '&autoplay=1'; } ?>" frameborder="0" allowfullscreen></iframe>
								</div>
							<?php }elseif( get_sub_field('bg_type') == 'video'){ ?>
								<div class="bg-holder">
									<video loop poster="<?=get_sub_field('image'); ?>">
										<source src="<?=get_sub_field('video_mp4'); ?>" type="video/mp4" />
										<source src="<?=get_sub_field('video_ogv'); ?>" type="video/ogv" />
										<source src="<?=get_sub_field('video_webm'); ?>" type="video/webm" />
									</video>
								</div>
							<?php } ?>

							<div class="holder">
								<h2 class="fade-top" data-delay="100"><?=get_sub_field('title'); ?></h2>
								<div class="text fade-top"><?=get_sub_field('text'); ?></div>
								<?php if( get_sub_field('button_text') != null ){ ?>
									<a class="fade-right" target="<?=get_sub_field('button_target'); ?>" href="<?=get_sub_field('button_link'); ?>"><?=get_sub_field('button_text'); ?></a>
								<?php } ?>
							</div>

						</div>
					<?php $i++; endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if ( have_rows( 'slides' ) ): $i = 1; ?>
				<div class="locations-slider-nav">
					<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
						<div class="item" data-vid-slide="slide-<?=$i; ?>">
                            <div class="img-holder" style="mask: url('<?php the_sub_field('logo'); ?>') no-repeat center; -webkit-mask: url('<?php the_sub_field('logo'); ?>') no-repeat center;"></div>
                        </div>
					<?php $i++; endwhile; ?>
				</div>
			<?php endif; ?>

		</section>

	<?php } ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
