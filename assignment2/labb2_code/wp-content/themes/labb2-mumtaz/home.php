<!-- All blogs page-->
<?php get_header(); ?>
<main>
    <section>
		<div class="container">
			<div class="row">
				<div id="primary" class="col-xs-12 col-md-9">
					<h1><?php wp_title('', true,'left' ) ?></h1>
					
					<?php 
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            get_template_part('template-parts/content','posts');
                        }
                    	}
                    ?>
					<nav class="navigation pagination">
						<?php echo paginate_links( array(
							 'prev_text'          => __( 'Föregående' ),
							 'next_text'          => __( 'Nästa' ),
						) )?>
					</nav>
				</div>
			</div>
		</div>
    </section>
</main>
<?php get_footer(  )?>