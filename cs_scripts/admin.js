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

	$("#add_item form").on("submit", function(event) {
		event.preventDefault()
		$.ajax({
			url: smf_scripturl + "?action=store_item;route=create",
			type: "post",
			data: $(this).serialize(),
			dataType: "html",
			success: function(response) {
				if (response == 'failed'){
					return;
				}
				$("#items tr:first").after(response)
			}
		})
	})
})

function resetHash()
{
	window.location.hash = ""
}
