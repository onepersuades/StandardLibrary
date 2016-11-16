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

	private static function isFriendClass( $class )
	{
		if ( in_array( $class, self::$__friends ) )
			return true;

		return false;
	}

	private static function isLastFriendClass( $class, $item = 2 )
	{
		$trace = debug_backtrace( );
		return self::isFriendClass( $trace[$item]["class"] );
	}
}
endif;