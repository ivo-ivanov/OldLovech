function ddSliderSetUp() {

     




jQuery('.portfolioImg img').hover(function(){

    jQuery(this).stop().animate({ opacity: .8 }, 250);

}, function(){

    jQuery(this).stop().animate({ opacity: 1 }, 350);

});

jQuery('.blog_thumb_big img').hover(function(){

    jQuery(this).stop().animate({ opacity: .8 }, 250);

}, function(){

    jQuery(this).stop().animate({ opacity: 1 }, 350);

});
jQuery('#flickr_badge_wrapper img').hover(function(){

    jQuery(this).stop().animate({ opacity: .8 }, 250);

}, function(){

    jQuery(this).stop().animate({ opacity: 1 }, 350);

});
jQuery('.post-thumb img').hover(function(){

    jQuery(this).stop().animate({ opacity: .8 }, 250);

}, function(){

    jQuery(this).stop().animate({ opacity: 1 }, 350);

});

jQuery('#dribbble img').hover(function(){

    jQuery(this).stop().animate({ opacity: .8 }, 250);

}, function(){

    jQuery(this).stop().animate({ opacity: 1 }, 350);

});

jQuery('#social img').hover(function(){

    jQuery(this).stop().animate({ opacity: .8 }, 250);

}, function(){

    jQuery(this).stop().animate({ opacity: 1 }, 350);

});



        jQuery('#blog_articles li:last').css({ border: 'none'});
       

	//main vars
	var mainCont = jQuery('#slider');
	var ulCont = jQuery('#slider > ul');
	var windowWidth = jQuery(window).width();
	var windowHeight = jQuery(window).height();
	var totalLi = ulCont.children('li').length;
	
	if(totalLi == 1) { alert('You should have at least two items in your slider. Please add one more.'); return false; }
	
	ddPlaying = 0;
	
	//if we have less than 4 items
	if(totalLi < 4) {
		
		var totalToAdd = 4 - totalLi
		var i = 1;
		ulCont.children('li').each(function() {
			
			if(i <= totalToAdd) {
				
				var thisHTML = jQuery(this).html();
				ulCont.append('<li class="slider-item">'+thisHTML+'</li>');
				
			}
			
			i++;
			
		});
		
	}
	
	///////////////////////////////////
	//let's start by positioning our UL
	///////////////////////////////////
	
	// calculates which item will be the ucrrent one
	// taking consideration the widht of the window
	
	var initCur = (windowWidth - 960) / 2;
	var i = 0;
	var curI = 0;
	ulCont.children('li').each(function() {
		
		var thisWidth = jQuery(this).width();
		curI = curI + thisWidth;
		if(curI < initCur) { i++; }
		
	});
	i++; i++;
	
	if(totalLi < ((i * 2) + 1)) {
		
		var totalToCopy = ((i * 2) + 1) - totalLi;
		var currentItem = 1;
		ulCont.children('li').each(function() {
			
			if(currentItem <= totalToCopy) {
				
				var thisHTML = jQuery(this).html();
				ulCont.append('<li class="slider-item">'+thisHTML+'</li>');
				
			}
			
			currentItem++;
			
		});
		
		ddCopied = 1;
		
	}
	
	//calculates the left of the current i+1
	var curItem = i + 1;
	var i2 = 1;
	var curLeft = 0;
	ulCont.children('li').each(function() {
		
		if(i2 < curItem) {
			
			curLeft = curLeft + (jQuery(this).width() + 35);
			
		}
		
		i2++;
		
	});
	
	//calculates the left to center the UL
	var centerUl = ((windowWidth - ulCont.children('li:eq('+(curItem-1)+')').width()) / 2) - curLeft;
	
	//centers the UL
	ulCont.css({ left: centerUl });
	
	//adds the current class to our center slide
	ulCont.children('li:eq('+(curItem-1)+')').addClass('current');
	
	//if the user resizes
	jQuery(window).resize(function() {
		
		ddSliderResize();
		
	});
		
	ddAnimateButtons();
	
	ulCont.children('li').each(function() {
		
		jQuery(this).css({ display: 'block', opacity: 0 });
		
		var liHeight = jQuery(this).height();
		var liWidth = jQuery(this).width();
		
		jQuery(this).children('span').each(function() {
			
			jQuery(this).css({ width: (liWidth)+'px', height: (liHeight)+'px' });
			
		});
		
		var i2 = 0;
		
		//calculates how many buttons are there
		jQuery(this).children('span').children('a').each(function() {
			
			i2++;
			
		});
		
		var totalHeightButtons = (i2 * 55) - 35;
		var i2 = 0;
		
		jQuery(this).children('span').children('a').each(function() {
			
			//button vars
			var thisWidth = jQuery(this).width();
			var thisHeight = jQuery(this).height();
			
			//position variable
			var thisLeft = ((liWidth - thisWidth) / 2) - 20;
			if(i2 == 0) { 
			
				var thisTop = ((liHeight - totalHeightButtons) / 2) - 10;
				
			} else if(i2 == 1) {
			
				var thisTop = (((liHeight - totalHeightButtons) / 2) + 45);
				
			} else if (i2 == 2) {
			
				var thisTop = ((liHeight - totalHeightButtons) / 2) + 100;
				
			}
			
			jQuery(this).css({ left: thisLeft+'px', top: thisTop+'px' });
			
			i2++;
			
		});
		
	});
	
	//centers the .controller
	var controllerWidth = jQuery('.slider-information').width();
	var controllerLeft = (windowWidth - controllerWidth) / 2 - 20;
	
	jQuery('.slider-information').css({ left: controllerLeft+'px', width: (controllerWidth + 15) });
	
}

