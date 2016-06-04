<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<!-- Comments Callback Funtion Part Begin -->
<?php function hf_comment($comment, $args, $depth)
				{ $GLOBALS['comment'] = $comment; ?>			
				<li class="comment" id="li-comment-<?php comment_ID(); ?>">				
					<!-- Comments Top Part Begin-->
					<div class="author-avatar"><?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 50); } ?></div>				
					<div class="author-name"><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()); ?></div>
					<div class="author-time"><?php echo get_comment_time('Y-m-d H:i'); ?></div>
					<div class="clear"></div>
					<!-- Comments Middle Part Begin-->
					<div class="comment-container" id="comment-<?php comment_ID(); ?>">			
						<?php if ($comment->comment_approved == '0') : ?>
							<div id="uc_com_info" class="comment-entry"><p>------Your comment is awaiting moderation------</p></div>
							<div id="uc_com_text" class="comment-entry"><?php comment_text(); ?></div>
						<?php else :?>
							<div class="comment-entry"><?php comment_text(); ?></div>
						<?php endif; ?>
						<div class="clear"></div>
						<div id="reply-top"><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
					</div>
					<!-- Comments Bottom Part End-->				
				</li><?php } ?>	
<!-- Comments Callback Funtion Part End -->

<!-- Javascript Prepare Part Begin -->
<script type = "text/javascript" >
function grin(tag) {
    var myField;
    tag = ' ' + tag + ' ';
    if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
        myField = document.getElementById('comment');} 
	else {return false;}
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = tag;
        myField.focus(); } 
	else if (myField.selectionStart || myField.selectionStart == '0') {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        var cursorPos = endPos;
        myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length);
        cursorPos += tag.length;
        myField.focus();
        myField.selectionStart = cursorPos;
        myField.selectionEnd = cursorPos; }
	else {
        myField.value += tag;
        myField.focus(); } }</script>

<script type="text/javascript" charset="utf-8">
				var changeMsg = "[ Emoticon ON ]";
				var closeMsg = "[ Emoticon OFF ]";
				function yanwenzishuru() {
					jQuery('.yanwenzi').slideToggle('fast', function(){
						if ( jQuery('.yanwenzi').css('display') == 'none' ) {
						jQuery('#yanwenzikaiguan').text(changeMsg);
						} else {
						jQuery('#yanwenzikaiguan').text(closeMsg);
				}
			});
		}
				jQuery(document).ready(function(){
					jQuery('.yanwenzi').hide();
				});</script>
<!-- Javascript Prepare Part End -->

<?php if ( have_comments() ) : ?>
	<div class="comment-num"><?php comments_number('No Comment', 'Lonely Comment', '% Comments');?></div>
	<div class="comment-area"> 
		<ol class="commentlist" style="display:block">				
			<?php wp_list_comments('type=comment&callback=hf_comment');?>
		</ol>
	</div>
<?php else : ?>
	<?php if ( comments_open() ) : ?>
	<?php else : ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div id="respond-form">
		<div class="replytitle"><span>Leave a Reply</span></div>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">	
			<?php if ( is_user_logged_in() ) : ?>
				<div class="writerinfo_div">Hi,<?php echo $user_identity; ?>,Welcome Back!</div>
			<?php else : ?>
			<div id="author_info" style="display: block">
				<div class="writerinfo_div">
					<input style="outline:none" type="text" name="author" id="author" value="" size="22" class="text-input" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					<label for="author">Name<span class="red"> *</span></label></div>
				<div class="writerinfo_div">
					<input style="outline:none" type="text" name="email" id="email" value=""size="22" class="text-input" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					<label for="author">Email<span class="red"> *</span></label></div>
				<div class="writerinfo_div">
					<input style="outline:none" type="text" name="url" id="url" value="" size="22" class="text-input" tabindex="3" />
					<label for="author">Website</label></div>			
			</div>		
			<?php endif; ?>
				<div id="emoji">
				<a style="color:#587686" href="javascript:yanwenzishuru();" id="yanwenzikaiguan">[ Emoticon On ]</a></div>
				<div class="yanwenzi" style="display:none">
				<a href="javascript:grin('(⌒▽⌒)')"> (⌒▽⌒) </a> 
				<a href="javascript:grin('（￣▽￣）')"> （￣▽￣） </a> 
				<a href="javascript:grin('(=?ω?=)')"> (=?ω?=) </a> 
				<a href="javascript:grin('(｀?ω?′)')"> (｀?ω?′) </a> 
				<a href="javascript:grin('(?￣△￣)?')"> (?￣△￣)? </a> 
				<a href="javascript:grin('(???)')"> (???) </a> 
				<a href="javascript:grin('(°?°)?')"> (°?°)? </a> 
				<a href="javascript:grin('(￣3￣)')"> (￣3￣) </a> 
				<a href="javascript:grin('╮(￣▽￣)╭')"> ╮(￣▽￣)╭ </a> 
				<a href="javascript:grin('( ′_ゝ｀)')"> ( ′_ゝ｀) </a> 
				<a href="javascript:grin('←_←')"> ←_← </a> 
				<a href="javascript:grin('(<_<)')"> (&lt;_&lt;) </a> 
				<a href="javascript:grin('(>_>)')"> (&gt;_&gt;) </a> 
				<a href="javascript:grin('(;?_?)')"> (;?_?) </a> 
				<a href="javascript:grin('(?Д?≡?д?)!?')"> (?Д?≡?д?)!? </a> 
				<a href="javascript:grin('Σ(?д?;)')"> Σ(?д?;) </a> 
				<a href="javascript:grin('Σ( ￣□￣||)')"> Σ( ￣□￣||) </a> 
				<a href="javascript:grin('(′；ω；`)')"> (′；ω；`) </a> 
				<a href="javascript:grin('（/TДT）/')"> （/TДT)/ </a> 
				<a href="javascript:grin('(^?ω?^ )')"> (^?ω?^ ) </a> 
				<a href="javascript:grin('(??ω??)')"> (??ω??) </a> 
				<a href="javascript:grin('(●￣(?)￣●)')"> (●￣(?)￣●) </a> 
				<a href="javascript:grin('(ノ≧?≦)ノ')"> (ノ≧?≦)ノ </a> 
				<a href="javascript:grin('(′?_?`)')"> (′?_?`) </a> 
				<a href="javascript:grin('(-_-#)')"> (-_-#) </a> 
				<a href="javascript:grin('（￣へ￣）')"> （￣へ￣） </a> 
				<a href="javascript:grin('(￣ε(#￣) Σ')"> (￣ε(#￣) Σ </a> 
				<a href="javascript:grin('ヽ(`Д′)?')"> ヽ(`Д′)? </a> 
				<a href="javascript:grin('（#-_-)┯━┯')"> （#-_-)┯━┯ </a> 
				<a href="javascript:grin('_(:3」∠)_')"> _(:3」∠)_ </a> 
				<a href="javascript:grin('(*′ω｀*)')"> (*′ω｀*) </a></div>
				<textarea style="outline:none" name="comment" id="comment" cols="58" rows="10" tabindex="4" class="comment-input"></textarea>
				<div id="reply-bottom">
				<input name="submit" style="outline:none" type="submit" class="comment-reply-link" tabindex="5" value="Reply" /></div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	</div>
<?php endif;?>