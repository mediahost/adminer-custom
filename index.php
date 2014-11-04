<?php

if (@$_GET['file'] === 'default.css') {
	header('Content-Type: text/css');
	return;
}

function adminer_object() {
	include_once dirname(__FILE__) . '/plugins/plugin.php';

	foreach (glob(dirname(__FILE__) . '/plugins/*.php') as $filename) {
		include_once $filename;
	}

	$plugins = array(
		new AdminerDisableJush,
		new AdminerAutocomplete,
		new AdminerSaveMenuPos,
		new AdminerSqlLog("database-log.sql"),
		new AdminerTinymce,
	);

	return new AdminerPlugin($plugins);
}

include dirname(__FILE__) . '/adminer.php';
