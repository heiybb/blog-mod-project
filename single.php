<?php get_header(); ?>
<?php get_template_part('sidebar'); ?>
 
<div id="post-area">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   	  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( has_post_format( 'video' )){ ?> 
	<div class="stumblr-title">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <div class="title-label"><div class="inner"><?php the_time( 'Y - n - j'); ?>&nbsp;&nbsp;•<span class="entry-cate"><a href="#" title="查看该分类下的所有文章"><?php the_category(', '); ?></a></span></div></div>
    </div>
	<div class="stumblr-content">
            <div class="stumblr-video">
            <div class="pc-video">
            	<div class="single-video">
			<!--[if IE]>
			<embed src="<?php $key="视频地址"; echo get_post_meta($post->ID, $key, true); ?>" quality="high" width="740" height="460" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>
			<div class="video-bottom">video</div>
			<![endif]-->

			<!--非ie浏览器-->
			<!--[if !IE]>-->

			<?php if(get_post_meta($post->ID, '视频ID', true)){ ?>

				<iframe height="460" width="740" src="http://player.youku.com/embed/<?php $key="视频ID"; echo get_post_meta($post->ID, $key, true); ?>" frameborder=0 allowfullscreen></iframe>
			
			<?php } else if(get_post_meta($post->ID, '视频地址', true)){ ?>

				<embed src="<?php $key="视频地址"; echo get_post_meta($post->ID, $key, true); ?>" quality="high" width="741" height="460" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>

			<?php } else { ?>

			<?php } ?> <!--<![endif]-->
			
				</div>
			</div>		
		</div>
	<div class="postcontent">
		<?php the_content(__('more')); ?>
	</div>
     <?php wp_link_pages(); ?>            
     <?php comments_template(); ?>				
</div>   

<div class="stumblr-meta">
	<p><?php the_tags(); ?></p>
	<p><span class="stumblr-date"><?php the_time(get_option('date_format')); ?></span> <span class="stumblr-category"> <?php the_category(', ') ?></span></p>
</div>   
<div class="clear"></div>
</div><!-- end post -->   

<?php } else { ?> 

			<div class="stumblr-title">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				        <div class="title-label"><div class="inner"><?php the_time( 'Y - n - j'); ?>&nbsp;&nbsp;•<span class="entry-cate"><a href="#" title="查看该分类下的所有文章"><?php the_category(', '); ?></a></span></div></div>
			</div>
			<?php if ( has_post_thumbnail() ) { ?><div class="stumblr-image"><?php the_post_thumbnail( 'stumblr-large-image' );  ?></div><?php } ?> 
				<div class="stumblr-content">
					 
					<div class="postcontent">
						<?php the_content(__('more')); ?>				 
					</div>
				    <?php wp_link_pages(); ?>              
                    <?php comments_template(); ?>	
				</div>           
				<div class="stumblr-meta" style="float:none !important;">
					<p><span class="stumblr-single-tags">TAG: <?php the_tags('', '  ', ''); ?></span></p>	
				<div class="clear"></div>
			</div><!-- end post -->
			<?php } ?>     <!--判断第一次结束--> 
			<?php endwhile; endif;?><!--end have post-->
</div>
 

 
<?php get_footer(); ?>