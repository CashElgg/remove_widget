<?php

		
	// Load configuration
	global $CONFIG;
		
	action_gatekeeper();
	admin_gatekeeper();
	
	$handler = get_input('widget');
	
	$count = 0;
	$result = get_data("SELECT * from {$CONFIG->dbprefix}private_settings where name = 'handler' and value = '{$handler}'");
	if ($result)
	{
		foreach ($result as $r)
		{
      $widget = get_entity($r->entity_guid);
      if ($widget)
      {
        $widget->delete();
        $count++;
      }
    }
	}
	
	
	
	//system_message($body);
	register_error('remove ' . $count . ' widgets');

/*	
	if (($label) && ($type))
	{
		$n = 0;
		while (get_plugin_setting("admin_defined_profile_$n", 'profile')) {$n++;} // find free space
		
		if ( (set_plugin_setting("admin_defined_profile_$n", $label, 'profile')) && 
			(set_plugin_setting("admin_defined_profile_type_$n", $type, 'profile')))
			system_message(elgg_echo('profile:editdefault:success'));
		else
			register_error(elgg_echo('profile:editdefault:fail'));
			
	}
	else
		register_error(elgg_echo('profile:editdefault:fail'));
*/
	
	forward($_SERVER['HTTP_REFERER']);
?>
