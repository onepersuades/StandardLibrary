<?php
namespace Torch\Templating;

use \Twig_Extension_StringLoader;
use \Twig_SimpleFunction;

if ( !class_exists( __NAMESPACE__."\\TimberExtensions" ) ):
abstract class TimberExtensions
{
	
	public static function register( $twig )
	{
		if ( class_exists( "\Twig_SimpleFunction" ) ):
		$twig->addExtension( new Twig_Extension_StringLoader( ) );
		$twig->addFunction( "do_meta_boxes", new Twig_SimpleFunction( "do_meta_boxes", array( "\Torch\Templating\TimberExtensions", "doMetaBoxes" ) ) );
		endif;

		return $twig;
	}

	public static function doMetaBoxes( $position )
	{
		do_meta_boxes( '', $position, NULL );
	}
}
endif;