var form = {
	init: function(){
		if (!$("#signupForm").length) return;

		console.log("signup page");

		//form.helpers.setupTabs("#form-tabs");
		form.helpers.select('#genre-select');
		form.helpers.appendForm('.form-types');
		form.helpers.managerListen("#btn-manage");
		form.autocomplete('#artist-autocomplete');
	},
	autocomplete: function(elem){
		$(elem).autocomplete({
      		source: "/ajax/artist-suggest",
      		minLength: 4,
      		response: function( event, ui ) {
      			console.log(ui);
      		}
    	});
	},
	helpers: {
		managerListen: function(elem){
			var item = ".div_manged-users";
			$(elem).click(form.helpers.clicked);
		},
		clicked: function(){
			var elem = '.div_manged-users';
			// show the input where they can enter artist names
			$(elem).removeClass('hide');
		},
		toggleTabOff: function(elem){
			$(elem).removeClass('active');
		},
		toggleTabOn: function(elem){
			$(elem).addClass('active');
		},
		hideForm: function(elem){
			$(elem).removeClass('active').addClass('hide');
		},
		showForm: function(elem){
			$(elem).removeClass('hide').addClass('active');
		},
		setupTabs: function(elem){
			$(elem + " > li").click(function(event){
				// pull the id
				var id = $(this).attr('id');
				
				// remove the active flag and add hide
				form.helpers.toggleTabOff("#artist > a");
				form.helpers.toggleTabOff("#manager > a");
				form.helpers.toggleTabOff("#coordinator > a");

				// activate tab
				form.helpers.toggleTabOn("#" + id + " a");
				//$("#" + id + "-form").removeClass('hide').addClass('active');

				// hide forms
				form.helpers.hideForm("#artist-form");
				form.helpers.hideForm("#manager-form");
				form.helpers.hideForm("#coordinator-form");

				//show form
				form.helpers.showForm("#" + id + "-form");
			});
		},
		showOther: function(hide){
			// show the other input
			if (hide) {
			$("#other").addClass('hide');
			$("#other input").val('');
			} else {
				$("#other").removeClass('hide');
			}
		},
		shouldShowOther: function(text){
			if (text == 'other') {
				form.helpers.showOther(false);
			} else {
				// hide the input
				form.helpers.showOther(true);
			}
		},
		select: function(select){
			var current = $(select + " :selected");
			var text = $(current).text().toLowerCase();
			var id = $(current).val();
			
			// if the current option selected is other we show the other input
			form.helpers.shouldShowOther(text);

			// listen for a change event
			$(select).change(function(){
				var changed = $(select + " :selected").text().toLowerCase();

				form.helpers.shouldShowOther(changed);
			});
		},
		appendForm: function(parent){
			// listen for a click
			$(parent + " div.btn").click(function(){
				var formType = $(this).data('form-id');
				$.get('/append-form/' + formType, function(data){
					// replace the div .form-addition
					$('.form-addition').html(data);
				});
			});
		},
	}
};

$(document).ready(function(){
	form.init();
});