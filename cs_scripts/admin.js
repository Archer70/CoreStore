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
		var editing = $(this).children("input[type=submit]").data("modify")
		var route = (editing ? "modify" : "save")
		var postUrl = smf_scripturl + "?action=store_category;route=" + route
		var id = $(this).children("input[type=hidden]").val()
		$.ajax({
			url: postUrl,
			type: "post",
			data: $(this).serialize(),
			dataType: "html",
			success: function(response) {
				if (response == "failed") {
					return
				}
				if (editing) {
					$("#categories tr[data=cat_" + id + "]").replaceWith(response)
				} else {
					$("#categories tr:first").after(response)
				}
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

	$("#categories").on("click", ".modify_category", function(event)
	{
		var name = $(this).parents("tr").children("td:first").text()
		var id = $(this).data("category")
		$("#add_category form").append("<input type=\"hidden\" name=\"id\" value=\"" + id + "\">")
		$("#add_category input[type=text]").val(name)
		$("#add_category input[type=submit]").data("modify", true)
	})
})

function resetHash()
{
	window.location.hash = ""
}
