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
				if (response == "failed") {
					return
				}
				$("#items tr:first").after(response)
				$("#add_item").slideUp()
			}
		})
	})

	$("#add_category form").on("submit", function(event) {
		event.preventDefault()
		$.ajax({
			url: smf_scripturl + "?action=store_category;route=save",
			type: "post",
			data: $(this).serialize(),
			dataType: "html",
			success: function(response) {
				if (response == "failed") {
					return
				}
				$("#categories tr:first").after(response)
				$("#add_category").slideUp()
			}
		})
	})
	
	$("#categories").on("click", ".delete_category", function(event) {
		event.preventDefault()
		var category = $(this)
		$.ajax({
			url: smf_scripturl + "?action=store_category;route=delete",
			type: "post",
			data: {id: $(category).data("category")},
			dataType: "html",
			success: function(response) {
				if (response == "success") {
					$(category).parents("tr").fadeOut("normal", function()
					{
						$(this).remove()
					})
				}
			}
		})
	})
})

function resetHash()
{
	window.location.hash = ""
}
