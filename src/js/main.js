//acинхронная загрузка css
$('<link rel=stylesheet type=text/css href=css/libs.min.css><link rel=stylesheet type=text/css href=css/style.css><link rel=stylesheet type=text/css href=css/scripts.css><link rel=stylesheet type=text/css href=https://fonts.googleapis.com/css?family=Roboto:300,500&subset=latin,cyrillic>').appendTo('head');
//$('<link rel=stylesheet type=text/css href=css/full.min.css><link rel=stylesheet type=text/css href=https://fonts.googleapis.com/css?family=Roboto:300,500&subset=latin,cyrillic>').appendTo('head');


//мобильное устройство?
var isMobile = false; 
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
isMobile = true;
}

if (isMobile == true) {
  $('.animation').addClass('animated');
  $('<style>.animation,.animation *{-webkit-transition:0s all 0s!important;transition:0s all 0s!important;-webkit-animation-duration:0s!important;animation-duration:0s!important;-webkit-animation-delay:0s!important;animation-delay:0s!important}section .site-nav.down,section .site-nav.up{display:none!important}section{height:800px!important}</style>').appendTo('head');
}

//трек функция для целей
function track(event){
  yaCounter37031980.reachGoal(event);
  ga('send','event','submit',event);
}

//инициализация
var initalized = 0;
function initalize(){
	
	if(initalized == 0){

		$('img.lazy').each(function() {
			$(this).attr('src',$(this).data('original'));
		});

		$('body').addClass('loaded').addClass('pre-loaded');

    //$('section').viewportChecker({classToAdd: 'show-section',offset:'50%'});
		//анимация
//  if (isMobile != true) {
//   	setTimeout(function(){$('.animation').viewportChecker({classToAdd: 'animated'})},1000); 
//  }

	    //флаг ициализации
	    initalized = 1;
		console.log('initalized');


	}
}

$(window).load(function(){
  
  console.log('window.load');

  initalize();

  k50Tracker.change();


});

