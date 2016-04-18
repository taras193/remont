var initalized = 0;
function initalize(){
	
	if(initalized == 0){

		$('img.lazy').each(function() {
			$(this).attr('src',$(this).data('original'));
		});

		$('body').addClass('loaded').addClass('pre-loaded');

		//анимация

		setTimeout(function(){$('.animation').viewportChecker({classToAdd: 'animated'})},100); 

	    //флаг ициализации
	    initalized = 1;
		console.log('initalized');
	}
}





$(document).ready(function() {
	

console.log('document.ready');
	
setTimeout(initalize(),1000);


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
	$(this).parent().removeClass('active').addClass('disactive').next().addClass('active');
	$('.step-lint[data-step="'+cur_step+'"]').attr('data-choosen',$(this).data('choise')).removeClass('active').next().addClass('active');
}).hover(function() {
	var cur_step=$(this).parent().data('step');
	$('.step-lint[data-step="'+cur_step+'"]').attr('data-choise',$(this).data('choise'));
    $(this).parent().attr('data-choise',$(this).data('choise'));
}, function() {
	var cur_step=$(this).parent().data('step');
	$('.step-lint[data-step="'+cur_step+'"]').attr('data-choise','');
    $(this).parent().attr('data-choise','');
});;




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
    })

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


//navigation

/*    var count = 10;
    var interval;

    $(".site-nav.up").on('mouseover', function() {
        var div = $('body');

        interval = setInterval(function(){
            var pos = div.scrollTop();
            //div.scrollTop(pos - count);
            div.animate({scrollTop :pos-count},100);
        }, 100);
    }).on('mouseout', function() {
        // Uncomment this line if you want to reset the speed on out
        // count = 0;
        clearInterval(interval);
    });

    $(".site-nav.down").on('mouseover', function() {
        var div = $('body');

        interval = setInterval(function(){
            var pos = div.scrollTop();
            div.animate({scrollTop :pos+count},100);
        }, 100);
    }).on('mouseout', function() {
        // Uncomment this line if you want to reset the speed on out
        // count = 0;
        clearInterval(interval);
    });
    */


});
$(window).load(function(){
	
	console.log('window.load');

	initalize();

});