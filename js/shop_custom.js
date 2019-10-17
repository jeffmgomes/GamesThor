/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
5. Init Recently Viewed Slider
7. Init Isotope
8. Init Price Slider
9. Init Favorites


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var menuActive = false;
	var header = $('.header');

	setHeader();

	//initCustomDropdown();
	//initPageMenu();
	initViewedSlider();
	//initBrandsSlider();
	initIsotope();
	initPriceSlider();
	initFavs();

	$(window).on('resize', function()
	{
		setHeader();
	});

	/* 

	2. Set Header

	*/

	function setHeader()
	{
		//To pin main nav to the top of the page when it's reached
		//uncomment the following

		// var controller = new ScrollMagic.Controller(
		// {
		// 	globalSceneOptions:
		// 	{
		// 		triggerHook: 'onLeave'
		// 	}
		// });

		// var pin = new ScrollMagic.Scene(
		// {
		// 	triggerElement: '.main_nav'
		// })
		// .setPin('.main_nav').addTo(controller);

		if(window.innerWidth > 991 && menuActive)
		{
			closeMenu();
		}
	}

	/* 

	5. Init Recently Viewed Slider

	*/

	function initViewedSlider()
	{
		if($('.viewed_slider').length)
		{
			var viewedSlider = $('.viewed_slider');

			viewedSlider.owlCarousel(
			{
				loop:true,
				margin:30,
				autoplay:true,
				autoplayTimeout:6000,
				nav:false,
				dots:false,
				responsive:
				{
					0:{items:1},
					575:{items:2},
					768:{items:3},
					991:{items:4},
					1199:{items:6}
				}
			});

			if($('.viewed_prev').length)
			{
				var prev = $('.viewed_prev');
				prev.on('click', function()
				{
					viewedSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.viewed_next').length)
			{
				var next = $('.viewed_next');
				next.on('click', function()
				{
					viewedSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	7. Init Isotope

	*/

	function initIsotope()
	{
		var sortingButtons = $('.shop_sorting_button');

		$('.product_grid').isotope({
			itemSelector: '.product_item',
            getSortData: {
            	price: function(itemElement)
            	{
            		var priceEle = $(itemElement).find('.product_price').text().replace( '$', '' );
            		return parseFloat(priceEle);
            	},
            	name: '.product_name div a'
            },
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        // Sort based on the value from the sorting_type dropdown
        sortingButtons.each(function()
        {
        	$(this).on('click', function()
        	{
        		$('.sorting_text').text($(this).text());
        		var option = $(this).attr('data-isotope-option');
        		option = JSON.parse(option);
				$('.product_grid').isotope(option);
        	});
        });

	}

	 /* 

	8. Init Price Slider

	*/

    function initPriceSlider()
    {
    	if($("#slider-range").length)
    	{
    		$("#slider-range").slider(
			{
				range: true,
				min: 0,
				max: 1000,
				values: [ 0, 580 ],
				slide: function( event, ui )
				{
					$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				}
			});
				
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
			$('.ui-slider-handle').on('mouseup', function()
			{
				$('.product_grid').isotope({
		            filter: function()
		            {
		            	var priceRange = $('#amount').val();
			        	var priceMin = parseFloat(priceRange.split('-')[0].replace('$', ''));
			        	var priceMax = parseFloat(priceRange.split('-')[1].replace('$', ''));
			        	var itemPrice = $(this).find('.product_price').clone().children().remove().end().text().replace( '$', '' );

			        	return (itemPrice > priceMin) && (itemPrice < priceMax);
		            },
		            animationOptions: {
		                duration: 750,
		                easing: 'linear',
		                queue: false
		            }
		        });
			});
    	}	
    }

    /* 

	9. Init Favorites

	*/

	function initFavs()
	{
		// Handle Favorites
		var items = document.getElementsByClassName('product_fav');
		for(var x = 0; x < items.length; x++)
		{
			var item = items[x];
			item.addEventListener('click', function(fn)
			{
				var prod = fn.target.getAttribute('name');
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementsByClassName('wishlist_count')[0].innerHTML = this.responseText;
					fn.target.classList.toggle('active');
				}
				};
				xmlhttp.open("GET", "php/wish.php?prod=" + prod, true);
				xmlhttp.send();
			});
		}
	}
});