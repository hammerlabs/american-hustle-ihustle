(function($) {

    // make console safe to use
    if (typeof console === "undefined"){
        console={};
        console.log = function(){return;}
    }

    $(document).ready(function() {

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
            });;

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
        imageReady(undefined);
    }

    function imageReady(data) {
        if (data != undefined) {
            console.log( "Submit Success", data );
            window.currentImageUrl = location.href + data.url;
            window.currentPostUrl = data.post_response.response.response.post_url;
            $("#step2 .share_image").css('background-image', 'url(' + window.currentImageUrl + ')');
        } else {
            window.currentImageUrl = location.href + config.cdn + "img/sample.jpg";
            window.currentPostUrl = location.href + config.cdn + "img/sample.jpg";
            $("#step2 .share_image").css('background-image', 'url('+config.cdn+'img/sample.jpg)');
        }
            
        $("#loading").fadeOut('fast', function() {
            $("#step2").fadeIn('fast');
        });

        $(".seeall").attr('href', window.tumblrRoot+'/tagged/iHustle+americanhustle');

        $(".button.back").click(function(event) {
            location.reload();
        });

        $Share.init({
            shareUrl: config.share_url,
            shareImage: config.share_image,
            title: config.share_title,
            content: config.share_content + " " + window.currentPostUrl,
            tags: config.share_tags
        });

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
            if (txt.search(new RegExp('\b'+test, 'gi')) > -1) {
                console.log("word filter: " + test);
                return true;
            }
        }
        return false;
    }

}(jQuery));
