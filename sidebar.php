<div id="stumblr-sidebar" class="pinned">
    <div id="logo" class="animated bounceIn">
        <a href="<?php echo home_url( '/' ); ?>" class="logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <h1>
                <strong>
                    <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                </strong>
            </h1>
        </a>
    </div>
    <!-- end logo -->
    <div class="feed">
        <a href="<?php echo home_url( '' ); ?>/feed" target="_blank" title="RSS 订阅">
            RSS
        </a>
    </div>
    <!--end feed-->
    <?php if ( is_active_sidebar( 'stumblr_widgets')) { ?>
        <div id="sidebar-widget-area">


            <!-- google site serache js-->
            
            <script type="text/javascript">                            var dispatch = function() {
                                q = document.getElementById("q");
                                if (q.value != "") {
                                    window.open('https://www.google.com.hk/search?q=site:heiybb.com%20' + q.value, "_blank");
                                    return false;
                                } else {
                                    return false;
                                }
                            }</script>

            <div id="search-2" class="side-widget widget_search">

                <!-- google site search -->

                <form <form onsubmit="return dispatch()" id="searchform">
                    <div>
                        <input type="text" name="q" id="q" value="Search..." onblur="if(this.value=='') this.value='Search...';"
                        onfocus="if(this.value=='Search...') this.value='';">
                        <input type="submit" id="searchsubmit" value="Search">
                    </div>
                </form>

                <!-- google 自定义搜索，对应的文件在 google_search.php-->

                    <!--<form method="get" action="/search" id="searchform"> 
                    <div>
                        <input type="text" name="q" value="Search..." onblur="if(this.value=='') this.value='Search...';"
                        onfocus="if(this.value=='Search...') this.value='';">
                        <input type="submit" id="searchsubmit" value="搜索">
                    </div>
                </form>-->

            <!--隐藏站内搜索-->
                <!--<form role="search" method="get" id="searchform" action="<?php echo home_url( '' ); ?>/">
                <div>
                <input type="text" value="搜索内容..." name="s" id="s"   onblur="if(this.value=='') this.value='搜索内容...';" onfocus="if(this.value=='搜索内容...') this.value='';">
                <input type="submit" id="searchsubmit" value="搜索">
                </div>
                </form>-->

            </div>
            <?php dynamic_sidebar( 'stumblr_widgets' ); ?>
        </div>
        <!-- // sidebar-widget-area-->
        <?php } ?>
</div>