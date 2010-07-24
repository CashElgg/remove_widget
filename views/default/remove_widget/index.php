<?php

// build and display drop down menu of possible widgets
$form_body = '<div class="contentWrapper">';
$form_body .= elgg_echo('remove_widget:instructions');

$possible_widgets = array();
foreach ($CONFIG->widgets->handlers as $handler => $widget) {
	$possible_widgets[$handler] = $widget->name;
}
asort($possible_widgets);
$form_body .= elgg_view('input/pulldown', array(
		'internalname' => 'widget',
		'options_values' => $possible_widgets,
));

$form_body .= '<br />';

$form_body .= elgg_view('input/submit', array(
	'internalname' => 'remove',
	'value' => elgg_echo('remove_widget:remove'))
);

$form_body .= '</div>';

echo elgg_view('input/form', array(
	'body' => $form_body,
	'action' => $CONFIG->url . 'action/remove_widget/remove')
);
