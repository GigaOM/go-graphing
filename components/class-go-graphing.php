<?php

class GO_Graphing
{
	public function __construct()
	{
		add_action( 'admin_init', array( $this, 'admin_init' ) );
	}//end __construct

	public function admin_init()
	{
		$script_config = apply_filters( 'go-config', array( 'version' => 1 ), 'go-script-version' );

		wp_register_style(
			'rickshaw',
			plugins_url( 'js/external/rickshaw/rickshaw.min.css', __FILE__ ),
			array(),
			$script_config['version']
		);

		wp_register_script(
			'd3',
			plugins_url( 'js/external/d3.min.js', __FILE__ ),
			array(),
			$script_config['version'],
			TRUE
		);

		wp_register_script(
			'rickshaw',
			plugins_url( 'js/external/rickshaw/rickshaw.min.js', __FILE__ ),
			array( 'd3' ),
			$script_config['version'],
			TRUE
		);
	}//end admin_init
}//end class

/**
 * singleton for GO_Graphing
 */
function go_graphing()
{
	global $go_graphing;

	if ( ! $go_graphing )
	{
		$go_graphing = new GO_Graphing;
	}//end if

	return $go_graphing;
}//end go_graphing
