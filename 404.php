<?php get_header(); ?>

<?php $options = get_option('stumblr_options'); ?> 

<!-- top logo styles-->
        <div id="logo-top">
            <a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo($options['res_url']); ?>/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>" width="155" height="54">
           </a>
       </div>
<!-- end top styles logo -->     
<br><br><br>
<style> 
.divcenter{text-align:center} 
</style>
<div id="post-<?php the_ID(); ?>" class="page type-page">

	<div class="divcenter"><img src="https://dn-img-blog.qbox.me/404.png" /></div> 
                                               
<div class="clear"></div></div>
<!-- end page -->    