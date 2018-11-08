function _getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}


function isHTML5() {
	//easy way to validate if browser supports HTML5
    var elem = document.createElement('canvas'); 
    return !!(elem.getContext && elem.getContext('2d'));
}

 

$(document).ready(function() {

	// purchase 
	$( 'form[data-type="purchase"]' ).on( "submit", function( event ) {
		event.preventDefault();
		var productdata = $( this ).serialize();
		var productaction = $(this).attr('action');
		
		//make sure we pass this scope in selector..
		var qty = parseInt($('input[name=quantity]', this).val());
		var min = parseInt($('input[name=minproduct]', this).val()) || qty;
		var max = parseInt($('input[name=maxproduct]', this).val()) || 0;
		
		if(qty == 0) { //need to account for 0 val updates..
			alert('Quantity must be greater than 0.');
			$('input[name=quantity]', this).val(1); //auto-update value to 1
			return false;
		}else if(qty < min) {
			alert('The minimum purchase quantity for this product is ' + min);
			return false;
		}else if((qty > max) && (max > 0)) {
			alert('The maximum purchase quantity for this product is ' + max);
			return false;
		}

		
		if(_getCookie('IAGREE') != 1)
		{
			$('#authmodal').modal('show');
			$('#auth').off();  // remove any existing listeners
			$('#auth').on('submit', function(e){
				e.preventDefault();
				var data = $( this ).serialize();
				var loader = '<div id="circleG"><div id="circleG_1" class="circleG"></div><div id="circleG_2" class="circleG"></div><div id="circleG_3" class="circleG"></div></div>';
				$('#authmodal .modal-body').html(loader);
				$.post($(this).attr('action'), data, function(data){  // post the state change
					$.post(productaction + '?isajax=1', productdata, function(res){  // post the product form
						// on post submit the product info
						$('#authmodal .modal-body').html(res);
						$('#authmodal .modal-footer').html($('#cart-modal .modal-footer').html());	
						var carttotal = $('.hidden-qty-total').attr('data-value');
						$('.visible-qty-total').html(carttotal);
					});		
				});
			});
		} else {
			var data = $( this ).serialize();
			var loader = '<div id="circleG"><div id="circleG_1" class="circleG"></div><div id="circleG_2" class="circleG"></div><div id="circleG_3" class="circleG"></div></div>';
			
			
			$('#cart-modal .modal-body').html(loader);
			$('#cart-modal').modal('show');
			$.post($(this).attr('action') + '?isajax=1',data,function(res){
				$('#cart-modal .modal-body').html(res);
				var carttotal = $('.hidden-qty-total').attr('data-value');
				$('.visible-qty-total').html(carttotal);
			});
		}
	});

	// square space style menu
	$('label.mobile-nav-toggle-label').on('click', function(e){
		console.log('click');
		$('header').toggleClass('active');
	});

	// fixed header
	var theLoc = $('header').position().top;
    $(window).scroll(function() {
        if(theLoc >= $(window).scrollTop()) {
            if($('header').hasClass('fixed')) {
                $('header').removeClass('fixed');
            }
        } else { 
            if(!$('header').hasClass('fixed')) {
                $('header').addClass('fixed');
            }
        }
    });
   

});