$(document).ready(function() {

console.log('document.ready');
	
initalize();

//new-calculator
//if ($('body').hasClass('kvart')) {
//$( "#slider-range-min" ).slider({
//  range: "min",
//  value: 120,
//  min: 37,
//  max: 265,
//  slide: function( event, ui ) {
//    $( "#squere" ).html(ui.value);
//    $("#n-squere").val($('#squere-val').text().replace(/(\r\n|\n|\r)/gm,""));
//  }
//});
//$( "#squere" ).html('120');
//$("#n-squere").val($('#squere-val').text().replace(/(\r\n|\n|\r)/gm,""));

//}
//else{
$( "#slider-range-min" ).slider({
  range: "min",
  value: 280,
  min: 32,
  max: 715,
  slide: function( event, ui ) {
    $( "#squere" ).html(ui.value);
    $("#n-squere").val($('#squere-val').text().replace(/(\r\n|\n|\r)/gm,""));
  }
});
$( "#squere" ).html('280');
$("#n-squere").val($('#squere-val').text().replace(/(\r\n|\n|\r)/gm,""));

//}

$( "#slider-range" ).slider({
      range: true,
      min: 4500,
      max: 21500,
      values: [ 7000, 17000 ],
      start:function(event,ui){
        slide_start_0 = ui.values[0];
        slide_start_1 = ui.values[1];
      },
      change:function(event,ui){        
            $("#l-price").html(ui.values[0]);
            $("#h-price").html(ui.values[1]);
            $("#n-price").val($('#price-val').text().replace(/(\r\n|\n|\r)/gm,""));
      },
      slide: function( event, ui ) {        
        if (ui.values[1] - ui.values[0] <=1000) {
          if(slide_start_0 - ui.values[0] !=0){
            $( "#slider-range" ).slider( "values", 0,  ui.values[1] - 1000);        
            $("#l-price").html(ui.values[0]);
            $("#h-price").html(ui.values[1]);
            $("#n-price").val($('#price-val').text().replace(/(\r\n|\n|\r)/gm,""));
            return false
          }else{
            $( "#slider-range" ).slider( "values", 1,  ui.values[0] + 1000);        
            $("#l-price").html(ui.values[0]);
            $("#h-price").html(ui.values[1]);
            $("#n-price").val($('#price-val').text().replace(/(\r\n|\n|\r)/gm,""));
            return false
          }
        }
        $("#l-price").html(ui.values[0]);
        $("#h-price").html(ui.values[1]);
        $("#n-price").val($('#price-val').text().replace(/(\r\n|\n|\r)/gm,""));
      }
});
  $("#l-price").html($("#slider-range").slider("values",0));
  $("#h-price").html($("#slider-range").slider("values",1));
  $("#n-price").val($('#price-val').text().replace(/(\r\n|\n|\r)/gm,""));
//we-can слайдинг

$('.we-can a').hover(function(){
	$(this).parent().attr('data-sld',$(this).data('sld'))
		.next().attr('data-sld',$(this).data('sld'))
			.find('.trigw').removeClass('active')
				.parent().children('[data-sld="'+$(this).data('sld')+'"]').addClass('active');
				$('.we-can .big-slides').attr('data-sld',$(this).data('sld'))
					.find('.slide').removeClass('active')
						.parent().children('[data-sld="'+$(this).data('sld')+'"]').addClass('active');
}).click(function(e){
	e.preventDefault();
});


//calculate

$('.calculate .step-btn').click(function(e){
	e.preventDefault();
	var cur_step=$(this).parent().data('step');
	var next_step=$(this).data('nextstep');

    if(next_step =="3"){
        $(this).parent().parent().removeClass('active').addClass('disactive').next().addClass('active');
        cur_step=$(this).parent().parent().data('step');
    }else{
        $(this).parent().removeClass('active').addClass('disactive').next().addClass('active');
    }

	$('.step-lint[data-step="'+cur_step+'"]').attr('data-choosen',$(this).data('choise')).removeClass('active').next().addClass('active');
    
    if (next_step =="1") {
      var choise = $(this).data('choise');
        $('.calculate .stepw .plot,.calculate .calc-type-text').hide(); console.log('wtf')
        $('.calculate .stepw .plot[data-choosen="'+choise+'"],.calc-type-text[data-choosen="'+choise+'"]').show();
    }
  $('input[data-step="'+next_step+'"]').val($(this).text());

}).hover(function() {
	var cur_step=$(this).parent().data('step');
	$('.step-lint[data-step="'+cur_step+'"]').attr('data-choise',$(this).data('choise'));
    $(this).parent().attr('data-choise',$(this).data('choise'));
}, function() {
	var cur_step=$(this).parent().data('step');
	$('.step-lint[data-step="'+cur_step+'"]').attr('data-choise','');
    $(this).parent().attr('data-choise','');
});;

$('.calculate .back').click(function(e){
    e.preventDefault();
    var cur_step=$(this).parent().data('step');
    var prev_step=$(this).data('prevstep');

    $(this).parent().removeClass('active').prev().removeClass('disactive').addClass('active');

    $('.step-lint[data-step="'+cur_step+'"]').removeClass('active').prev().addClass('active');
    
});

// gallery sliders


$('.fancy').fancybox({helpers:{overlay:{locked:false},title:null},'loop': false});

$('.gallery .nav a').click(function(e){
    e.preventDefault();
    $('.gallery .nav a').removeClass('active');
    $(this).addClass('active');
    $('.gallery .slidew').removeClass('active');
    $('.gallery .slidew[data-slider="'+$(this).data('slider')+'"]').addClass('active');

});

g_slider1 = $('.gallery .slidew .slider#gall-sld1').bxSlider({
        infiniteLoop: false,
        nextSelector:'#g-sld1r',
        prevSelector:'#g-sld1l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
      onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld1 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld1 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld1 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld1 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 2) {$('#g-sld1r').fadeOut(250)}
        if (newIndex == 1) {$('#g-sld1l').fadeIn(250)}
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld1 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld1 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld1 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld1 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 1) {$('#g-sld1r').fadeIn(250)}
        if (newIndex == 0) {$('#g-sld1l').fadeOut(250)}
      },
      onSliderLoad:function(){
        $('.gallery .slidew .slider#gall-sld1 .slide.active.bx-clone').removeClass('active');
        $('.gallery .slidew .slider#gall-sld1 .slide').addClass('fadeouted');
        $('.gallery .slidew .slider#gall-sld1 .slide.active').removeClass('fadeouted');
        $('.gallery').addClass('loaded-slider');
      }
    });
