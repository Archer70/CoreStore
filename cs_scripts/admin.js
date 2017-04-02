$(document).ready(function()
{
	resetHash()
	$(window).on("hashchange", function(event)
	{
		var hash = window.location.hash
		$(hash).slideDown()
	})
	
	$(".cancel_button").on("click", function()
	{
		var parent = $(this).data("close")
		resetHash()
		$(parent).slideUp()
	})
})

function resetHash()
{
	window.location.hash = ""
}
