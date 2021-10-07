<!-- For showing all blog posts but with short detail -->
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
        <?php the_tags('<i class="fa fa-tag"></i>',', ','');?>
	    </li>
	</ul>
	<p><?php the_excerpt(); ?></p>
</article>