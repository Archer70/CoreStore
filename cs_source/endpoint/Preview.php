<?php

function csPreview()
{
	global $txt;
	
	header('Content-Type: application/json');
	loadLanguage('/cs_language/CoreStore');

	$returnData = [];

	if (empty($_POST['preview'])) {
		$returnData['success'] = false;
		$returnData['preview'] = $txt['cs_no_preview'];
		echo json_encode($returnData);
		exit;
	}

	$returnData['success'] = true;
	$returnData['preview'] = parse_bbc($_POST['preview']);
	echo json_encode($returnData);
	exit;
}
