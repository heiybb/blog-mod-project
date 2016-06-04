<?php if ( has_post_format( 'video' )){ ?>
    <div class="stumblr-title">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <div class="title-label"><div class="inner"><?php the_time( 'Y - n - j'); ?>&nbsp;&nbsp;•<span class="entry-cate"><a href="#" title="查看该分类下的所有文章"><?php the_category(', '); ?></a></span></div></div>
    </div>
            <div class="stumblr-video">
            <div class="pc-video">
            	
			<!--[if IE]>
			<embed src="<?php $key="视频地址"; echo get_post_meta($post->ID, $key, true); ?>" quality="high" width="741" height="460" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>
			<div class="video-bottom">video</div>
			<![endif]-->

			<!--非ie浏览器-->
			<!--[if !IE]>-->
			<?php if(get_post_meta($post->ID, '视频ID', true)){ ?>

				<iframe height="460" width="740" src="http://player.youku.com/embed/<?php $key="视频ID"; echo get_post_meta($post->ID, $key, true); ?>" frameborder=0 allowfullscreen></iframe>
			
			<?php } else if(get_post_meta($post->ID, '视频地址', true)){ ?>

				<embed src="<?php $key="视频地址"; echo get_post_meta($post->ID, $key, true); ?>" quality="high" width="741" height="460" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>

			<?php } else { ?>

			<?php } ?> <!--<![endif]--><!--<![endif]-->
				
			</div>		
		</div>
	<div class="stumblr-content">

		<div class="postcontent">
            <?php the_content(__('more')); ?>
		</div>
    </div>           
    <?php /* <div class="stumblr-meta">
         <p><span class="stumblr-date"><?php the_time('F j, Y'); ?></span> <span class="stumblr-category"> <?php the_category(', ') ?></span> <span class="stumblr-comment"> <?php comments_popup_link( __( '0 回应' ), __( '1 回应' ), __( '% 回应' ) ); ?></span> <span class="stumblr-prelink"> <a href="<?php the_permalink() ?>" title="固定链接">Permalink</a></span></p>	
    </div> */ ?>
	<div class="clear"></div>
</div><!-- end post -->

<?php } else if (has_post_format( 'link' )){ ?>
	<?php include(TEMPLATEPATH . '/format/default.php'); ?>
				
<?php } else { ?>
    <div class="stumblr-title">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <div class="title-label"><div class="inner"><?php the_time( 'Y - n - j'); ?>&nbsp;&nbsp;•<span class="entry-cate"><a href="#" title="查看该分类下的所有文章"><?php the_category(', '); ?></a></span></div></div>
    </div>
    <?php if ( has_post_thumbnail() ) { ?><div class="stumblr-image"><?php the_post_thumbnail( 'stumblr-large-image' );  ?></div><?php } ?>  
	<div class="stumblr-content">
        
			<div class="postcontent">
                 <?php the_content( __( '<p class="read-more">More <span class="meta-nav">&rarr;</span></p>', 'twentytwelve' ) ); ?>
			</div>

            <?php if ( is_single() ) {
            echo comments_template();
            } else {
        } ?>
        
    </div>          
    <?php /* <div class="stumblr-meta">
        <p><span class="stumblr-date"> <?php the_time('Y - n - j'); ?></span> <span class="stumblr-comment"> <?php comments_popup_link( __( '暂无回应' ), __( '1次回应' ), __( '%次回应' ) ); ?></span> <span class="stumblr-prelink"> <a href="<?php the_permalink() ?>" title="Permalink">Permalink</a></span></p>	
    </div> */ ?>
	<div class="clear"></div>
	</div><?php } ?>