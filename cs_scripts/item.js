function getOtherTab()
{
	var currentTab = $("span.enabled")
	return currentTab.attr("id") === "cs_editor_switch" ? $("#cs_preview_switch") : $("#cs_editor_switch")
}

function toggleEditorPanes()
{
	var selectedTab = getOtherTab()
	$("#cs_reply span").removeClass("enabled")
	selectedTab.addClass("enabled")
	$(".cs_content").removeClass("enabled")
	$("#"+selectedTab.data("pane-id")).addClass("enabled")
}

function populatePreview()
{
	var comment = $("#cs_editor textarea")[1].value
	$("#cs_preview div").html(csTxt.loading)
	$.ajax({
		url: smf_scripturl + "?action=store_preview",
		type: "post",
		data: {preview: comment},
		dataType: "json",
		success: function(response) {
			$("#cs_preview div").html(response.preview)
		}
	})
}

$(document).ready(function(){
	$("#cs_reply span").click(function(){
		toggleEditorPanes()
		populatePreview()
	})
	$("body").on("keydown", function(event) { // Hijack the tab key for this page.
		if (event.keyCode === 9) {
			event.preventDefault()
			if (getOtherTab().attr("id") !== "cs_edtor_switch") {
				populatePreview()
			}
			toggleEditorPanes()
		}
	})
})
