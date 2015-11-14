				<span id="show_author_info" style="display: none;">
					<a href="javascript:void(0);">( 换个马甲 )</a></span>
				<span id="hide_author_info" style="display: inline;">
					<a href="javascript:void(0);">( 关闭 )</a></span> 
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