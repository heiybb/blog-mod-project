<?php

// 禁止 WP 自动转义代码
remove_filter('the_content', 'wptexturize');


//lightbox 自动对图片链接添加rel=lightbox属性
add_filter('the_content', 'pirobox_gall_replace');
function pirobox_gall_replace ($content)
{ global $post;
$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
$replacement = '<a$1href=$2$3.$4$5 class="fancybox"$6>$7</a>';
$content = preg_replace($pattern, $replacement, $content);
return $content;
}

add_filter('the_content', 'piroboxs_gall_replace');
function piroboxs_gall_replace ($content)
{ global $post;
$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
$replacement = '<a$1href=$2$3.$4$5 rel="fancybox"$6>$7</a>';
$content = preg_replace($pattern, $replacement, $content);
return $content;
}

//*****************************************************
// 给后台编辑器添加前台 CSS 样式
//*****************************************************

function editor_styles($url) {
 
if (!empty($url)) $url .= ',';
 
$url .= trailingslashit(get_stylesheet_directory_uri()).'editor.css';
 
return $url;
 
}
 
if(current_user_can('edit_posts')):
 
add_filter('mce_css', 'editor_styles');
 
endif;


//*****************************************************
// 禁用图片压缩
//*****************************************************

//add_filter( 'jpeg_quality', 'jpeg_full_quality' );
//function jpeg_full_quality( $quality ) { return 100; }


//*****************************************************
// Image attachment
//*****************************************************
function gallery_get_images($size = 'full') {
	global $post;
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	$results = array();
	if ($photos) {
		foreach ($photos as $photo) {
		  $item = array();
		  $item['src'] = $photo->guid;
		  $item['image'] = wp_get_attachment_image($photo->ID, $size);
		  $results[] = $item;
		}
	}
	return $results;
}

// devices 

function is_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$mobile_browser = Array(
		"mqqbrowser", //手机QQ浏览器
		"opera mobi", //手机opera
		"juc","iuc",//uc浏览器
		"fennec","ios","applewebKit/420","applewebkit/525","applewebkit/532","iphone","ipaq","ipod",
		"iemobile", "windows ce",//windows phone
		"240x320","480x640","acer","android","anywhereyougo.com","asus","audio","blackberry","blazer","coolpad" ,"dopod", "etouch", "hitachi","htc","huawei", "jbrowser", "lenovo","lg","lg-","lge-","lge", "mobi","moto","nokia","phone","samsung","sony","symbian","tablet","tianyu","wap","xda","xde","zte"
	);
	$is_mobile = false;
	foreach ($mobile_browser as $device) {
		if (stristr($user_agent, $device)) {
			$is_mobile = true;
			break;
		}
	}
	return $is_mobile;
}

// end
   
	// Add RSS links to <head> section
	add_theme_support('automatic-feed-links') ;
	

	
	// content width
	if ( !isset( $content_width ))  {
		$content_width = 700; 
	}



	// clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Stumblr post thumbnails
	add_theme_support( 'post-thumbnails' );
		add_image_size('stumblr-large-image', 9999, 9999);

	
	
	// menu fallback
	
	function stumblr_addmenus() {
	register_nav_menus(
		array(
			'main_nav' => 'Main Menu',
			)
			);
	}

	add_action( 'init', 'stumblr_addmenus' );
	
	function stumblr_nav() {
		if ( function_exists( 'wp_nav_menu' ) )
			wp_nav_menu( 'menu=main_nav&container_class=pagemenu&fallback_cb=stumblr_nav_fallback' );
		else
			stumblr_nav_fallback();
	}
	
	function stumblr_nav_fallback() {
		echo '<li><a href="';
		echo home_url( '/' ); 
		echo '">Home</a></li>';
		wp_list_pages("depth=1&title_li=");
	}

     //setup footer widget area
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Side Widgets',
    		'id'   => 'stumblr_widgets',
    		'description'   => 'Side Widget Area',
    		'before_widget' => '<div id="%1$s" class="side-widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
		
		register_sidebar(array(
    		'name' => 'Footer Widgets',
    		'id'   => 'stumblr_footer',
    		'description'   => 'Footer Widget Area',
    		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
		
	}


  // video width
	 
	add_filter('embed_defaults', 'custom_embed_defaults');
	function custom_embed_defaults($embed_size) {
		if (is_single()) { // Conditionally set max height and width
			$embed_size['width'] = 740;
			$embed_size['height'] = 740;
		} else {           // Default values
			$embed_size['width'] = 740;
			$embed_size['height'] = 740;
		}
		return $embed_size; // Return new size
	}
 

   // pagination
   
  function stumblr_pagination($pages = '', $range = 2) {  
     $showitems = ($range * 2)+1;  
	 
     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='stuumblr-pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><i class='icon-arrow-left2'></i></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><i class='icon-arrow-left'></i></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'><i class='icon-arrow-right'></i></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'><i class='icon-arrow-right2'></i></a>";
         echo "</div>\n";
     }
	}

	// Stumblr theme options 
	include 'options/admin-menu.php';
	
	