function ddSliderResize() {
	
	//main vars
	var mainCont = jQuery('#slider');
	var ulCont = jQuery('#slider > ul');
	var windowWidth = jQuery(window).width();
	var windowHeight = jQuery(window).height();
	var totalLi = ulCont.children('li').length;
	
	//calculates the left of the current i+1
	var curItem = 0;
	
	ulCont.children('li').each(function() {
		
		var thisClass = jQuery(this).attr('class').split(' ');
		
		if(thisClass[1] != 'current') { curItem++; } else { return false; }
		
	});
	curItem++;
	
	var i2 = 1;
	var curLeft = 0;
	ulCont.children('li').each(function() {
		
		if(i2 < curItem) {
			
			curLeft = curLeft + (jQuery(this).width() + 30);
			
		}
		
		i2++;
		
	});
	
	//calculates the left to center the UL
	var centerUl = ((windowWidth - ulCont.children('li:eq('+(curItem-1)+')').width()) / 2) - curLeft;
	
	//centers the UL
	ulCont.css({ left: centerUl });
	
	//adds the current class to our center slide
	ulCont.children('li:eq('+(curItem-1)+')').addClass('current');
	
	//centers the .controller
	var controllerWidth = jQuery('.slider-information').width();
	var controllerLeft = (windowWidth - controllerWidth) / 2 - 20;
	
	jQuery('.slider-information').css({ left: controllerLeft+'px', width: (controllerWidth) });
	
}

function ddSlider() {
	
	//main vars
	var mainCont = jQuery('#slider');
	var ulCont = mainCont.children('ul:last');
	var ulClone = mainCont.children('ul.clone');
	
	//shows the lis and removes the loading icon
	mainCont.children('ul').children('li').animate({ opacity: 1 }, 600, function() {
		
		mainCont.css({ background: 'none' });
		
	});
	
	//when user clicks next
	jQuery('.controller > .right-arrow').click(function() { nextSlide(); });
	jQuery(document).keydown(function(e) { if(e.keyCode == 39) { nextSlide(); } });
	
	jQuery('.controller > .left-arrow').click(function() { prevSlide(); });
	jQuery(document).keydown(function(e) { if(e.keyCode == 37) { prevSlide(); } });
	
}

