<?php $options = get_option('stumblr_options'); ?> 

	<?php if ( is_active_sidebar( 'stumblr_footer')) { ?>     
   <div id="footer-area">
			<?php dynamic_sidebar( 'stumblr_footer' ); ?>
        </div><!-- // footer area -->   
<?php }  ?>           

 <div id="copyright">
    <p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> &nbsp;<a name="right">All Rights Reserved</a>&nbsp;|&nbsp;<a href="http://massen.fm" rel="tooltip" title="由 Massen 进行主题的编码与设计" target="_blank"> Theme design by Massen </a>&nbsp;|&nbsp;<a href="http://my.hengtian.org/aff.php?aff=2712" rel="tooltip" title="架设于衡天主机" target="_blank"> Hosted by Hengtian.cc </a>&nbsp;|&nbsp;<a href="https://portal.qiniu.com/signup?code=3llwj084tz58y" rel="tooltip" title="七牛云储存服务" target="_blank"> Qiniu CDN </a>&nbsp;|&nbsp;<a href="http://heiybb.com/sitemap.xml" rel="tooltip" title="Google Sitemaps" target="_blank"> Google Sitemaps </a></p>
 </div> 

  <div id="copyright-small" align="center">
 <p>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> &nbsp;| <a href="http://Massen.fm" title="重新编码与设计" target="_blank">Theme</a> | <a href="<?php echo home_url( '' ); ?>/feed" title="订阅文章RSS" target="_blank">RSS</a></p>
 </div><!-- // copyright -->   



</div><!-- // wrap -->   
	
<?php wp_footer(); ?>

<script src="<?php echo($options['res_url']); ?>/js/deecoct.js?ver=1.92"></script>
<script src="<?php echo($options['res_url']); ?>/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="<?php echo($options['res_url']); ?>/css/font.css?ver=1.4"/> -->

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

<div class="tongji">
	<?php echo($options['footercode']); ?>
</div>
</body>
</html>