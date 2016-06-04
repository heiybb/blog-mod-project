    <div class="stumblr-title">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <span class="title_right"><?php echo date('d M, Y',get_the_time('U'));?></span>
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