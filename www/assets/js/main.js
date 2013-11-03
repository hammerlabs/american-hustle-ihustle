(function($) {

    // make console safe to use
    if (typeof console === "undefined"){
        console={};
        console.log = function(){return;}
    }

    $(document).ready(function() {

        window.currentHustle = "";
        window.currentImageUrl = "";

        window.tumblrRoot = config.share_blogname;
        $Share.init({
            shareUrl: config.share_url,
            shareImage: config.share_image,
            title: config.share_title,
            content: config.share_content,
            tags: config.share_tags
        });

        /*$("#site_holder").queryLoader2({
            useOverlay: false,
            cdn: config.cdn
        });*/

        $('#user_input').textareaCount({
            'maxCharacterSize': 100,
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
            });

        $(".sample").click(function(event) {
            if ($(".share_image").hasClass('sample1')) {
                hideSample();
            } else {
                showSample();
            }
        });
        $(".submit").click(function(event) {
            if (window.currentHustle != "" && window.currentHustle != "Please Try Again.") {
                sCode.trackPageView('ihustlesubmitted.html');
                submitContent();
            }
        });
    });

    function submitContent() {
        $("#step1").fadeOut('fast', function() {
            $("#loading").fadeIn('fast', function() {
                $("#loading").fadeIn('fast', function() {
                    $.getJSON( "create.php", {text: window.currentHustle} )
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
    }

    function imageReady(data) {
        console.log( "Submit Success", data );
        // in the response, we should be getting a publicly available URL for the user's image
        window.currentImageUrl = location.href + data.url;
        $("#step2 .share_image").css('background-image', 'url(' + window.currentImageUrl + ')');
        
        $("#loading").fadeOut('fast', function() {
            $("#step2").fadeIn('fast');
        });

        $(".seeall").attr('href', window.tumblrRoot+'tagged/iHustle');

        $Share.options.shareImage = window.currentImageUrl;
        $(".facebook").click(function(event) {
            sCode.trackOutboundClick("www.facebook.com","postfacebook_button");
            $Share.facebook();
        });
        $(".twitter").click(function(event) {
            sCode.trackOutboundClick("www.twitter.com","posttwitter_button");
            $Share.twitter();
        });
        $(".google").click(function(event) {
            sCode.trackOutboundClick("www.twitter.com","postgoogleplus_button");
            $Share.google();
        });
        $(".pinterest").click(function(event) {
            sCode.trackOutboundClick("www.pintrest.com","postpintrest_button");
            $Share.pinterest();
        });
        $(".tumblr").click(function(event) {
            sCode.trackOutboundClick("www.tumblr.com","posttumblr_button");
            $Share.tumblr();
        });
    }

    function hideSample() {
        $(".share_image").removeClass('sample');
        $(".share_image").removeClass('sample1');
        $(".preview_holder").show();
        $(".inputbox").removeClass('sample');
        $("a.sample").removeClass('selected');
        $("a.sample").html("VIEW SAMPLE");
    }

    function showSample() {
        $(".share_image").removeClass('sample');
        $(".share_image").addClass('sample1');
        $(".preview_holder").hide();
        $(".inputbox").addClass('sample');
        $("a.sample").addClass('selected');
        $("a.sample").html("HIDE SAMPLE");
        $(".inputbox.sample").click(function(event) {
            hideSample();
            $('#user_input').focus();
        });
    }

    function updatePreview() {
        if (hasFilteredWords($('#user_input').val())) {
            $('#user_input').val("Please Try Again.");
            $(".inputbox").addClass('error');
        } else {
            $(".inputbox").removeClass('error');
        }
        window.currentHustle = $('#user_input').val().toUpperCase();
        $('.preview_text').html($('#user_input').val().replace(/\n/g, "<br/>"));
        return true;
    }

    function hasFilteredWords(txt) {
        var filter = ['ass', 'fuck', 'poop'];
        for (var i = 0; i < filter.length; i++) {
            if (txt.search(new RegExp('\\b' + filter[i] + '\\b', 'g')) > -1) return true;
        }
        return false;
    }

    /*$(".button").mouseenter(function (event){  
        if (!$(this).hasClass('selected')) TweenMax.to(this, .2, {backgroundColor:"#ffc500", color:"#000", overwrite:2});   
    }); 
    
    $(".button").mouseleave(function (event){    
        if (!$(this).hasClass('selected')) TweenMax.to(this, .2, {backgroundColor:"#5a5a5a", color:"#d1d1d1", overwrite:2});     
    }); */


}(jQuery));