g_slider1.goToNextSlide();

g_slider2 = $('.gallery .slidew .slider#gall-sld2').bxSlider({
        infiniteLoop: false,
        nextSelector:'#g-sld2r',
        prevSelector:'#g-sld2l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
      onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld2 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld2 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld2 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld2 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 2) {$('#g-sld2r').fadeOut(250)}
        if (newIndex == 1) {$('#g-sld2l').fadeIn(250)}
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld2 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld2 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld2 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld2 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 1) {$('#g-sld2r').fadeIn(250)}
        if (newIndex == 0) {$('#g-sld2l').fadeOut(250)}
      },
      onSliderLoad:function(){
        $('.gallery .slidew .slider#gall-sld2 .slide.active.bx-clone').removeClass('active');
        $('.gallery .slidew .slider#gall-sld2 .slide').addClass('fadeouted');
        $('.gallery .slidew .slider#gall-sld2 .slide.active').removeClass('fadeouted');
        $('.gallery').addClass('loaded-slider');
      }
    });
g_slider2.goToNextSlide();

g_slider3 = $('.gallery .slidew .slider#gall-sld3').bxSlider({
        infiniteLoop: false,
        nextSelector:'#g-sld3r',
        prevSelector:'#g-sld3l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
      onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld3 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld3 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld3 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld3 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 2) {$('#g-sld3r').fadeOut(250)}
        if (newIndex == 1) {$('#g-sld3l').fadeIn(250)}
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld3 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld3 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld3 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld3 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 1) {$('#g-sld3r').fadeIn(250)}
        if (newIndex == 0) {$('#g-sld3l').fadeOut(250)}
      },
      onSliderLoad:function(){
        $('.gallery .slidew .slider#gall-sld3 .slide.active.bx-clone').removeClass('active');
        $('.gallery .slidew .slider#gall-sld3 .slide').addClass('fadeouted');
        $('.gallery .slidew .slider#gall-sld3 .slide.active').removeClass('fadeouted');
        $('.gallery').addClass('loaded-slider');
      }
    });
g_slider3.goToNextSlide();

g_slider4 = $('.gallery .slidew .slider#gall-sld4').bxSlider({
        infiniteLoop: false,
        nextSelector:'#g-sld4r',
        prevSelector:'#g-sld4l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
      onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld4 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld4 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld4 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld4 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 2) {$('#g-sld4r').fadeOut(250)}
        if (newIndex == 1) {$('#g-sld4l').fadeIn(250)}
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld4 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld4 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld4 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld4 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 1) {$('#g-sld4r').fadeIn(250)}
        if (newIndex == 0) {$('#g-sld4l').fadeOut(250)}
      },
      onSliderLoad:function(){
        $('.gallery .slidew .slider#gall-sld4 .slide.active.bx-clone').removeClass('active');
        $('.gallery .slidew .slider#gall-sld4 .slide').addClass('fadeouted');
        $('.gallery .slidew .slider#gall-sld4 .slide.active').removeClass('fadeouted');
        $('.gallery').addClass('loaded-slider');
      }
    });
g_slider4.goToNextSlide();

g_slider5 = $('.gallery .slidew .slider#gall-sld5').bxSlider({
        infiniteLoop: false,
        nextSelector:'#g-sld5r',
        prevSelector:'#g-sld5l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
      onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld5 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld5 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld5 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld5 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 3) {$('#g-sld5r').fadeOut(250)}
        if (newIndex == 2) {$('#g-sld5l').fadeIn(250)}
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.gallery .slidew .slider#gall-sld5 .slide').addClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld5 .slide').removeClass('active');
          $('.gallery .slidew .slider#gall-sld5 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.gallery .slidew .slider#gall-sld5 .slide[data-sld="'+newIndex+'"]').addClass('active');
        if (newIndex == 1) {$('#g-sld5r').fadeIn(250)}
        if (newIndex == 0) {$('#g-sld5l').fadeOut(250)}
      },
      onSliderLoad:function(){
        $('.gallery .slidew .slider#gall-sld5 .slide.active.bx-clone').removeClass('active');
        $('.gallery .slidew .slider#gall-sld5 .slide').addClass('fadeouted');
        $('.gallery .slidew .slider#gall-sld5 .slide.active').removeClass('fadeouted');
        $('.gallery').addClass('loaded-slider');
      }
    });
