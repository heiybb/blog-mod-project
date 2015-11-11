<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
 <div class="comments-area"> 
	<div class="Comments_C"><?php comments_number('暂无评论', '孤单的评论', '% 条评论');?></div>
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>
</div>
	
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="comment-form">
	<div class="replytitle"><span>Leave a Reply</span></div>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>
			<div class="writerinfo_div">
				哟，<?php echo $user_identity; ?>欢迎回来！
				<span id="show_author_info" style="display: none;">
					<a href="javascript:void(0);">( 换个马甲 )</a></span>
				<span id="hide_author_info" style="display: inline;">
					<a href="javascript:void(0);">( 关闭 )</a>
					<iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe></span> 
				<script type="text/javascript">jQuery(document).ready(function() { //开始
					if(jQuery('input#author[value]').length>0){ //判断用户框是否有值
					jQuery("#author_info").css('display','none'); //将id为author_info的对象的display属性设为none，即隐藏
					jQuery('#hide_author_info').css('display','none'); //隐藏close
					jQuery('#show_author_info').click(function() { //鼠标点击change时发生的事件
					jQuery('#author_info').slideDown('slow') //用户输入框向下滑出
					jQuery('#show_author_info').css('display','none'); //隐藏change
					jQuery('#hide_author_info').css('display','inline'); //显示close
					jQuery('#hide_author_info').click(function() { // 鼠标点击close时发生的事件
					jQuery('#author_info').slideUp('slow') //用户输入框向上滑
					jQuery('#hide_author_info').css('display','none'); //隐藏close
					jQuery('#show_author_info').css('display','inline'); })})}}) //显示change</script>
			</div>
		<?php else : ?>
		<div id="author_info" style="display: block">
			<div class="writerinfo_div">
				<input type="text" name="author" id="author" value="" size="22" class="text-input" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="author">昵称<span class="red"> *</span></label></div>
			<div class="writerinfo_div">
				<input type="text" name="email" id="email" value="" size="22" class="text-input" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="author">邮箱<span class="red"> *</span></label></div>
			<div class="writerinfo_div">
				<input type="text" name="url" id="url" value="" size="22" class="text-input" tabindex="3" />
				<label for="author">站点</label></div>			
		</div>
		<?php endif; ?>	
				<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" class="comment-input"></textarea>
	    <div class="clear"></div>	
				<input name="submit" type="submit" id="submit" tabindex="5" value="发布" class="comment-submit" />
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
 </div>
		<?php endif; // If registration required and not logged in ?>
<?php endif; ?>
