/*
Author: mg12
Update: 2012/05/04
Author URI: http://www.neoease.com/
*/

GoTop = function() {

	this.config = {
		pageWidth			:960,		// Ò³Ãæ¿í¶È
		nodeId				:'go-top',	// Go Top ½ÚµãµÄ ID
		nodeWidth			:50,		// Go Top ½Úµã¿í¶È
		distanceToBottom	:120,		// Go Top ½ÚµãÉÏ±ßµ½Ò³Ãæµ×²¿µÄ¾àÀë
		distanceToPage		:20,		// Go Top ½Úµã×ó±ßµ½Ò³ÃæÓÒ±ßµÄ¾àÀë
		hideRegionHeight	:90,		// Òþ²Ø½ÚµãÇøÓòµÄ¸ß¶È (¸ÃÇøÓò´ÓÒ³Ãæ¶¥²¿¿ªÊ¼)
		text				:''			// Go Top µÄÎÄ±¾ÄÚÈÝ
	};

	this.cache = {
		topLinkThread		:null		// ÏÔÊ¾ Go Top ½ÚµãµÄÏß³Ì±äÁ¿ (ÓÃÓÚ IE6)
	}
};

GoTop.prototype = {

	init: function(config) {
		this.config = config || this.config;
		var _self = this;

		// ¹ö¶¯ÆÁÄ», ÐÞ¸Ä½ÚµãÎ»ÖÃºÍÏÔÊ¾×´Ì¬
		jQuery(window).scroll(function() {
			_self._scrollScreen({_self:_self});
		});

		// ¸Ä±äÆÁÄ»³ß´ç, ÐÞ¸Ä½ÚµãÎ»ÖÃ
		jQuery(window).resize(function() {
			_self._resizeWindow({_self:_self});
		});

		// ÔÚÒ³ÃæÖÐ²åÈë½Úµã
		_self._insertNode({_self:_self});
	},

	/**
	 * ÔÚÒ³ÃæÖÐ²åÈë½Úµã
	 */
	_insertNode: function(args) {
		var _self = args._self;

		// ²åÈë½Úµã²¢°ó¶¨½ÚµãÊÂ¼þ, µ±½Úµã±»µã»÷, ÓÃ 0.4 ÃëµÄÊ±¼ä¹ö¶¯µ½Ò³Ãæ¶¥²¿
		var topLink = jQuery('<a id="' + _self.config.nodeId + '" href="#">' + _self.config.text + '</a>');
		topLink.appendTo(jQuery('body'));
		if(jQuery.scrollTo) {
			topLink.click(function() {
				jQuery.scrollTo({top:0}, 400);
				return false;
			});
		}

		// ½Úµãµ½ÆÁÄ»ÓÒ±ßµÄ¾àÀë
		var right = _self._getDistanceToBottom({_self:_self});

		// IE6 (²»Ö§³Ö position:fixed) µÄÑùÊ½
		if(/MSIE 6/i.test(navigator.userAgent)) {
			topLink.css({
				'display': 'none',
				'position': 'absolute',
				'right': right + 'px'
			});

		// ÆäËûä¯ÀÀÆ÷µÄÑùÊ½
		} else {
			topLink.css({
				'display': 'none',
				'position': 'fixed',
				'right': right + 'px',
				'top': (jQuery(window).height() - _self.config.distanceToBottom) + 'px'
			});
		}
	},

	/**
	 * ÐÞ¸Ä½ÚµãÎ»ÖÃºÍÏÔÊ¾×´Ì¬
	 */
	_scrollScreen: function(args) {
		var _self = args._self;

		// µ±½Úµã½øÈëÒþ²ØÇøÓò, Òþ²Ø½Úµã
		var topLink = jQuery('#' + _self.config.nodeId);
		if(jQuery(document).scrollTop() <= _self.config.hideRegionHeight) {
			clearTimeout(_self.cache.topLinkThread);
			topLink.hide();
			return;
		}

		// ÔÚÒþ²ØÇøÓòÖ®Íâ, IE6 ÖÐÐÞ¸Ä½ÚµãÔÚÒ³ÃæÖÐµÄÎ»ÖÃ, ²¢ÏÔÊ¾½Úµã
		if(/MSIE 6/i.test(navigator.userAgent)) {
			clearTimeout(_self.cache.topLinkThread);
			topLink.hide();

			_self.cache.topLinkThread = setTimeout(function() {
				var top = jQuery(document).scrollTop() + jQuery(window).height() - _self.config.distanceToBottom;
				topLink.css({'top': top + 'px'}).fadeIn();
			}, 400);

		// ÔÚÒþ²ØÇøÓòÖ®Íâ, ÆäËûä¯ÀÀÆ÷ÏÔÊ¾½Úµã
		} else {
			topLink.fadeIn();
		}
	},

	/**
	 * ÐÞ¸Ä½ÚµãÎ»ÖÃ
	 */
	_resizeWindow: function(args) {
		var _self = args._self;

		var topLink = jQuery('#' + _self.config.nodeId);

		// ½Úµãµ½ÆÁÄ»ÓÒ±ßµÄ¾àÀë
		var right = _self._getDistanceToBottom({_self:_self});

		// ½Úµãµ½ÆÁÄ»¶¥²¿µÄ¾àÀë
		var top = jQuery(window).height() - _self.config.distanceToBottom;
		// IE6 ÖÐÊ¹ÓÃµ½Ò³Ãæ¶¥²¿µÄ¾àÀëÈ¡´ú
		if(/MSIE 6/i.test(navigator.userAgent)) {
			top += jQuery(document).scrollTop();
		}

		// ÖØ¶¨Òå½ÚµãÎ»ÖÃ
		topLink.css({
			'right': right + 'px',
			'top': top + 'px'
		});
	},

	/**
	 * »ñÈ¡½Úµãµ½ÆÁÄ»ÓÒ±ßµÄ¾àÀë
	 */
	_getDistanceToBottom: function(args) {
		var _self = args._self;

		// ½Úµãµ½ÆÁÄ»ÓÒ±ßµÄ¾àÀë = (ÆÁÄ»¿í¶È - Ò³Ãæ¿í¶È + 1 "´Ë´¦ 1px ÓÃÓÚÏû³ýÆ«ÒÆ" ) / 2 - ½Úµã¿í¶È - ½Úµã×ó±ßµ½Ò³ÃæÓÒ±ßµÄ¿í¶È (20px), Èç¹ûµ½ÓÒ±ß¾àÀëÆÁÄ»±ß½ç²»Ð¡ÓÚ 10px
		var right = parseInt((jQuery(window).width() - _self.config.pageWidth + 1)/2 - _self.config.nodeWidth - _self.config.distanceToPage, 10);
		if(right < 10) {
			right = 10;
		}

		return right;
	}
};


// ednednednendnendndddddddddddddddddddddd

/**
* Jquery link pingyi
*/


$('#sidebar-widget-area a').hover(function() {
$(this).stop().animate({'left': '5px'}, 'fast');
}, function() {
$(this).stop().animate({'left': '0px'}, 'fast');
});


/**
* Jquery link pingyi  END
*/