g_slider5.goToNextSlide();


//problems slider

slider1 = $('.problems .slidew #wrap').bxSlider({
        infiniteLoop: true,
        nextSelector:'#sld1r',
        prevSelector:'#sld1l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
    onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.problems .slidew #wrap .slide').addClass('fadeouted');
          $('.problems .slidew #wrap .slide').removeClass('active');
          $('.problems .slidew #wrap .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.problems .slidew #wrap .slide[data-sld="'+newIndex+'"]').addClass('active');
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.problems .slidew #wrap .slide').addClass('fadeouted');
          $('.problems .slidew #wrap .slide').removeClass('active');
          $('.problems .slidew #wrap .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.problems .slidew #wrap .slide[data-sld="'+newIndex+'"]').addClass('active');
      },
      onSliderLoad:function(){
        $('.problems .slidew #wrap .slide.active.bx-clone').removeClass('active');
        $('.problems .slidew #wrap .slide').addClass('fadeouted');
        $('.problems .slidew #wrap .slide.active').removeClass('fadeouted');
        $('.problems').addClass('loaded-slider');
      }
    });

//deadline

$('.deadline .g-btn').click(function(e){
    e.preventDefault();
    $('.deadline .g-btn').removeClass('active');
    $(this).addClass('active');
    $('.deadline .backgrounds').attr('data-choosen',$(this).data('choise'));
    $(this).parent().attr('data-choosen',$(this).data('choise'));

}).hover(function() {
    $(this).parent().attr('data-choise',$(this).data('choise'));
    $('.deadline .backgrounds').attr('data-choise',$(this).data('choise'));
}, function() {
    $(this).parent().attr('data-choise','');
    $('.deadline .backgrounds').attr('data-choise','');
});;

//rewievs

slider2 = $('.rewievs .sliderw #wrap-sld2').bxSlider({
        infiniteLoop: true,
        nextSelector:'#sld2r',
        prevSelector:'#sld2l',
        controls: true,
        pager:false,
        auto: false,
        speed: 500,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
    onSlideNext:function($slideElement, oldIndex, newIndex){
          $('.rewievs .sliderw #wrap-sld2 .slide').addClass('fadeouted');
          $('.rewievs .sliderw #wrap-sld2 .slide').removeClass('active');
          $('.rewievs .sliderw #wrap-sld2 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.rewievs .sliderw #wrap-sld2 .slide[data-sld="'+newIndex+'"]').addClass('active');
      },
      onSlidePrev:function($slideElement, oldIndex, newIndex){
          $('.rewievs .sliderw #wrap-sld2 .slide').addClass('fadeouted');
          $('.rewievs .sliderw #wrap-sld2 .slide').removeClass('active');
          $('.rewievs .sliderw #wrap-sld2 .slide[data-sld="'+newIndex+'"]').removeClass('fadeouted');
          $('.rewievs .sliderw #wrap-sld2 .slide[data-sld="'+newIndex+'"]').addClass('active');
      },
      onSliderLoad:function(){
        $('.rewievs .sliderw #wrap-sld2 .slide.active.bx-clone').removeClass('active');
        $('.rewievs .sliderw #wrap-sld2 .slide').addClass('fadeouted');
        $('.rewievs .sliderw #wrap-sld2 .slide.active').removeClass('fadeouted');
        $('.rewievs').addClass('loaded-slider');
      }
    });

$('.rewievs .slide a').click(function(e){
    e.preventDefault();    
    $('<iframe src="https://www.youtube.com/embed/'+$(this).attr('href')+'?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>').appendTo($(this).parent());
    $(this).remove();

});

