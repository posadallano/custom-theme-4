/**
 * File mobile-navigation.js.
 *
 * @link        https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     David Annakie
 * @subpackage  JS
 * @author      Andres Posada
 * @link        https://github.com/posadallano
 * @since       1.0.0
 */

jQuery(document).ready(function () {
	// Smooth Scroll
	jQuery('header li a').click(function(){
	    jQuery('html, body').animate({
	        scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top
	    }, 500);
	    return false;
	}); 

	if (jQuery(window).width() > 1023) {
		// Add Class on scroll at a Featured block to make fixed this menu
		if (jQuery( "body" ).hasClass( "page-template-template-flex-content" )) {
			jQuery(function() {
				var topBlocks = jQuery('.top-blocks');
				var contBlocksFeat = jQuery('section.feature .content-blocks-feat');
			    var hieghtThreshold = contBlocksFeat.offset().top - 90;
			    var hieghtThreshold_end  = contBlocksFeat.offset().top + contBlocksFeat.height() ;
			   
			    jQuery(window).scroll(function() {
			        var scroll = jQuery(window).scrollTop();
			        if (scroll >= hieghtThreshold && scroll <=  hieghtThreshold_end ) {
			            topBlocks.addClass('fixed-menu');
			            contBlocksFeat.css('margin-top', '485px');
			        } else {
			            topBlocks.removeClass('fixed-menu');
			            contBlocksFeat.css('margin-top', '0');
			        }
			    });
			});
		}

		// Single Hero parallax effect
		jQuery('.single-post .content-single-blog, .david-form-comments, body.single .btm-footer, body.single footer.site-footer').wrapAll('<div class="cont-section-single"></div>');
		jQuery( "<div class='trianglefooter'></div>" ).insertAfter( "body.single .btm-footer" );
		jQuery(window).scroll(function(e){
			parallax();
		});
		function parallax(){
			var scrolled = jQuery(window).scrollTop();
			var windowHeight = jQuery(window).height();
			var sc =  (1 + ( scrolled * 0.45/windowHeight));
			jQuery('.single-post header.post-david .top .backtop-single').css('top',-(scrolled*0.0315)+'rem');
			jQuery('.single-post header.post-david .top .cont-title').css('bottom',+(scrolled*-0.062)+'rem');
			jQuery('.single-post header.post-david .top .backtop-single').css('opacity',1-(scrolled*.00155));
			jQuery('.single-post header.post-david .top .backtop-single').css({
				"transform" : "scale("+ sc +", "+ sc +")"
			});
		};
	}

	// Add class to fixed menu when 300px scrolling
	jQuery(window).scroll(function() {    
	    var scroll = jQuery(window).scrollTop();
	    if (scroll >= 250) {
	        jQuery("header .cont-header").addClass("min");
	    } else {
	        jQuery("header .cont-header").removeClass("min");
	    }
	});

	// BxSlider - Carousel Logos
	if (jQuery(window).width() > 1023) {
		jQuery('.carousel-logos').bxSlider({
			slideWidth: 250,
		    minSlides: 5,
		    maxSlides: 5,
		    moveSlides: 1,
		    slideMargin: 5,
		    pager: false
		});
	} else if ( (jQuery(window).width() > 319) && (jQuery(window).width() < 481) ) {
		jQuery('.carousel-logos').bxSlider({
			slideWidth: 250,
		    minSlides: 2,
		    maxSlides: 2,
		    moveSlides: 1,
		    slideMargin: 5,
		    pager: false
		});
	} else if ( (jQuery(window).width() > 480) && (jQuery(window).width() < 1024) ) {
		jQuery('.carousel-logos').bxSlider({
			slideWidth: 250,
		    minSlides: 3,
		    maxSlides: 3,
		    moveSlides: 1,
		    slideMargin: 5,
		    pager: false
		});
	}
	
	// Menu Toggle
	jQuery('#nav-icon').click(function () {
	    jQuery("header .cont-header").toggleClass('hdopn');
	    jQuery(this).toggleClass('open');
	});	

	jQuery('.menu-header-menu-container li a').click(function () {
		jQuery('header .cont-header').toggleClass('hdopn');
		jQuery('#nav-icon').toggleClass('open');
	});			

	// Changer order titles on the About block
	if (jQuery(window).width() < 1024) {
		jQuery( ".right" ).insertBefore( ".cont-top img" );
	}

	// AOS
	AOS.init({
		easing: 'ease-in-out-sine',
		offset: 10,
		duration: 600
	});

	// Add class to submit button
	jQuery('.block-feature form.wpcf7-form input.wpcf7-submit').addClass('transition');
	

	// Remove '+' in Heart counter
	function removeChar () {
		spanval = jQuery("span.count-box").text();
		spanval = spanval.replace(/\+/g, '');
		jQuery("span.count-box").text(spanval);    
	}
	removeChar();

	// Slider Archive Blog
	jQuery('.blogtop ul').bxSlider({
		mode: 'horizontal',
		controls: false
	});

	// Load More
	size_li = jQuery(".cont-posts .blog-article").size();
    x=4;
    jQuery('.cont-posts .blog-article:lt('+x+')').show();
    if (x >= size_li) {
    	jQuery('#loadMore').hide();	
    }
    jQuery('#loadMore').click(function () {
        x = (x+2 <= size_li) ? x+2 : size_li;
        jQuery('.cont-posts .blog-article:lt('+x+')').show(300);
        if (x == size_li) {
    		 jQuery('#loadMore').hide();	
    	}
    });

    // Set height to left column - Blog Home
    var rightHeight = jQuery('.cont-blog-home .right-c').height();
    jQuery('section.blog-home .col-bh .cont-left').css("height", rightHeight);


	// Go to top of the Feature block
	(function(jQuery) {
	  jQuery('a[rel="relativeanchor"]').click(function() 
	  {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
	        || location.hostname == this.hostname) 
	    {
	      var target = jQuery(this.hash),
	      headerHeight = jQuery("header .cont-header").height() + (jQuery(".top-blocks.fixed-menu").height() - 1); // Get fixed header height       
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
	      if (target.length) 
	      {
	        jQuery('html,body').animate({
	          scrollTop: target.offset().top - headerHeight
	        }, 500);
	        return false;
	      }
	    }
	  });
	})(jQuery);

	// Add Class on scroll at '.content-single-blog'
	if (jQuery(window).width() > 1023) {
		if (jQuery( "body" ).hasClass( "single-post" )) {
			var contSingleBlog = jQuery('.single-post .content-single-blog');
			var socialCol = jQuery('.single-post .social-col');
			var hieghtThre = contSingleBlog.offset().top - 90;
			var hieghtThre_end  = contSingleBlog.offset().top + contSingleBlog.height();
			jQuery(window).scroll(function() {
			    var scroll2 = jQuery(window).scrollTop();
			    if (scroll2 >= hieghtThre && scroll2 <=  hieghtThre_end ) {
			        jQuery(socialCol).addClass('fxd');
			    } else {
			        jQuery(socialCol).removeClass('fxd');
			    }
			});	
		}
	}
});