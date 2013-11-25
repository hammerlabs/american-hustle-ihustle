$(document).ready(function(){

    // make console safe to use
    if (typeof console === "undefined"){
        console={};
        console.log = function(){return;}
    }

    $Share.init({
        shareUrl: config.share_url,
        shareImage: config.share_image,
        title: config.share_title,
        twitterContent: config.share_content,
        content: config.share_content,
        tags: config.share_tags
    });
    $(".facebook").click(function(event) {
        //sCode.trackOutboundClick("www.facebook.com","postfacebook_button");
        $Share.facebook();
    });
    $(".twitter").click(function(event) {
        //sCode.trackOutboundClick("www.twitter.com","posttwitter_button");
        $Share.twitter();
    });
    $(".google").click(function(event) {
        //sCode.trackOutboundClick("www.google.com","postgoogleplus_button");
        $Share.google();
    });
    $(".pinterest").click(function(event) {
        //sCode.trackOutboundClick("www.pintrest.com","postpinterest_button");
        $Share.pinterest();
    });
    $(".tumblr").click(function(event) {    
        //sCode.trackOutboundClick("www.tumblr.com","posttumblr_button");
        $Share.tumblr();
    });

    $("#bb-bookblock").bookblock( {
                speed : 800,
                shadows: false
                /*shadowSides : 0.8,
                shadowFlip : 0.7*/
            } );

    $(".bb-item a").on( 'click touchstart', function() {
        if ($("#bb-bookblock").data("bookblock").current == 0) leavingCover();
        $("#bb-bookblock").bookblock( 'next' );
        return false;
    } );

    $(".arrow_left").on( 'click touchstart', function(event) {
        if ($("#bb-bookblock").data("bookblock").current == 1) backToCover();
        $("#bb-bookblock").bookblock( 'prev' );
   });

    $(".arrow_right").on( 'click touchstart', function(event) {
        if ($("#bb-bookblock").data("bookblock").current == 0) leavingCover();
        $("#bb-bookblock").bookblock( 'next' );
   });

    window.insideBounce = new TimelineMax({repeat:-1, repeatDelay:1});
    window.insideBounce.to($(".look_inside"), .2, {top: "-10", delay: 1});
    window.insideBounce.to($(".look_inside"), .8, {top: "+10", ease: Bounce.easeOut});
    window.insideBounce.play();
});


function backToCover() {
    TweenMax.to($(".look_inside"), .2, {autoAlpha: 1, delay: .8, onComplete: function(){window.insideBounce.restart();}});
    TweenMax.to($("#bb-bookblock"), .8, {left: -210});
    TweenMax.to($(".arrow_left"), .2, {autoAlpha: 0});
    TweenMax.to($(".arrow_right"), .2, {autoAlpha: 0});
}

function leavingCover() {
    window.insideBounce.stop();
    TweenMax.to($(".look_inside"), .2, {autoAlpha: 0});
    TweenMax.to($("#bb-bookblock"), .8, {left: 0});
    TweenMax.to($(".arrow_left"), .2, {autoAlpha: 1, delay: .8});
    TweenMax.to($(".arrow_right"), .2, {autoAlpha: 1, delay: .8});
}