    <div class="stumblr-title">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <span class="title_right"><?php echo date('d M, Y',get_the_time('U'));?></span>
    </div>
    <?php if ( has_post_thumbnail() ) { ?><div class="stumblr-image"><?php the_post_thumbnail( 'stumblr-large-image' );  ?></div><?php } ?>  
	<div class="stumblr-content">
        
			<div class="postcontent">
                 <?php the_content( __( '继续阅读 <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			</div>

            <?php if ( is_single() ) {
            echo comments_template();
            } else {
        } ?>
        
    </div>          
    <?php /* <div class="stumblr-meta">
        <p><span class="stumblr-date"> <?php the_time('n月j日, Y'); ?></span> <span class="stumblr-comment"> <?php comments_popup_link( __( '暂无回应' ), __( '1次回应' ), __( '%次回应' ) ); ?></span> <span class="stumblr-prelink"> <a href="<?php the_permalink() ?>" title="Permalink">Permalink</a></span></p>	
    </div> */ ?>
	<div class="clear"></div>
	</div><!-- end post -->