//навигация
	
    $(".site-nav.up").click(function(){
    	var pos = $(this).parent().offset().top-$(window).scrollTop();
    	if (pos>=0){
    		$("html, body").animate({ scrollTop: $($(this).parent().prev()).offset().top}, 500);
    	}else{
    		$("html, body").animate({ scrollTop: $($(this).parent()).offset().top}, 500);
    	}
    }).on('mouseover', function() {
        $(".site-nav.up").addClass('active');
    }).on('mouseout', function() {
        $(".site-nav.up").removeClass('active');
    });

    $(".site-nav.down").click(function(){
    	var pos = $(this).parent().offset().top-$(window).scrollTop();
    	if (pos<=0){
    		$("html, body").animate({ scrollTop: $($(this).parent().next()).offset().top}, 500);
    	}else{
    		$("html, body").animate({ scrollTop: $($(this).parent()).offset().top}, 500);
    	}
    }).on('mouseover', function() {
        $(".site-nav.down").addClass('active');
    }).on('mouseout', function() {
        $(".site-nav.down").removeClass('active');
    });

//popups
$.arcticmodal('setDefault', {
    afterOpen: function(data, el) {
        el.addClass('fadedown');
    },
    beforeClose: function(data, el) {
        el.removeClass('fadedown');
    }
});

$('.economy a,a.callback').click(function(e){
    if ($(this).hasClass('callback')) {
      $('#zz_event').val($(this).data('event'));
    }
    e.preventDefault();
    $($(this).attr('href')).arcticmodal();
});

$('.pop .close').click(function(e) {
    $(this).parent().arcticmodal('close');
});

$('.conf-btn').click(function(e){
  e.preventDefault();
  $('#conf_pop').arcticmodal();
});


$('.header .prich').click(function(e){
  e.preventDefault();
  $('#smet').arcticmodal();
});

//new-smet-pop
//$('.header .prich').click(function(e){
//  e.preventDefault();
//  $('#new-smet').addClass('active');
//  $('#new-smet-overlay').addClass('active');
//});
//$('#new-smet-overlay,.right-pop-close').click(function(e){
//  e.preventDefault();
//  $('#new-smet').removeClass('active');
//  $('#new-smet-overlay').removeClass('active');
//
//});
//pop-fancy

$('.fancy_pop[data-gal="0"]').click(function(e){
  e.preventDefault();  
  $.fancybox.open( ['img/3d_1_1.jpg','img/3d_1_2.jpg','img/3d_2_1.jpg','img/3d_2_2.jpg','img/3d_3_1.jpg','img/3d_3_2.jpg'], {helpers:{overlay:{locked:false},title:null},'loop': false,beforeClose:function(){$('#pop1').arcticmodal('close')}} )
});

$('.fancy_pop[data-gal="1"]').click(function(e){
  e.preventDefault();  
  $.fancybox.open( ['img/p_01.jpg','img/p_02.jpg','img/p_03.jpg','img/p_04.jpg','img/p_05.jpg','img/p_06.jpg','img/p_07.jpg','img/p_08.jpg','img/p_09.jpg','img/p_10.jpg','img/p_11.jpg','img/p_12.jpg','img/p_13.jpg','img/p_14.jpg','img/p_15.jpg','img/p_16.jpg','img/p_17.jpg','img/p_18.jpg','img/p_19.jpg','img/p_20.jpg','img/p_21.jpg','img/p_22.jpg'], {helpers:{overlay:{locked:false},title:null},'loop': false,beforeClose:function(){$('#pop2').arcticmodal('close')}} )
});

//menu
var menu_active = 0;
$('.menu-btn').click(function(){
  if (!$('.menu').hasClass('active')) {
    $(this).addClass('as-close');
    $('.menu').addClass('active');
    menu_active = 1;
  } else{
    $(this).removeClass('as-close');
    $('.menu').removeClass('active');
    menu_active = 0;
  }
});
$('section').click(function(){
  if (menu_active == 1) {
    $('.menu').removeClass('active');
    $('.menu-btn').removeClass('as-close');
    menu_active = 0;
  }
});
$('.menu .menu-a').click(function(e){
  e.preventDefault();
  $("html, body").animate({ scrollTop: $($(this).attr('href')).offset().top}, 1000);
  $('.menu').removeClass('active');
    $('.menu-btn').removeClass('as-close');
    menu_active = 0;
});

