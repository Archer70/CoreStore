<?php
/**
 * This file is responsible for creating a mod package to install on an SMF forum.
 * It is meant to be run from the CLI, NOT THE BROWSER.
 * Though it may work in the browser too, if your server has all kinds of file permissions.
 * Generates build package in dist/
 */

$home = __DIR__;
$dist = $home . '/dist';

if (!file_exists($dist)) {
	throw new Exception("No dist/ directory. $dist");
}

$filesToCopy = [
	'cs_language',
	'cs_scripts',
	'cs_source',
	'cs_styles',
	'cs_template',
	'images',
	'README.md',
	'install.php',
	'package-info.xml',
	'uninstall.php'
];

// Make sure everything is there before we start copying stuff.
foreach ($filesToCopy as $file) {
	if (!file_exists("$home/$file")) {
		throw new Exception("File not found: $file");
	}
}

// Remove old tmp dir if it's left over from last time.
if (file_exists("$dist/tmp")) {
	echo "Removing old temporary directory dist/tmp/\n";
	`rm -r $dist/tmp`;
}	

echo "Creating temporary directory dist/tmp/\n";
mkdir("$dist/tmp");

// Copy the files.
foreach ($filesToCopy as $file) {
	echo "Copying $file to dist/tmp\n";
	
	/**
	 * Apparently copy() doesn't do directories.
	 * I could either write a recursive function to go and copy individual files in the directories,
	 * or I could use a shell command.
	 */
	`cp -r $home/$file $dist/tmp/$file`;
}

$modName = 'CoreStore_' . time() . '.zip';
echo "\nCreating new mod package: $modName\n";
`cd $dist/tmp; zip -r $modName *; mv $modName ..; cd $dist`;

echo "\nRemoving dist/tmp/\n";
`rm -r $dist/tmp`;