function nextSlide() {
	
	if(ddPlaying === 0) {
	
		ddPlaying = 1;
	
		//main vars
		var mainCont = jQuery('#slider');
		var ulCont = jQuery('#slider > ul');
		var windowWidth = jQuery(window).width();
		var windowHeight = jQuery(window).height();
		var totalLi = ulCont.children('li').length;
		
		var currentLeft = Math.abs(parseInt(ulCont.css('left')));
		
		var current = ulCont.children('li.current');
		var next = current.next();
		
		//calculates the new left pos
		if(next.width() > current.width()) {
			
			var newLeft = ((currentLeft + current.width()) + 35) + ((next.width() - current.width()) / 2);
			
		} else if(next.width() < current.width()) {
			
			var newLeft = ((currentLeft + current.width()) + 35) - ((current.width() - next.width()) / 2);
			
		} else {
			
			var newLeft = ((currentLeft + current.width()) + 35);
			
		}
		
		//animates the UL
		ulCont.stop().animate({ left: '-'+newLeft }, 350, function() {
			
			//changes the current class
			current.removeClass('current');
			next.addClass('current');
			
			//gets our first item and puts it in the last & fixes the css
			var firstItem = ulCont.children('li:first');
			var firstWidth = firstItem.width();
			
			ulCont.css({ left: '-'+((newLeft - firstWidth) - 35)+'px' });
			
			firstItem.remove();
			
			ulCont.append('<li class="slider-item">'+firstItem.html()+'</li>');
			
			ddPlaying = 0;
		
			ddAnimateButtons();
			
		});
	
	}
	
}

function prevSlide() {
	
	if(ddPlaying === 0) {
	
		ddPlaying = 1;
	
		//main vars
		var mainCont = jQuery('#slider');
		var ulCont = jQuery('#slider > ul');
		var windowWidth = jQuery(window).width();
		var windowHeight = jQuery(window).height();
		var totalLi = ulCont.children('li').length;
		
		var currentLeft = parseInt(ulCont.css('left'));
		
		var current = ulCont.children('li.current');
		var prev = current.prev();
		
		//takes the last item and puts it to the front and fixes css
		var lastItem = ulCont.children('li:last');
		var lastWidth = lastItem.width();
		var newLeft = (currentLeft - lastWidth) - 35;
		
		lastItem.remove();
		ulCont.css({ left: newLeft });
		ulCont.prepend('<li class="slider-item">'+lastItem.html()+'</li>');
		
		//calculates the new left pos
		prev.addClass('prev');
		var totalPrevWidth = 0;
		ulCont.children('li').each(function() {
			
			var thisClass = jQuery(this).attr('class').split(' ');
			if(thisClass[1] == 'prev') { return false; } else {
				
				totalPrevWidth = totalPrevWidth + (jQuery(this).width() + 35);
				
			}
			
		});
		var newLeft = totalPrevWidth - ((windowWidth - prev.width()) / 2);
		
		//animates the UL
		ulCont.stop().animate({ left: '-'+newLeft }, 350, function() {
			
			//changes the current class
			current.removeClass('current');
			prev.addClass('current').removeClass('prev');
			
			ddPlaying = 0;
		
			ddAnimateButtons();
			
		});
	
	}
	
}



function ddAnimateButtons() {
	
	var ulCont = jQuery('#slider > ul');
	
	ulCont.children('li').children('span').children('a').css({ display: 'none' });
	
	ulCont.children('li').children('span').css({ display: 'block', opacity: 0 }).hover(function() {
		
		jQuery(this).children('a').css({ display: 'block' });
		jQuery(this).stop().animate({ opacity: 1 }, 300);
			
	}, function() {
		
		jQuery(this).children('a').css({ display: 'none' });
		jQuery(this).stop().animate({ opacity: 0 }, 300);
			
	});
	
}

jQuery(function() {

   jQuery('#widget_footer li:last-child').css({ marginRight: '0px'});
        jQuery('#blog_articles li:last').css({ marginBottom: '0px'});
        jQuery('.page-template-portfolio-full-php #portfolioItem li:nth-child(3n+3)').css({ paddingRight: '0px'});
          jQuery(' #nav ul li:last').css({ marginBottom: '0px'});



            jQuery('.page-template-portfolio-left-php #portfolioItem li:nth-child(2n+2)').css({ paddingRight: '0px'});
            jQuery('.page-template-portfolio-right-php #portfolioItem li:nth-child(2n+2)').css({ paddingRight: '0px'});
 jQuery('.hcs li:odd').css({ marginRight: '0px'});



});

function dropDown() {

	 jQuery("#nav li, #nav li ul li, #nav li, #nav ul li").hover(function() {

		jQuery(this).find('ul:first').stop(true, true).slideDown(200) //Slides down when hover the UL

	}, function() {

		jQuery(this).find('ul:first').stop(true, true).slideUp(150); //Slides up on mouseleave

	});

}