//sound-btn

//$.ionSound({sounds:["bip-2"], path:"js/sounds/", volume:0.05});
//$('.header .prich,.callback,.g-btn,form button,.gallery .nav a,.economy a,.rewievs .slide a').hover(function(){$.ionSound.play('bip-2');},function(){});

//submits etc

$('input[name="name"]').blur(function() {if($(this).val().length < 2) {$(this).addClass('error-input');}});
$('input[name="name"]').focus(function() {$(this).removeClass('error-input');});

$('input[name="phone"]').mask('+7 (999) 999-99-99');
$('input[name="phone"]').blur(function() {if($(this).val().length != 18) {$(this).addClass('error-input');}});
$('input[name="phone"]').focus(function() {$(this).removeClass('error-input');});

function getURLParameter(name) {return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;} 
function run_geo(geo_url){
    $.ajax({type: 'GET',url: geo_url,dataType: 'xml',
        success: function(xml) {$(xml).find('ip').each(function(){
        var city = $(this).find('city').text();
        var region = $(this).find('region').text();
        if(city!=region){var ipg = city+', '+region;}else{var ipg = city;}
        $('<input type="hidden" />').attr({name: 'location', class: 'location', value:ipg}).appendTo("form");
    });}});
}
$.get("http://ipinfo.io", function(response) {geo_url='http://ipgeobase.ru:7020/geo?ip='+response.ip; run_geo(geo_url);}, "jsonp");
utm=[];$.each(["utm_source","utm_medium","utm_campaign","utm_term",'source_type','source','position_type','position','added','creative','matchtype'],function(i,v){$('<input type="hidden" />').attr({name: v, class: v, value: function(){if(getURLParameter(v) == undefined)return '-'; else return getURLParameter(v)}}).appendTo("form")});
$('<input type="hidden" />').attr({name: 'url', value: document.location.href}).appendTo("form");
$('<input type="hidden" />').attr({name: 'title', value: document.title}).appendTo("form");

$('form').submit(function(e){
    e.preventDefault();
    $(this).find('input[type="text"]').trigger('blur');
    if(!$(this).find('input[type="text"]').hasClass('error-input')){
        var type=$(this).attr('method');
        var url=$(this).attr('action');
        var data=$(this).serialize();
        var $event=$(this).find('input[name="event"]').val();
        $.ajax({type: type, url: url, data: data,
        success : function(){
            $.arcticmodal('close');$('#okgo').arcticmodal();
            track($event);
        }
    }); 
    }else{
      $('#error-pop').arcticmodal();
    }
});

});

//stabilization

function stabilize(){

  $('section:not(.rewievs):not(:hidden)').each(function(index, el) {
  
  var eTop = $(this).offset().top; 
  var posTop = eTop - $(window).scrollTop();

    if(posTop>-$(window).height()/2&&posTop<$(window).height()/2){
      $("html, body").animate({ scrollTop: $(this).offset().top}, 250);
      //console.log($(this).attr('class'));
  }

  });

}
$('.menu-btn').addClass('active');

$("html, body").on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function(){
  $("html, body").stop();
});
if (isMobile != true) {
  $(window).scroll(function(){
// menu-btn

  //if ($(window).scrollTop()-$(window).height()>= 0) {
  //  $('.menu-btn').addClass('active');
  //}else{
  //  $('.menu-btn').removeClass('active');
  //}

    clearTimeout($.data(this, 'scrollTimer'));
    
    $.data(this, 'scrollTimer',setTimeout(stabilize,1500));

  });
}else{$('.menu-btn').addClass('active');}

$(window).scroll(function(){
  $('section').each(function(index, el) {
    //var top_w  = $(window).scrollTop() - $(window).height()*index;
    var bot_w  = $(window).scrollTop() - $(el).offset().top;
    
    if (bot_w >= 0 && bot_w <= $(window).height()) {
      if (index == 1 || index == 2 || index == 6 || index == 7 || index == 8 || index == 11) {
        $('.menu-btn').addClass('blacked');
      }else{
        $('.menu-btn').removeClass('blacked');
      }
    }
  });
});