// 使more标签点击之后不被带到more所在位置，而是直接从头开始阅读
	
/*function remove_more_jump_link($link) 
{ 
	$offset = strpos($link, '#more-');
	if ($offset) 
    {
		$end = strpos($link, '"',$offset);
	}
	if ($end) 
    {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

	//文章截断 by phoetry
	function my_more_link($link){
		$link=preg_replace('/#more-\d+/i','',$link);
		$link=str_replace('<a','<p class="read-more"><a rel="nofollow" ',$link);
		$link=str_replace('</a>','</a></p>',$link);
		return $link;
	}
	add_filter('the_content_more_link','my_more_link'); */ 

//取消WP自带jQuery

if ( !is_admin() ) { // 后台不用
if ( $localhost == 0 ) { // 本地调试不用
function my_init_method() {
wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
}
add_action('init', 'my_init_method'); // 加入功能, 前台使用 wp_enqueue_script( '名称' ) 加載
}
}
wp_deregister_script( 'l10n' );


remove_action('wp_head', 'feed_links',2 );//文章和评论feed
remove_action('wp_head','feed_links_extra',3 );//分类等feed

// 为主题添加post-format功能
	add_theme_support( 'post-formats', array( 'video' ) );


/*替换为v2ex的Gravatar CDN v2为gravatar*/
function getV2exAvatar($avatar) {
        $avatar = str_replace(array("http://www.gravatar.com/avatar","http://0.gravatar.com/avatar","https://secure.gravatar.com/avatar","http://1.gravatar.com/avatar","http://2.gravatar.com/avatar","http://cn.gravatar.com/avatar"),"https://gravatar.tycdn.net/avatar",$avatar);
        return $avatar;
}
add_filter('get_avatar', 'getV2exAvatar');

/** 替换图片为七牛CDN **/
function IMG_WEBP(){
    function IMG_URL($html){
		global $is_chrome;
        $pattern ='/https:\/\/(dn-img-blog\.qbox\.me|heiybb\.com\/wp-content)\/([^"\']*?)\.(jpg|png|jpeg)/i';
		if($is_chrome){
			$replacement = 'https://dn-img-blog.qbox.me/$2.$3?imageView2/1/q/85/format/WEBP';
		}
		else{
			$replacement = 'https://dn-img-blog.qbox.me/$2.$3';
		}
		$html = preg_replace($pattern, $replacement,$html);
	return $html;
	}	
    if(!is_admin()){
        ob_start("IMG_URL");
    }
}
add_action('init', 'IMG_WEBP');

/*禁止加载Emjo表情*/
function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

/*评论处理*/
add_action( 'init', 'disable_emojis' );
//屏蔽纯英文评论和纯日文
function inlojv_comment_post( $incoming_comment ) {
$pattern = '/[一-龥]/u';
// 禁止全英文评论
if(!preg_match($pattern, $incoming_comment['comment_content'])) {
wp_die( "您的评论中必须包含汉字!比如博主真帅！" );
}
$pattern = '/[あ-んア-ン]/u';
// 禁止日文评论
if(preg_match($pattern, $incoming_comment['comment_content'])) {
wp_die( "评论禁止包含日文!" );
}
return( $incoming_comment );
}
add_filter('preprocess_comment', 'inlojv_comment_post');