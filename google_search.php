<?php
/*
Template Name: search
*/
?>
<?php $options = get_option('stumblr_options'); ?> 
<?php get_header(); ?>

        <div id="logo-top">
            <a href="<?php echo home_url( '/' ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="http://cdn.levtu.com/wp_theme/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>" width="155" height="54">
           </a>
       </div><!-- end top styles logo -->   

<div id="post-404">
   	  	  <div id="post-<?php the_ID(); ?>" class="page type-page">
             <div class="stumblr-title"><h2>搜索结果</h2></div>


          <div id="cse" style="width: 100%;">正在搜索</div>
<script src="http://www.google.cn/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : 'zh-CN'});
  google.setOnLoadCallback(function(){
        var customSearchControl = new google.search.CustomSearchControl('012160869225136521728:kdfgqiwcf9u');
        customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
        customSearchControl.draw('cse');
        customSearchControl.setNoResultsString('什么也没找到，尝试换个搜索关键词');
var match = location.search.match(/q=([^&]*)(&|$)/);
if(match && match[1]){
    var search = decodeURIComponent(match[1]); 
customSearchControl.execute(search);
}

    });
</script>
<link rel="stylesheet" href="http://www.google.com.hk/cse/style/look/shiny.css" type="text/css" />


     <div class="clear"></div></div><!-- end page -->
</div>