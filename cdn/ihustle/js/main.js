(function($) {

    // make console safe to use
    if (typeof console === "undefined"){
        console={};
        console.log = function(){return;}
    }
	var trackingScriptLoaded = false;
	var trackingInit		 = false;
	function tryAndTrack(type,url,id){
		if(trackingScriptLoaded){
			if(type == 'trackOutboundClick'){
				
				sCode.trackOutboundClick(url,id);
			}else if(type == 'pageView'){
				
			
				sCode.trackPageView(url);
			}
		}else{
			
			setTimeout(function(){tryAndTrack(viewName)},100 );
		}
		
	}

    $(document).ready(function() {
        $('#user_input').val("");
        window.currentHustle = "";
        window.currentImageUrl = "";

        window.tumblrRoot = "http://"+config.share_blogname;

        /*$("#site_holder").queryLoader2({
            useOverlay: false,
            cdn: config.cdn
        });*/

        $('#user_input').textareaCount({
            'maxCharacterSize': 150,
            'originalStyle': 'originalDisplayInfo',
            'warningStyle': 'warningDisplayInfo',
            'warningNumber': 10,
            'displayFormat': 'Characters Remaining: #left'
        });

        $('#user_input').bind('keyup', function(event) {
            updatePreview();
            hideSample();
        })
            .bind('mouseover', function(event) {
                setTimeout(function() {
                    updatePreview();
                }, 10);
            })
            .bind('paste', function(event) {
                setTimeout(function() {
                    updatePreview();
                    hideSample();
                }, 10);
            }).bind('focus', function(event) {
                $(this).css('opacity', '1');
                $(".inputbox").removeClass('error');
            });
			
	
		
			
        $(".button.sample").click(function(event) {
            if ($(".share_image").hasClass('sample1')) {
                hideSample();
            } else {
                showSample();
            }
        });

        $(".close").click(function(event) {
            hideSample();
        });
        $(".submit").click(function(event) {
        	hideSample();
            window.currentHustle = $.trim($('#user_input').val());
            if (window.currentHustle != "" && window.currentHustle != "Please Try Again.") {
                if (hasFilteredWords($('#user_input').val())) {
                    $('#user_input').val("");
                    $(".inputbox").addClass('error');
                    $('#user_input').css('opacity', '0');;
                    updatePreview();
                    return;
                } else {
                    $(".inputbox").removeClass('error');
                }
                var timeoutHolder;
             
				if(!trackingInit){	
					trackingInit = true;
					$.ajax({
						url: 'http://www.sonypictures.com/global/scripts/s_code.js',
						dataType: "script",
						success: function(){						
							s.pageName='us:movies:americanhustle:tumblr:ihustle:ihustlesubmitted.html'
			                s.channel=s.eVar3='us:movies'
			                s.prop3=s.eVar23='us:movies:americanhustle:ihustle'
			                s.prop4=s.eVar4='us:americanhustle'
			                s.prop5=s.eVar5='us:movies:blog'
			                s.prop11='us'     
			                var s_code=s.t();if(s_code)document.write(s_code); 
							
							trackingScriptLoaded = true;
						}
					});
					
				}else{
					tryAndTrack('pageView','ihustlesubmitted.html');
					
				}
				
				
					
					
					
					
				
            
               
                submitContent();
            } else if (window.currentHustle == "") {
                $('#user_input').val("");
                $(".inputbox").addClass('error');
                $('#user_input').css('opacity', '0');;
                updatePreview();
                return;
            }
        });
    });

    function submitContent() {
        $("#step1").fadeOut('fast', function() {
            $("#loading").fadeIn('fast', function() {
                $("#loading").fadeIn('fast', function() {
                    $.getJSON( "create.php", {text: window.currentHustle.toUpperCase()} )
                        .done(function( json ) {
                            if (json.url) {
                                imageReady(json);
                            } else {
                                submitError(json);
                            }
                        })
                        .fail(function( jqxhr, textStatus, error ) {
                            submitError({'jqxhr': jqxhr, 'textStatus': 'textStatus', error: error});
                        });
                });
            });
        });
    }

    function submitError(data) {
        console.log( "Submit Fail", data );
        imageReady(undefined);
    }

    function imageReady(data) {
        if (data != undefined) {
            console.log( "Submit Success", data );
            window.currentImageFile= data.name;
            window.currentImageUrl = location.href + config.user_images_folder + '/' + data.name;
            window.currentPostUrl = data.post_response.response.response.post_url;
            $("#step2 .share_image").css('background-image', 'url(' + window.currentImageUrl + ')');
        } else {
            window.currentImageFile= config.cdn + "img/sample.jpg";
            window.currentImageUrl = location.href + config.cdn + "img/sample.jpg";
            window.currentPostUrl = location.href + config.cdn + "img/sample.jpg";
            $("#step2 .share_image").css('background-image', 'url('+config.cdn+'img/sample.jpg)');
        }
            
        $("#loading").fadeOut('fast', function() {
            $("#step2").fadeIn('fast');
        });

        $(".button.back").click(function(event) {
        	tryAndTrack('trackOutboundClick','americanhustle.tumblr.com/ihustle','ihustle_createanother_button');
            location.reload();
        });

        $Share.init({
            shareImageFile:"",
            shareUrl: config.share_url,
            shareImage: config.share_image,
            title: config.share_title,
            twitterContent: config.share_content,
            content: config.share_content + " " + window.currentPostUrl,
            tags: config.share_tags
        });

        $(".seeall").attr('href', window.tumblrRoot+'/tagged/'+config.share_tags.replace(/#/g,"").replace(/ /g, "+"));
        $Share.options.shareImage = window.currentImageUrl;
        $Share.options.shareImageFile = window.currentImageFile;
        $(".facebook").click(function(event) {
        	tryAndTrack('trackOutboundClick',"www.facebook.com","postfacebook_button");
           
            $Share.facebook();
        });
        $(".twitter").click(function(event) {
        	tryAndTrack('trackOutboundClick',"www.twitter.com","posttwitter_button");
    
            $Share.twitter();
        });
        $(".google").click(function(event) {
        	tryAndTrack('trackOutboundClick',"www.google.com","postgoogleplus_button");
            $Share.google();
        });
        $(".pinterest").click(function(event) {
        	tryAndTrack('trackOutboundClick',"www.pintrest.com","postpinterest_button");
            $Share.pinterest();
        });
        $(".tumblr").click(function(event) {	
      	   tryAndTrack('trackOutboundClick',"www.tumblr.com","posttumblr_button");
            $Share.tumblr();
        });
    }

    function hideSample() {
        $(".share_image").removeClass('sample');
        $(".share_image").removeClass('sample1');
        $(".preview_holder").show();
        $(".close").hide();
        $(".inputbox").removeClass('sample');
        $("a.sample").removeClass('selected');
        $("a.sample").html("VIEW SAMPLE");
    }

    function showSample() {
        $(".share_image").removeClass('sample');
        $(".share_image").addClass('sample1');
        $(".preview_holder").hide();
        $(".close").show();
        $(".inputbox").addClass('sample');
        $("a.sample").addClass('selected');
        $("a.sample").html("HIDE SAMPLE");
        $(".inputbox.sample").click(function(event) {
            hideSample();
            $('#user_input').focus();
        });
    }

    function updatePreview() {
        window.currentHustle = $('#user_input').val().toUpperCase();
        $('.preview_text').html($('#user_input').val().replace(/\n/g, "<br/>"));
        return true;
    }

    function hasFilteredWords(txt) {
        var filter = window.wordlist;
        for (var i = 0; i < filter.length; i++) {
            var test = filter[i].replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            if (txt.search(new RegExp(test, 'gi')) > -1) {
                console.log("word filter: " + test);
                return true;
            }
        }
        return false;
    }

}(jQuery));
