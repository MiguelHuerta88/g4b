var form = {
	init: function(){
		if (!$("#signupForm").length) return;

		console.log("signup page");

		form.helpers.setupTabs("#form-tabs");
		form.helpers.select('#genre-select');
	},
	helpers: {
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
	}
};

$(document).ready(function(){
	form.init();
});
//# sourceMappingURL=all.js.map
