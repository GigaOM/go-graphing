<?php

class GO_Graphing
{
	public function __construct()
	{
		$this->register_resources();
	}//end __construct

	/**
	 * registers scripts and styles for d3 and rickshaw
	 */
	public function register_resources()
	{
		$script_config = apply_filters( 'go-config', array( 'version' => 1 ), 'go-script-version' );

		wp_register_style(
			'rickshaw',
			plugins_url( 'js/external/rickshaw/rickshaw.min.css', __FILE__ ),
			array(),
			$script_config['version']
		);

		wp_register_style(
			'd3-parsets',
			plugins_url( 'js/external/d3-parsets/d3.parsets.css', __FILE__ ),
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
			'd3-parsets',
			plugins_url( 'js/external/d3-parsets/d3.parsets.js', __FILE__ ),
			array( 'd3' ),
			$script_config['version'],
			TRUE
		);

		wp_register_script(
			'd3-layout',
			plugins_url( 'js/external/d3.layout.min.js', __FILE__ ),
			array( 'd3' ),
			$script_config['version'],
			TRUE
		);

		wp_register_script(
			'rickshaw',
			plugins_url( 'js/external/rickshaw/rickshaw.min.js', __FILE__ ),
			array( 'd3-layout' ),
			$script_config['version'],
			TRUE
		);
	}//end register_resources

	/**
	 * convert an array to a series that is consumable by d3
	 *
	 * @param array $data Array of key value pairs
	 */
	public function array_to_series( $data )
	{
		if ( ! is_array( $data ) )
		{
			return FALSE;
		}//end if

		$output = array();
		foreach ( $data as $key => $value )
		{
			$output[] = array(
				'x' => $key,
				'y' => $value,
			);
		}

		return $output;
	}//end array_to_series
}//end class
