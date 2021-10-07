<!-- Template archive page with a loop in it -->
<?php  
	// Define our WP Query Parameters
	$the_query = new WP_Query( 'posts_per_page=3' );
	// Start our WP Query
		while ($the_query -> have_posts()) : $the_query -> the_post(); 
		// Display the Post Title with Hyperlink
	?>
<article>
	<img src="<?php the_post_thumbnail_url( ); ?>" />
	<h2 class="title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<ul class="meta">
	    <li>
            <i class="fa fa-calendar"></i> 
            <?php the_time( 'jS, F  Y' ); ?>
        </li>
	    <li>
		    <i class="fa fa-user"></i> 
                <?php the_author(); ?>
	    </li>
	    <li>
        <?php the_tags('<i class="fa fa-tag"></i>','<a href="kategori.html">, ','</a>');?>
	    </li>
	</ul>
	<p><?php the_excerpt(); ?></p>
	</ul>
	</article>
	
	<?php 
		// Repeat the process and reset once it hits the limit
		endwhile;
		wp_reset_postdata();
	?>
