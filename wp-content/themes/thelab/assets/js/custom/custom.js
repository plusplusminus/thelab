jQuery(document).ready(function($) {

    // Equal Height

	var currentTallest = 0,
       currentRowStart = 0,
       rowDivs = new Array(),
       $el,
       topPosition = 0;
	jQuery('.js-equal').children().each(function() {

        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });

});

jQuery(document).ready(function($) {

// ======================================
// Helper functions
// ======================================
// Get section or article by href
function getRelatedContent(el){
 return jQuery($(el).attr('href'));
}
// Get link by section or article id
function getRelatedNavigation(el){
    return jQuery('.nav-item--sub a[href=#'+$(el).attr('id')+']');
}


// ======================================
// Smooth scroll to content
// ======================================

// SMOOTH SCROLL
var jump=function(e){
   if (e){
       e.preventDefault();
       var target = jQuery(this).attr("href");
   }else{
       var target = location.hash;
   }

   jQuery('html,body').animate({    
        scrollTop: jQuery(target).offset().top
   },2000,function(){
       location.hash = target;
   });

}

jQuery('html, body').hide();

jQuery(document).ready(function()
{
    jQuery('a[href^=#]').bind("click", jump);

    if (location.hash){
        setTimeout(function(){
            jQuery('html, body').scrollTop(0).show();
            jump();
        }, 0);
    }else{
        jQuery('html, body').show();
    }
});


// ======================================
// Waypoints
// ======================================
// Default cwaypoint settings
// - just showing
var wpDefaults={
 context: window,
 continuous: true,
 enabled: true,
 horizontal: false,
 offset: 0,
 triggerOnce: false
};

jQuery('.page-content__section')
  .waypoint(function(direction) {
    // Highlight element when related content
    // is 10% percent from the bottom... 
    // remove if below
    getRelatedNavigation(this.element).toggleClass('active', direction === 'down');
  }, {
    offset: '90%' // 
  });
jQuery('.page-content__section').waypoint(function(direction) {
    // Highlight element when bottom of related content
    // is 100px from the top - remove if less
    // TODO - make function for this
    getRelatedNavigation(this.element).toggleClass('active', direction === 'up');
  }, {
    offset: '10%'
  });
});

(function() {

    // detect if IE : from http://stackoverflow.com/a/16657946      
    var ie = (function(){
        var undef,rv = -1; // Return value assumes failure.
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf('MSIE ');
        var trident = ua.indexOf('Trident/');

        if (msie > 0) {
            // IE 10 or older => return version number
            rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        } else if (trident > 0) {
            // IE 11 (or newer) => return version number
            var rvNum = ua.indexOf('rv:');
            rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
        }

        return ((rv > -1) ? rv : undef);
    }());


    // disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179                  
    // left: 37, up: 38, right: 39, down: 40,
    // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
    var keys = [32, 37, 38, 39, 40], wheelIter = 0;

    function preventDefault(e) {
        e = e || window.event;
        if (e.preventDefault)
        e.preventDefault();
        e.returnValue = false;  
    }

    function keydown(e) {
        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                preventDefault(e);
                return;
            }
        }
    }

    function touchmove(e) {
        preventDefault(e);
    }

    function wheel(e) {
        // for IE 
        //if( ie ) {
            //preventDefault(e);
        //}
    }

    function disable_scroll() {
        window.onmousewheel = document.onmousewheel = wheel;
        document.onkeydown = keydown;
        document.body.ontouchmove = touchmove;
    }

    function enable_scroll() {
        window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
    }

    var docElem = window.document.documentElement,
        scrollVal,
        isRevealed, 
        noscroll, 
        isAnimating,
        container = document.getElementById( 'container' ),
        trigger = container.querySelector( 'button.trigger' );

    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }

    function scrollPage() {
        scrollVal = scrollY();
        
        if( noscroll && !ie ) {
            if( scrollVal < 0 ) return false;
            // keep it that way
            window.scrollTo( 0, 0 );
        }

        if( classie.has( container, 'notrans' ) ) {
            classie.remove( container, 'notrans' );
            return false;
        }

        if( isAnimating ) {
            return false;
        }
        
        if( scrollVal <= 0 && isRevealed ) {
            toggle(0);
        }
        else if( scrollVal > 0 && !isRevealed ){
            toggle(1);
        }
    }

    function toggle( reveal ) {
        isAnimating = true;
        
        if( reveal ) {
            classie.add( container, 'modify' );
        }
        else {
            noscroll = true;
            disable_scroll();
            classie.remove( container, 'modify' );
        }

        // simulating the end of the transition:
        setTimeout( function() {
            isRevealed = !isRevealed;
            isAnimating = false;
            if( reveal ) {
                noscroll = false;
                enable_scroll();
            }
        }, 600 );
    }

    // refreshing the page...
    var pageScroll = scrollY();
    noscroll = pageScroll === 0;

    disable_scroll();

    if( pageScroll ) {
        isRevealed = true;
        classie.add( container, 'notrans' );
        classie.add( container, 'modify' );
    }

    window.addEventListener( 'scroll', scrollPage );
    trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
    })();

    // Images Loaded
    jQuery('.hero').imagesLoaded( { 
        background: true
    },
    function() {
         console.log('all .item background images loaded');
        jQuery('body').addClass('loaded');
    });