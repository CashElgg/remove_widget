<?php

admin_gatekeeper();
set_context('admin');
set_page_owner(get_loggedin_userid());

$title = elgg_echo('remove_widgets');

$content = elgg_view_title($title);
$content .= elgg_view('remove_widget/index');

$body = elgg_view_layout("two_column_left_sidebar", '', $content);

page_draw($title, $body);
