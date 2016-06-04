<?php 
//////////////主题选项
	class stumblrOptions {
	function getOptions() {
		$options = get_option('stumblr_options');
		if (!is_array($options)) {
			$options['footerinfo'] = false;
			$options['footerinfo_content'] = '';
			$options['description_content'] = '';
			$options['keyword_content'] = '';
			$options['headcode'] = '';
			$options['footercode'] = '';
			/*外观*/	
			$options['res_url_ck'] = false;
			$options['favicon_ck'] = false;
			$options['webbg_url_ck'] = false;
			$options['res_url'] = '';
			$options['webbg_url'] = '';

			/*功能的*/
			$options['sharebutton'] = false;	
			$options['ajax_cmt'] = false;				
			$options['lightbox'] = false;							
				/**幻灯片end**/
			$options['snsn_confirm'] = false; //是否开启
			// TODO: 在这里追加其他选项
			update_option('stumblr_options', $options);
		}
		return $options;
	}
	/* -- 初始化 -- */
	function init() {
		if(isset($_POST['stumblr_save'])) {
			$options = stumblrOptions::getOptions();
			// 数据限制	
			$options['description_content'] = stripslashes($_POST['description_content']);
			$options['keyword_content'] = stripslashes($_POST['keyword_content']);
			$options['res_url'] = stripslashes($_POST['res_url']);
			$options['webbg_url'] = stripslashes($_POST['webbg_url']);
			if ($_POST['footerinfo']) { $options['footerinfo'] = (bool)true; } else { $options['footerinfo'] = (bool)false; }		
			$options['footerinfo_content'] = stripslashes($_POST['footerinfo_content']);
			$options['footercode'] = stripslashes($_POST['footercode']);			
			// TODO: 在这追加其他选项的限制处理			
			update_option('stumblr_options', $options);
			echo "<div id='message' class='updated'><p><strong>设置已保存</strong></p></div>";
		} else {stumblrOptions::getOptions();	}
		
		add_theme_page("stumblr设置", "stumblr设置", 'edit_themes', basename(__FILE__), array('stumblrOptions', 'display'));
	}

	/* -- 标签页 -- */
	function display() {
		$options = stumblrOptions::getOptions();
?>



 <style type="text/css">
.wrap{ font-size:12px; line-height:24px;}
.wrap p{}
#icon-options-general {
}
.submit {
    border-color: #DFDFDF;
    margin-left: 10px;
}
strong{ color:#000}
textarea{ width:100%; margin:0 20px 0 0;  overflow:auto}

fieldset{;margin:5px 0 10px;padding:20px 15px 15px;width:600px}
fieldset fieldset{ width:800px;} 
fieldset:hover{border-color:#bbb;}
fieldset legend{
    background: none repeat scroll 0 0 #2b1e15;
    color: #fff;
    cursor: pointer;
    font-size: 13px;
    padding: 0 10px;
	}
fieldset .line{border-bottom:1px solid #e5e5e5;padding-bottom:15px;}
</style>






<form action="#" method="post" enctype="multipart/form-data" name="stumblr_form" id="stumblr_form" />

	<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
					<h2>stumblr Theme Options</h2>             
					<fieldset>
						<div class="none">
						<strong>网站描述</strong> （建议在200字以内）<br/><label><textarea name="description_content"  rows="2"  id="description_content" style="width:600px;"  ><?php echo($options['description_content']); ?></textarea></label>
                        <br/><br/>
						
						<strong>网站关键词</strong> （多个关键词用英文的逗号隔开，例：博客,帅哥,小学生）<br/><label><textarea name="keyword_content"  rows="1"  id="keyword_content" style="width:600px;" ><?php echo($options['keyword_content']); ?></textarea></label>
                        <br/><br/>
						
<label><strong>自定义静态资源文件地址</strong> 必须设置，请输入：http://博客地址/wp-content/themes/stumblr</label><br/>
						<label><textarea name="res_url"  rows="1"  id="res_url" style="width:600px;"  ><?php echo($options['res_url']); ?></textarea></label>	
                        <br/><br/>	

<label><strong>自定义背景大图地址</strong> 此项必须设置，图片建议大小为 1000px x 996px </label><br/>
						<label><textarea name="webbg_url"  rows="1"  id="webbg_url" style="width:600px;"  ><?php echo($options['webbg_url']); ?></textarea></label>	
                        <br/><br/>	

						
							<strong>网站底部代码输入</strong>（通常用来添加统计代码等类似的内容，添加后不会在网站上显示出来）<br/>
							<label><textarea name="footercode"  rows="6"  id="footercode" style="width:600px;"  ><?php echo($options['footercode']); ?></textarea></label>		
							<br/><br/>				
						<label><input name="footerinfo" type="checkbox" value="checkbox" <?php if($options['footerinfo']) echo "checked='checked'"; ?> /><strong>自定义底部左侧信息</strong> （支持HTML代码）</label><br/>
						<label><textarea name="footerinfo_content"  rows="6"  id="footerinfo_content" style="width:600px;"  ><?php echo($options['footerinfo_content']); ?></textarea></label>	<br/><br/>											
						</div>
					</fieldset>
                    
			
              
 
		<!-- 提交按钮 -->
		<p class="submit">
			<input type="submit" name="stumblr_save" value="更新设置" />
		</p>
	</div>
 
</form>
 
<?php
	}
}
 
/**
 * 登记初始化方法
 */
add_action('admin_menu', array('stumblrOptions', 'init'));

/////////////// post thumbnail support

?>