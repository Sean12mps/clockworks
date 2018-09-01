<?php 

//	Helper functions.
include_once 'includes/theme-assets.php';
include_once 'includes/theme-support.php';
include_once 'includes/theme-functions.php';

//	Public class.
include_once 'app/public/class-clockworks-header.php';
include_once 'app/public/class-clockworks-body.php';
include_once 'app/public/class-clockworks-footer.php';

//	Admin class.
include_once 'app/admin/class-clockworks-setup.php';
include_once 'app/admin/class-clockworks-settings.php';

//	App class.
include_once 'app/class-clockworks-hooks.php';
include_once 'app/class-clockworks-theme.php';


$hooks = array(

	//	Hooks to add.
	'add' => array(

		//	Add charset.
		array(
			'tag' => 'wp_head',
			'function' => 'clockworks_add_charset',
			'priority' => 0,
		),

		//	Add meta viewport.
		array(
			'tag' => 'wp_head',
			'function' => 'clockworks_add_viewport',
			'priority' => 0,
		),

	),

	//	Hooks to remove.
	'remove' => array(

		//	Disable XML-RPC RSD link from WordPress Header.
		array(
			'tag' => 'wp_head',
			'function' => 'rsd_link',
		),

		//	Remove wlwmanifest link.
		array(
			'tag' => 'wp_head',
			'function' => 'wlwmanifest_link',
		),

	),

);

$filters = array(

	//	Filters to add.
	'add' => array(

		//	Remove WordPress version number.
		array(
			'tag' => 'the_generator',
			'function' => 'clockworks_return_blank',
			'priority' => '',
			'args' => '',
		),

	),

	//	Filters to remove.
	'remove' => array(
	),

);

$theme_args = apply_filters( 'clockworks_theme_args', array(
	'hooks' => $hooks,
	'filters' => $filters,
) );

Clockworks( $theme_args );
