<?php
	include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

  global $CONFIG;

	admin_gatekeeper();
	set_context('admin');
	set_page_owner($_SESSION['guid']);

	$body = elgg_view_title(elgg_echo('remove_widgets'));
	
	// build and display pulldown of possible widgets
	$form_body = '<div class="contentWrapper">' . elgg_echo('remove_widget:instructions');
  $possible_widgets = array();
	foreach($CONFIG->widgets->handlers as $handler => $widget)
	{
	  $possible_widgets[$handler] = $widget->name;
  }
  asort($possible_widgets);
  $form_body .= elgg_view('input/pulldown', array(
			  'internalname' => 'widget',
			  'options_values' => $possible_widgets,
		));
	
	$form_body .= '<br />' . elgg_view('input/submit', array('internalname' => 'remove', 'value' => elgg_echo('remove_widget:remove')));
	
	$form_body .= '</div>';
  	
	$body .= elgg_view('input/form', array('body' => $form_body, 'action' => $CONFIG->url . 'action/remove_widget/remove'));
  
	page_draw(elgg_echo('remove_widgets'),elgg_view_layout("two_column_left_sidebar", '', $body));

?>
