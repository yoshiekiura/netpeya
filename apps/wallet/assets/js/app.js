$(document).ready(function() {
	$('.dropdown-btn').on('click', function(e){
		e.preventDefault();
		$('.dropdown-content').removeClass('show');
		$(this).parent().css('position', 'relative');
		var dropContent = $(this).parent().find('.dropdown-content');
		var parentBottom = $(this).parent().height();

		dropContent.css('top', parentBottom + 5).addClass('show');
	});

	$('.dropdown-content').on('click', function() {
		$(this).removeClass('show');
	})

	$(document).click(function(event) {
	  	if (!$(event.target).closest('.dropdown-content, .dropdown-btn').length) {
	    	$('body').find('.dropdown-content').removeClass('show');
	  	}
	});
})

function myFormatNumber(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}