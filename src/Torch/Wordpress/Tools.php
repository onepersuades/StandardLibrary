<?php
namespace Torch\Wordpress;

if ( !class_exists( __NAMESPACE__."\\Tools" ) ):
abstract class Tools
{
	
	public static function isWordpress( $version = "4.1" )
	{
		return ( version_compare( WP_VERSION, $version, "<" ) && function_exists( "add_action" ) );
	}

	public static function getPostPart( $post, $part = "" )
	{
		$the_post = get_post( $post );

		if ( !is_null( $the_post ) && !empty( $part ) )
			return $the_post->{$part};

		return $the_post;
	}

	public static function getMenuByLocation( $location, $key = "name" )
	{
		$locations = get_nav_menu_locations( );

		if ( !empty( $location ) && array_key_exists( $location, $locations ) )
		{
			$menu = get_term( $locations[$location], "nav_menu" );

			if ( !empty( $key ) )
				return $menu->{$key};

			return $menu;
		}

		return null;
	}
}
endif;