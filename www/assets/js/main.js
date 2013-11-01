(function($) {

    $(document).ready(function() {

        $('#user_input').textareaCount({
            'maxCharacterSize': 100,
            'originalStyle': 'originalDisplayInfo',
            'warningStyle': 'warningDisplayInfo',
            'warningNumber': 10,
            'displayFormat': 'Characters Remaining: #left'
        });

        $('#user_input').bind('keyup', function(event) {
            updatePreview();
        })
            .bind('mouseover', function(event) {
                setTimeout(function() {
                    updatePreview();
                }, 10);
            })
            .bind('paste', function(event) {
                setTimeout(function() {
                    updatePreview();
                }, 10);
            });

        $(".sample").click(function(event) {
            if ($(".share_image").hasClass('sample')) {
                //show preview
                $(".share_image").removeClass('sample');
                $(".preview_holder").hide();
                $("a.sample").html("VIEW SAMPLE")
            } else {
                //show sample
                $(".share_image").addClass('sample');
                $(".preview_holder").show();
                $("a.sample").html("HIDE SAMPLE")
            }
        });
    });

    function updatePreview() {
    	if (hasFilteredWords($('#user_input').val())) {
    		$('#user_input').val("Please Try Again.");
    	}
        $('.preview_text').html($('#user_input').val().replace(/\n/g, "<br/>"));
        return true;
    }

    function hasFilteredWords(txt) {
	    var filter = ['ass', 'fuck', 'poop'];
        for (var i = 0; i < filter.length; i++) {
			if(txt.search( new RegExp('\\b' + filter[i] + '\\b', 'g') ) > -1) return true;
        }
        return false;
    }

}(jQuery));
