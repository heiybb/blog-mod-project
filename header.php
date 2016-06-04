<!DOCTYPE html><html <?php language_attributes();?>> <!--设定网页语言-->
<meta http-equiv="content-type" content="text/html;charset=<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/><!--标注浏览器窗口等于设备屏幕宽度-->
<meta charset="<?php bloginfo('charset'); ?>" />
<?php $options = get_option('stumblr_options'); ?> 

<!--设定标题显示方式-->
<title>
  <?php if ( is_tag() ) {
    echo wp_title('Tag:');if($paged > 1) printf(' - 第%s页',$paged);echo ' -  '; bloginfo( 'name' );
  } elseif ( is_archive() ) {
    echo wp_title('');  if($paged > 1) printf(' - 第%s页',$paged);    echo ' -  ';    bloginfo( 'name' );
  } elseif ( is_search() ) {
    echo '&quot;'.wp_specialchars($s).'&quot;的搜索结果 -  '; bloginfo( 'name' );
  } elseif ( is_home() ) {
    bloginfo( 'name' );$paged = get_query_var('paged'); if($paged > 1) printf(' - 第%s页',$paged);
  }  elseif ( is_404() ) {
    echo 'Errors -  '; bloginfo( 'name' );
  } else {
    echo wp_title( ' -  ', false, right )  ; bloginfo( 'name' );
  } ?>
</title>

<!--设定关键词和描述-->
<?
if (is_home()){
     $description = $options['description_content'];
     $keywords = $options['keyword_content'];
}
elseif (is_category())
{
    $description = category_description();
    $keywords = single_cat_title('', false);
}
elseif (is_tag())
{
    $description = tag_description();
    $keywords = single_tag_title('', false);
}
 elseif (is_single())
{
	if ($post->post_excerpt) {
         $description     = $post->post_excerpt;
     } else {
         $description = substr(strip_tags($post->post_content),0,440);
     }
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ", ";
    }
}
?>
<meta name="keywords" content="<?=$keywords?>" />
<meta name="Description" content="<?=$description?>" />

<!--设定pingback地址-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />   

<?php wp_head(); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!--删除移动设备判断-->

<!--载入头部必须的style和js等资源-->
<link rel="stylesheet" href="<?php echo($options['res_url']); ?>/css/moder_2.min.css?ver=1.69"/>
<link rel="stylesheet" href="<?php echo($options['res_url']); ?>/css/small.css?ver=1.0"/>
<link rel="stylesheet" href="<?php echo($options['res_url']); ?>/css/icomoon.css?ver=1.21"/>
<link rel="stylesheet" href="<?php echo($options['res_url']); ?>/css/newcom.css?ver=1.30"/>
<link rel="Shortcut Icon" href="https://dn-cdn-blog.qbox.me/wp_theme/images/favicon.ico" type="image/x-icon" />
<script src="<?php echo($options['res_url']); ?>/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo($options['res_url']); ?>/js/topjs.js?ver=1.1"></script>
<!--<script src="<?php echo($options['res_url']); ?>/js/imgSizer.js"></script>-->

<script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });
</script>

<!-- 限制最大图片输出的宽度以免溢出 -->
<script type="text/javascript">
$(document).ready(function(){
    var img_cont=($('.postcontent').find('img')).length; //find div and find img
    if (img_cont != 0) { //if not images, cache div
    var maxwidth=660; //images max width
    var maxwidth_value=maxwidth+'px';
    for (var i=0;i<=img_cont-1;i++) {
    var max_width=$('.postcontent img:eq('+i+')');
    if (max_width.width() > maxwidth) {
    max_width.addClass('max_width_img').removeAttr("width").removeAttr("height").css({"cursor":"pointer","width":maxwidth_value,"height":"auto"});
   }
   }
    }
});
</script>

<!--
<script type="text/javascript">
addLoadEvent(function() {
　　　　var imgs = document.getElementById("content").getElementsByTagName("img");
　　　　imgSizer.collate(imgs);
　　});
</script>
-->
</head> <!--head END-->

<body>
<script type="text/javascript">
$.backstretch("<?php echo($options['webbg_url']); ?>");
</script>

  <div id="wrap">