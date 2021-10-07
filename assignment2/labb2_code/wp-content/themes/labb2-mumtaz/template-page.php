<?php
/* Template Name: Simple Temlate Page */
?>
<?php get_header() ?>
<main>
			<section>
				<div class="container">
					<div class="row">
						<div id="primary" class="col-xs-12 col-md-9">
							<h1><?php the_title(); ?></h1>
                            <?php the_content( ); ?>
							</div>
					</div>
				</div>
			</section>
		</main>
<?php get_footer( ) ?>
		

	