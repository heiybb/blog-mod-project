<?php function hf_comment($comment, $args, $depth)
{ $GLOBALS['comment'] = $comment; ?>
<li class="comment" id="li-comment-<?php comment_ID(); ?>">
	<div class="comment-body">
		<div class="comment-author">
			<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 45); } ?>
			<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()); ?>
			<div class="comment-meta commentmetadata"><?php echo get_comment_time('Y-m-d H:i'); ?> </div>
		</div>
		<div class="comment_content" id="comment-<?php comment_ID(); ?>">
		<div class="comment_text">
			<?php if ($comment->comment_approved == '0') : ?>
			<span>你的评论正在审核，稍后会显示出来！</span><br />
			<?php endif; ?><?php comment_text(); ?>
		<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div></div></div></div></li><?php } ?>
<?php wp_list_comments('type=comment&callback=hf_comment');?>