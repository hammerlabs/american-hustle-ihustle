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
			'share_google',
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
			'share_pinterest',
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
			'share_tumblr',
			'toolbar=0,status=0,width=500,height=500'
		);
	},
	twitter: function(obj) {
		/*
		if (obj) $.extend(true, this.options, obj);
		window.open(
			'https://twitter.com/intent/tweet?text=' +
			encodeURIComponent( this.options.content ),
			'share_twitter',
			'toolbar=0,status=0,width=548,height=325'
		);
		*/
		if (obj) $.extend(true, this.options, obj);
		window.open(
			'./twitteroauth/index.php' +
			'?img='+encodeURIComponent( this.options.shareImageFile )+
			'&status='+encodeURIComponent( this.options.twitterContent ),
			'share_twitter',
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
			'share_facebook',
			'toolbar=0,status=0,width=548,height=325'
		);
	}
};
