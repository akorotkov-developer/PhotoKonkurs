$(document).ready(function () {
	$('.select').selectize();

	$('#inputModel').selectize().on("change", function () {
		if ($("#inputModel")[0].selectedOptions[0].value === "1") {
			$(".choose-modelRelise").removeClass("hidden");
			$("#inputModelRelise").attr("data-validation", "required")
		}
		else {
			$(".choose-modelRelise").addClass("hidden");	
			$("#inputModelRelise").attr("data-validation", "")
		}
	});

	$('.phone-mask').mask("+0(000)000-00-00", {
		placeholder: '+7(___)___-__-__'
	});

	$('.modal').on('shown.bs.modal', function () {
	  	$('.date-control').each(function(i, item) {
			var datepicker = $(item).datepicker({
				autoClose: true
			}).data('datepicker');
			datepicker.selectDate(new Date());
		});
	})


	$(".main-nav-list__element a[href^='#']").click(function(){
	        var _href = $(this).attr("href");
	        $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
	        return false;
	});

	$.validate({
		scrollToTopOnError: false
	});

	$(".nominations-list__element__link").click(function(e) {
		e.preventDefault();
		return false;
	});

	$('.jury-list-slick').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
	});

	$('#contactUsForm').submit(function (e) {
			e.preventDefault();
			sendAjaxForm('#contactUsForm', '#contactUsForm', 'sendForm.php', 'Cообщение успешно направлено в оргкомитет.');
			return false; 
	});
	$('#makeOrderForm').submit(function (e) {
			e.preventDefault();
			sendAjaxForm('#makeOrderForm', '#makeOrderForm', 'sendForm.php', 'Ваша заявка успешно принята.');
			return false; 
	});

	function sendAjaxForm(result_form, ajax_form, url, msg) {
	    $.ajax({
	        url:     url, 
	        type:     "POST", 
	        dataType: "text", 
	        data: $(ajax_form).serialize(),  
	        success: function(response) { 
	        	var parent = $(result_form).parent();
	        	var formResponse = $("<div class='success-msg'>"+msg+"</div>");
	        	$(result_form).empty();
	        	$(parent).append(formResponse);
	    	},
	    	error: function(response) { 
	            var parent = $(result_form).parent();
	        	var formResponse = $("<div class='error-msg'>При отправке возникла ошибка.</div>");
	        	$(parent).find('button[type="submit"]').parent().prepend(formResponse);
	    	}
	 	});
	}


});