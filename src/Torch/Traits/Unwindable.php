<?php
namespace Torch\Traits;

if ( !trait_exists( __NAMESPACE__."\\Unwindable" ) ):
trait Unwindable
{
	private static $__hash_include = array( );

	protected static function unwind( $object, $key, $callback = null )
	{
		$unwound = array( );

		foreach ( $object as $value )
		{
			$property = $value->{$key};

			if ( is_null( $property ) )
				continue;

			$hash = self::hash( $key, $property );

			if ( empty( $unwound ) || !array_key_exists( $hash, $unwound ) )
			{
				if ( is_callable( $callback ) )
					$property = $callback( $property );

				$unwound[$hash] = $property;
			}
		}

		return $unwound;
	}

	private static function addHashInclude( $key, $values = array( ) )
	{
		self::$__hash_include[$key] = $values;

		return true;
	}

	private static function removeHashInclude( $key, $values = array( ) )
	{
		if ( array_key_exists( $key, self::$__hash_include ) )
			unset( self::$__hash_include[$key] );

		return true;
	}

	protected static function hash( $type, $property, $method = "md5" )
	{
		$string = "";
		if ( array_key_exists( $type, self::$__hash_include ) )
			$keys = self::$__hash_include[$type];
		else
			$keys = get_object_vars( $property );

		foreach ( $keys as $key )
		{
			if ( !is_null( $property->{$key} ) )
				$string .= strtolower( $property->{$key} );
		}

		return hash( $method, $string );
	}
}
endif;
