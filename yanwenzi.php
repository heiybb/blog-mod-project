<script type="text/javascript">
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
</script>

<a href="javascript:yanwenzishuru();" id="yanwenzikaiguan">[ 颜文字关 ]</a>

<script type="text/javascript" charset="utf-8">//
				var changeMsg = "[ 颜文字开 ]";
				var closeMsg = "[ 颜文字关 ]";
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
				});
</script>
				
<style>.yanwenzi a{display: inline-block;padding: 5px;font-size:12px;}
.yanwenzi a:hover{background-color:#EEE}</style>

<div class="yanwenzi" style="display:none"><a href="javascript:grin('(⌒▽⌒)')"> (⌒▽⌒) </a> 
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
<a href="javascript:grin('ε=ε=(ノ≧?≦)ノ')"> ε=ε=(ノ≧?≦)ノ </a> 
<a href="javascript:grin('(′?_?`)')"> (′?_?`) </a> 
<a href="javascript:grin('(-_-#)')"> (-_-#) </a> 
<a href="javascript:grin('（￣へ￣）')"> （￣へ￣） </a> 
<a href="javascript:grin('(￣ε(#￣) Σ')"> (￣ε(#￣) Σ </a> 
<a href="javascript:grin('ヽ(`Д′)?')"> ヽ(`Д′)? </a> 
<a href="javascript:grin('（#-_-)┯━┯')"> （#-_-)┯━┯ </a> 
<a href="javascript:grin('_(:3」∠)_')"> _(:3」∠)_ </a> 
<a href="javascript:grin('(*′ω｀*)')"> (*′ω｀*) </a></div>