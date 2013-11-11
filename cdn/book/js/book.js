		var $BOOK = {

			init: function() {

				if ( $("div#viewer div#book") ) {
					
					if ( typeof console === "undefined" ) {
						console = {};
						console.log = function() {
							return;
						}
					}

					this.isiPad = navigator.userAgent.match( /iPad/i ) != null;

			        $Share.init({
			            shareUrl: "http://www.AmericanHustleMovie.Tumblr.com",
			            shareImage: "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg",
			            title: "American Hustle",
			            content: "Check out #AmericanHustle on Tumblr and tell the world how you hustle. In theaters December 2013.",
			            tags: "#AmericanHustle"
			        });

					$("div#viewer div#book").html( '<p id="book_back"><img src="http://ah.hammerlabs.com/cdn/book/img/back.png" /></p><p id="book_cover"><img src="http://ah.hammerlabs.com/cdn/book/img/cover.jpg" /></p><p id="book_page"><img src="http://ah.hammerlabs.com/cdn/book/img/page.jpg" /></p><div id="book_social"><span class="book_facebook"><img src="http://ah.hammerlabs.com/cdn/book/img/facebook.png" /></span> <span class="book_twitter"><img src="http://ah.hammerlabs.com/cdn/book/img/twitter.png" /></span> <span class="book_tumblr"><img src="http://ah.hammerlabs.com/cdn/book/img/tumblr.png" /></span> <span class="book_google"><img src="http://ah.hammerlabs.com/cdn/book/img/google.png" /></span> <span class="book_pinterest"><img src="http://ah.hammerlabs.com/cdn/book/img/pinterest.png" /></span></div>' );

					$("div#viewer section").css({
						height: '650px'
					});
					$("div#viewer div#book").css({
						position: 'absolute',
						height: '570px'
					});
					$("div#viewer div#book p#book_back").css({
						position: 'absolute',
						top: '0px',
						display: 'none',
						cursor: 'pointer'
					}).click(function(event) {
						$("div#book p#book_page").fadeOut();
						$("div#book p#book_back").fadeOut();
					});

					$("div#viewer div#book p#book_cover").css({
						position: 'relative',
						top: '0px',
						left: '140px',
						cursor: 'pointer'
					}).click(function(event) {
						$("div#book p#book_page").fadeIn();
						$("div#book p#book_back").fadeIn();
					});

					$("div#viewer div#book p#book_page").css({
						position: 'relative',
						top: '-570px',
						left: '140px',
						marginTop: '-24px',
						display: 'none'
					});

					$("div#viewer div#book div#book_social").css({
						position: 'absolute',
						marginLeft: '140px',
						width: '400px',
						top: '600px'
					});

					$("div#viewer div#book div#book_social span").css({
						marginRight: '36px',
						cursor: 'pointer'
					});

					$("div#viewer div#book div#book_social span.book_pinterest").css({
						marginRight: '0px'
					});

			        $("div#viewer div#book div#book_social span.book_facebook").click(function(event) {
			            //sCode.trackOutboundClick("www.facebook.com","postfacebook_button");
			            $Share.facebook();
			        });
			        $("div#viewer div#book div#book_social span.book_twitter").click(function(event) {
			            //sCode.trackOutboundClick("www.twitter.com","posttwitter_button");
			            $Share.twitter();
			        });
			        $("div#viewer div#book div#book_social span.book_google").click(function(event) {
			            //sCode.trackOutboundClick("www.twitter.com","postgoogleplus_button");
			            $Share.google();
			        });
			        $("div#viewer div#book div#book_social span.book_pinterest").click(function(event) {
			            //sCode.trackOutboundClick("www.pintrest.com","postpintrest_button");
			            $Share.pinterest();
			        });
			        $("div#viewer div#book div#book_social span.book_tumblr").click(function(event) {
			            //sCode.trackOutboundClick("www.tumblr.com","posttumblr_button");
			            $Share.tumblr();
			        });

				}

			}

		}

		var $Share = {
			options: {},
			init: function(obj) {
				if (obj) this.options = obj;
			},
			google: function(obj) {
				if (obj) $.extend(true, this.options, obj);
				window.open(
					'//plus.google.com/share?' +
					'url=' + encodeURIComponent( this.options.shareUrl ),
					'share',
					'toolbar=0,status=0,width=548,height=325'
				);
			},
			pinterest: function(obj) {
				if (obj) $.extend(true, this.options, obj);
				window.open(
					'https://www.pinterest.com/pin/create/button/?' +
					'url=' + encodeURIComponent( this.options.shareUrl ) +
					'&media=' + encodeURIComponent( this.options.shareImage ) +
					'&description=' + encodeURIComponent( this.options.content ),
					'share-photo',
					'toolbar=0,status=0,width=548,height=325'
				);
			},
			tumblr: function(obj) {
				if (obj) $.extend(true, this.options, obj);
				var tumblr_share = "http://www.tumblr.com/share/photo" +
					"?source=" + encodeURIComponent( this.options.shareImage ) +
					"&clickthru=" + encodeURIComponent( this.options.shareUrl ) +
					"&caption=" + encodeURIComponent( this.options.content ) +
					"&tags=" + encodeURIComponent( this.options.tags );
				window.open(
					tumblr_share,
					'share-photo',
					'toolbar=0,status=0,width=430,height=450'
				);
			},
			twitter: function(obj) {
				if (obj) $.extend(true, this.options, obj);
				window.open(
					'https://twitter.com/intent/tweet?text=' +
					encodeURIComponent( this.options.content ),
					'share',
					'toolbar=0,status=0,width=548,height=325'
				);
			},
			facebook: function(obj) {
				if (obj) $.extend(true, this.options, obj);
				window.open(
					'https://www.facebook.com/sharer/sharer.php?s=100' +
					'&p[url]=' + encodeURIComponent( this.options.shareUrl ) +
					'&p[title]=' + encodeURIComponent( this.options.title ) +
					'&p[images][0]=' + encodeURIComponent( this.options.shareImage ) +
					'&p[summary]=' + encodeURIComponent( this.options.content ),
					'sharer',
					'toolbar=0,status=0,width=548,height=325'
				);
			}
		};


		$( function() {
			$BOOK.init();
		} )
