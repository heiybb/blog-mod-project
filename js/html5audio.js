jQuery(document).ready(function($) {
	var AudioPlayer = function(element) {
			this.element = element;
			this.audio = new Audio();
			this.init()
		};
	AudioPlayer.prototype = {
		init: function() {
			if (window['Audio'] && this.audio.canPlayType('audio/mpeg')) {
				this.setAudio()
			} else {
				return
			}
		},
		setAudio: function() {
			var swf_data_tmp = this.element.children("embed").attr("src").split("?url=")[1],
				swf_data = swf_data_tmp.split("&"),
				swf_src = swf_data[0],
				swf_auto = swf_data[1].split("=")[1],
				swf_title = swf_data[3].split("=")[1];
			this.audio.src = swf_src;
			this.audio.id = "audio-player-" + Math.ceil(new Date()/3600000);
			this.src = swf_src;
			this.autoPlay = swf_auto;
			console.log(this.audio);
			this.element.html('<div class="audio-player">\
				<div class="play-button"></div>\
				<div class="play-box">\
				<div class="play-title">' + swf_title + '</div>\
				<div class="play-data">\
				<div class="play-prosess">\
				<div class="play-prosess-bar">\
				<div class="play-prosess-thumb">\
				</div>\
				</div>\
				</div>\
				<div class="play-right">\
				<div class="play-timer">00:00</div>\
				<div class="play-volume"></div>\
				</div>\
				</div>\
				</div>\
				</div>\
				').append(this.audio);
			this.setEvent()
		},
		setEvent: function() {
			var that = this,
				_handle = this.element.find(".play-prosess-thumb"),
				_volume = this.element.find(".play-volume"),
				_prosess = _handle.parent(),
				_prosessBar = _prosess.parent(),
				W = _prosessBar.width(),
				hasTouch = ("createTouch" in document) || ('ontouchstart' in window),
				startEvent = hasTouch ? "touchstart" : "mousedown",
				moveEvent = hasTouch ? "touchmove" : "mousemove",
				endEvent = hasTouch ? "touchend" : "mouseup";
				
			if (/(iPhone|iPad|iPod)/i.test(navigator.userAgent)) {
				var $button = this.element.find(".play-button");
				$button.bind("click", function() {
					if($("#" + this.audio.id).length>0){
						$("#" + this.audio.id).remove();
						that.audio = new Audio(that.src);
						that.audio.play();
						that.audio.addEventListener("canplay", function() {
							(that.autoPlay>0) && that.getplay()
						}, false);
						that.audio.addEventListener("play", function() {
							$button.addClass("playing")
						}, false);
						that.audio.addEventListener("pause", function() {
							$button.removeClass("playing")
						}, false);
						that.audio.addEventListener("ended", function() {
							this.pause();
							this.currentTime = 0
						}, false);
						that.audio.addEventListener("error", function() {
							that.element.find(".play-title").html('<span style="color:red">error: ' + $(".play-title").html() + '</span>')
						}, false);
						that.audio.addEventListener("timeupdate", function() {
							that.element.find(".play-prosess-bar").width(this.currentTime / this.duration * 100 + "%");
							that.element.find(".play-timer").html(that.formatTime(this.currentTime))
						}, false);
					}else{
						that.getplay()
					}
				});
			} else {
				this.element.find(".play-button").bind("click", function() {
					that.getplay()
				});
			}
				this.audio.addEventListener("canplay", function() {
					(that.autoPlay>0) && that.getplay()
				}, false);
				this.audio.addEventListener("play", function() {
					that.element.find(".play-button").addClass("playing")
				}, false);
				this.audio.addEventListener("pause", function() {
					that.element.find(".play-button").removeClass("playing")
				}, false);
				this.audio.addEventListener("ended", function() {
					this.pause();
					this.currentTime = 0
				}, false);
				this.audio.addEventListener("error", function() {
					that.element.find(".play-title").html('<span style="color:red">error: ' + $(".play-title").html() + '</span>')
				}, false);
				this.audio.addEventListener("timeupdate", function() {
					that.element.find(".play-prosess-bar").width(this.currentTime / this.duration * 100 + "%");
					that.element.find(".play-timer").html(that.formatTime(this.currentTime))
				}, false);

			_handle.bind(startEvent, _drag);
			_handle.unbind(endEvent, _drag);
			_prosessBar.bind("click", function(e) {
				var clientX = _prosessBar.offset().left,
					x = e.pageX - clientX;
				that.audio.currentTime = parseInt(that.audio.duration * x / W)
			});
			_volume.bind("click", function(e) {
				var clientX = $(this).offset().left,
					x = e.pageX - clientX,
					v = parseInt(x / 4);
				that.audio.volume = v / 6;
				_volume.css({
					"background-position": "0 " + -v * 15 + "px"
				})
			});

			function _drag(e) {
				var _obj = $(document),
					clientX = _prosessBar.offset().left;
				_obj.bind(moveEvent, move);
				_obj.bind(endEvent, up);

				function move(e) {
					var w = e.pageX - clientX;
					if (0 < w && w < W) {
						_prosess.width(w)
					}
				}
				function up(e) {
					var x = e.pageX - clientX;
					that.audio.currentTime = parseInt(that.audio.duration * x / W);
					_obj.unbind(moveEvent, move);
					_obj.unbind(endEvent, up)
				}
			}
		},
		getplay: function() {
			if (this.audio.error) {
				return
			} else if (this.audio.readyState < 2) {
				this.autoPlay && (this.audio.autoplay ^= true)
			} else if (this.audio.paused) {
				this.audio.play()
			} else {
				this.audio.pause()
			}
		},
		formatTime: function(sec) {
			if (!isFinite(sec) || sec < 0) {
				return '--:--'
			} else {
				var m = Math.floor(sec / 60),
					s = Math.floor(sec) % 60;
				return (m < 10 ? '0' + m : m) + ':' + (s < 10 ? '0' + s : s)
			}
		}
	}
	$(".music_swf").each(function(){
		new AudioPlayer($(this))
	});
});