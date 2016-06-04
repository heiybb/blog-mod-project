<?php get_header(); ?>

<?php $options = get_option('stumblr_options'); ?> 

<!-- top logo styles-->
        <div id="logo-top">
            <a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo($options['res_url']); ?>/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>" width="155" height="54">
           </a>
       </div><!-- end top styles logo -->     

<?php if (have_posts()) : ?>
<div id="pages-area">
<?php while (have_posts()) : the_post(); ?>	
   	  	  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="stumblr-title"><h2><?php the_title(); ?></h2></div>
              <div class="stumblr-content pages-content">                          
                    <?php if ( has_post_thumbnail() ) { ?><div class="stumblr-image"><?php the_post_thumbnail( 'stumblr-large-image' );  ?></div><?php } ?>  
                          
              		<div class="postcontent"><?php the_content(); ?></div>
                    
                    <?php wp_link_pages(); ?>
  
					<?php comments_template(); ?> 

              </div>   <!-- end stumblr-content -->                                           
    <div class="clear"></div> </div><!-- end post -->      
      
<?php endwhile; ?>
</div>
<?php else : ?>
<?php endif; ?>       
 
<?php get_footer(); ?>