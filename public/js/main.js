var countGridItem = document.querySelectorAll('.grid-item').length;
    if($('.grid2').hasClass('home-grid')){
    }
    else{
        if(countGridItem>4){
            $( ".grid2" ).removeClass( "change-grid" );
           }
        else{
            $( ".grid2" ).addClass( "change-grid" );
            $( ".grid-desc" ).removeClass( "col-8 col-sm-9 col-12 col-sm-10 " );
        }	
	}

//		console.log(countGridItem);

$(window).bind("resize", function () {
			console.log($(this).width())
			if ($(this).width() > 500) {
				$('.grid2').removeClass('change-grid')
			} 
//			else {
//				$('div').removeClass('red').addClass('yellow')
//			}
		}).trigger('resize');


