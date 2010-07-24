<?php
/**
 * Remove all instances of a widget
 * @author Cash Costello
 * @license GPL2
 */

function removewidget_init() {
	global $CONFIG;

	register_page_handler('removewidget','removewidget_page_handler');

	register_action("remove_widget/remove", false, $CONFIG->pluginspath . "remove_widget/actions/remove.php", true);
}

function removewidget_pagesetup() {
	global $CONFIG;
	if (get_context() == 'admin' && isadminloggedin()) {
		add_submenu_item(elgg_echo('remove_widgets'), $CONFIG->wwwroot . 'pg/removewidget/');
	}
}

function removewidget_page_handler($page) {
	global $CONFIG;

	include($CONFIG->pluginspath . "remove_widget/index.php");
}


register_elgg_event_handler('init','system','removewidget_init');
register_elgg_event_handler('pagesetup','system','removewidget_pagesetup');
