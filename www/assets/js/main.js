(function($) {

    $(document).ready(function() {

        window.currentHustle = "";
        window.currentImageUrl = "";

        $Share.init({
            shareUrl: "http://www.americanhustle-movie.com/site/",
            shareImage: "http://flash.sonypictures.com/shared/movies/americanhustle/share.jpg",
            title: "American Hustle",
            content: "Christian Bale, Bradley Cooper, Amy Adams, Jeremy Renner and Jennifer Lawrencestar in #American Hustle. In theaters December.",
            tags: "#iHustle #AmericanHustle"
        })

        $("#site_holder").queryLoader2({
            useOverlay: false
        });

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
            $("#step1").fadeOut('fast', function() {
                $("#loading").fadeIn('fast', function() {
                    $("#loading").fadeIn('fast', function() {
                        setTimeout(function() {
                            imageReady();
                        }, 1000);
                    });
                });
            });
        });
    });

    function imageReady() {
        $("#loading").fadeOut('fast', function() {
            $("#step2").fadeIn('fast');
        });
        window.currentImageUrl = location.href + "assets/img/sample1.jpg";
        $("#step2 .share_image").css('background-image', 'url(' + window.currentImageUrl + ')');

        $Share.options.shareImage = window.currentImageUrl;
        $(".facebook").click(function(event) {$Share.facebook();});
        $(".twitter").click(function(event) {$Share.twitter();});
        $(".google").click(function(event) {$Share.google();});
        $(".pinterest").click(function(event) {$Share.pinterest();});
        $(".tumblr").click(function(event) {$Share.tumblr();});
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
    }

    function updatePreview() {
        if (hasFilteredWords($('#user_input').val())) {
            $('#user_input').val("Please Try Again.");
            $(".inputbox").addClass('error');
        } else {
            $(".inputbox").removeClass('error');
        }
        window.currentHustle = $('#user_input').val();
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
