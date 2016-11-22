<?php
namespace Torch\Traits;

if ( !trait_exists( __NAMESPACE__."\\Friendly" ) ):
trait Friendly
{
	protected static $__friends = array( );

	private static function addFriendClasses( $classes = array( ) )
	{
		if ( is_string( $classes ) )
			$classes = array( $classes );

		self::$__friends = array_merge( self::$__friends, $classes );

		return true;
	}

	private static function removeFriendClasses( $classes = array( ) )
	{
		if ( is_string( $classes ) )
			$classes = array( $classes );

		foreach ( $classes as $class )
		{
			$index = array_search( $class, self::$__friends );

			if ( FALSE !== $index )
				unset( self::$__friends[$index] );
		}

		return true;
	}

	private static function isFriendClass( $class )
	{
		if ( in_array( $class, self::$__friends ) )
			return true;

		return false;
	}

	private static function isCallFromFriendClass( $depth = 2 )
	{
		$trace = debug_backtrace( );
		return self::isFriendClass( $trace[$depth]["class"] );
	}
}
endif;