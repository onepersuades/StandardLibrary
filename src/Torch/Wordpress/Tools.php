<?php
namespace Torch\Wordpress;

if ( !class_exists( __NAMESPACE__."\\Tools" ) ):
abstract class Tools
{
	
	public static function isWordpress( $version = "4.1" )
	{
		return ( version_compare( WP_VERSION, $version, "<" ) && function_exists( "add_action" ) );
	}
}
endif;