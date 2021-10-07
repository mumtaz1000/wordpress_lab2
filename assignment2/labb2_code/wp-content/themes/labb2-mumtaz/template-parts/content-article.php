<!-- For showing single blog post with whole paragraph-->
<article>
<img src="<?php the_post_thumbnail_url( ); ?>" />
    <h1><?php the_title(); ?></h1>	
    <ul class="meta">
	    <li>
	        <i class="fa fa-calendar"></i> 
            <?php the_time( 'jS, F  Y' ); ?>
	    </li>
	    <li>
		    <i class="fa fa-user"></i> 
            <a href="<?php the_permalink(); ?>">
                <?php the_author(); ?>
            </a>
	    </li>
        <li>
        <?php the_tags('<i class="fa fa-tag"></i>','<a href="kategori.html">, ','</a>');?>        	    
	    </li>
    </ul>
    <p><?php the_content(); ?></p>
    </article>
