<?php

global $CONFIG;

$handler = get_input('widget');

$count = 0;
$result = get_data("SELECT * from {$CONFIG->dbprefix}private_settings where name = 'handler' and value = '{$handler}'");
if ($result) {
	// delete each widget that matches
	foreach ($result as $r) {
		$widget = get_entity($r->entity_guid);
		if ($widget) {
			$widget->delete();
			$count++;
		}
	}
}


system_message(sprintf(elgg_echo('remove_widgets:message'), $count));

forward($_SERVER['HTTP_REFERER']);
