<?php

function torch_autoload( $class )
{
	$parts = explode( "\\", $class );
	$file = __DIR__."/".implode( $parts, "/" ).".php";

	if ( file_exists( $file ) )
		require $file;

	// if ( method_exists( $class, "init" ) )
	// 	$class::init( );
}

spl_autoload_register( "torch_autoload" );