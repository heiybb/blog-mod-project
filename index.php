<?php get_header(); ?>
<?php get_template_part('sidebar'); ?>
<div id="post-area" class="conta">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php include(TEMPLATEPATH . '/postformat.php'); ?>
	<?php endwhile; endif;?><!--end have post-->   
<?php stumblr_pagination(); ?><!--输出数字翻页-->
	<div class="navpages" align="center">
		<?php previous_posts_link('« 上一页', '0') ?>
		<span class="nav2">
			<?php next_posts_link('下一页 »', 0); ?>
		</span>
	</div><!-- // navpages-->
</div><!-- // post-area--><?php get_footer(); ?>