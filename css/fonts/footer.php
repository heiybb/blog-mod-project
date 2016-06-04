<?php $options = get_option('stumblr_options'); ?> 

	<?php if ( is_active_sidebar( 'stumblr_footer')) { ?>     
   <div id="footer-area">
			<?php dynamic_sidebar( 'stumblr_footer' ); ?>
        </div><!-- // footer area -->   
<?php }  ?>           

 <div id="copyright">
<?php if($options['footerinfo'] && $options['footerinfo_content']) : ?>
    <p><?php echo($options['footerinfo_content']); ?> |  <a href="http://massen.fm" rel="tooltip" title="由 Massen 进行了主题的编码与设计" target="_blank"> Redesign by Massen </a></p>
<?php else : ?> 
 <p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> All Rights Reserved | <a href="<?php echo esc_url( __('http://www.eleventhemes.com/', 'eleventhemes') ); ?>" rel="tooltip" title="原主题来自 Eleven Theme" target="_blank"> Eleven Themes </a> |  <a href="http://massen.fm" rel="tooltip" title="由 Massen 进行了主题的编码与设计" target="_blank"> Redesign by Massen </a></p>
<?php endif; ?>  
 </div> 

  <div id="copyright-small" align="center">
 <p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> | <a href="http://wordpress.org" title="程序" target="_blank">WordPress </a> |  <a href="http://Massen.fm" title="重新编码与设计" target="_blank">Theme</a> | <a href="<?php echo home_url( '' ); ?>/feed" title="订阅文章RSS" target="_blank">RSS</a></p>
 </div><!-- // copyright -->   



</div><!-- // wrap -->   
	
<?php wp_footer(); ?>

<script src="<?php echo($options['res_url']); ?>/js/deecoct.js"></script>
<!--<script src="<?php echo($options['res_url']); ?>/js/bootstrap.js"></script>-->
<link rel="stylesheet" href="<?php echo($options['res_url']); ?>/css/font.css?ver=1.3"/>

<script>
$(function() {

$('#wrap').tooltip({
      selector: "a[rel=tooltip]"
    })

        })
</script>

<!--go to top code-->
<script>
/* <![CDATA[ */
(new GoTop()).init({
	pageWidth		:980,
	nodeId			:'go-top',
	nodeWidth		:50,
	distanceToBottom	:200,
	hideRegionHeight	:130,
	text			:''
});
/* ]]> */
</script>


<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=8&amp;mini=1&amp;pos=left&amp;uid=6628951" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
var bds_config={"snsKey":"{'tsina':'746493349','tqq':'','t163':'','tsohu':''}"};
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->


<div class="tongji">
	<?php echo($options['footercode']); ?>
</div>
<!-- <?php echo get_num_queries(); ?> queries in <?php timer_stop(3); ?> seconds -->
</body>
</html>