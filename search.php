<?php get_header(); ?>

<?php $options = get_option('stumblr_options'); ?> 

        <div id="logo-top">
            <a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo($options['res_url']); ?>/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>" width="155" height="54">
           </a>
       </div><!-- end top styles logo -->   

<div id="post-404">
   	  	  <div id="post-<?php the_ID(); ?>" class="page type-page">
             <div class="stumblr-title"><h2>搜索结果</h2></div>
              <div class="stumblr-content">                                                   
           		 <?php if (have_posts()) : ?>
                 <ul>
                        <?php while (have_posts()) : the_post(); ?>                        
							<li><a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a></li>                           
                        <?php endwhile; ?>           
                 </ul>
                    <?php else : ?>               
          <p>对不起，没有找到您所搜索的内容。</p>
          <ul> 
            <li>看部动作片然后回来接着找？</li>
            <li>去 <strong><a href="<?php echo home_url(); ?>/">我的博客</a></strong> 瞧瞧有啥好东西</li> 
            <li>或 <a href="javascript:history.back()">返回</a> 之前的网页</li>
          </ul>
                             
                    <?php endif; ?>
              </div>
          
     <div class="clear"></div></div><!-- end page -->
</div>