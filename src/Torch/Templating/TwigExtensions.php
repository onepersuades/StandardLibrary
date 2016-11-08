<?php
namespace Torch\Templating;

use \Twig_Extension_StringLoader;
use \Twig_SimpleFunction;

use \Torch\Wordpress\Tools as WordpressTools;

if ( !class_exists( __NAMESPACE__."\\TwigExtensions" ) ):
abstract class TwigExtensions
{
	
	public static function register( $twig )
	{
		if ( class_exists( "\Twig_SimpleFunction" ) ):
		/**
		 *	Generic Inclusions
		 */
		$twig->addExtension( new Twig_Extension_StringLoader( ) );

		/**
		 *	Wordpress-specific Inclusions
		 */
		if ( WordpressTools::isWordpress( ) ):
		$twig->addFunction( "do_meta_boxes", new Twig_SimpleFunction( "do_meta_boxes", array( "\Torch\Templating\TwigExtensions", "doMetaBoxes" ) ) );
		endif;

		endif;

		return $twig;
	}

	public static function doMetaBoxes( $position )
	{
		do_meta_boxes( '', $position, NULL );
	}
}
endif;