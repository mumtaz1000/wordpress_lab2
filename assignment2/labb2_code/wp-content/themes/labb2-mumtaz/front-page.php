<!-- Starting page of a webside -->
<?php get_header(); ?>
<main>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="hero">
						<img src="<?php the_post_thumbnail_url( ); ?>" />
						<div class="text">				
                            <h1>
                            <?php 
                                if(have_posts(  )){
                                    while(have_posts()){
                                        the_post();
                                        the_content();
                                    }
                                }
                            ?>
                            </h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>        
