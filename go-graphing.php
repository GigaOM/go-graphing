<?php
/**
 * Plugin Name: Gigaom Graphing
 * Plugin URI: http://gigaom.com
 * Description: Open source graphing libraries
 * Version: 1.0
 * Author: Gigaom
 * Author URI: http://gigaom.com/
 */

/**
 * singleton for GO_Graphing
 */
function go_graphing()
{
	global $go_graphing;

	if ( ! $go_graphing )
	{
		require_once __DIR__ . '/components/class-go-graphing.php';
		$go_graphing = new GO_Graphing;
	}//end if

	return $go_graphing;
}//end go_graphing
