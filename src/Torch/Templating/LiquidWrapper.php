<?php
namespace Torch\Templating;

use \Liquid\Liquid;
use \Liquid\Template;
use \Torch\Wordpress\Tools as WordpressTools;
use \Torch\Wordpress\AdminNotice;

if ( !class_exists( "LiquidWrapper" ) ):
class LiquidWrapper implements Renderer
{
	private $environment 	= null;
	private $context 		= null;

	private static $ext		= "lq";
	
	public function __construct( $context )
	{
		if ( class_exists( "Liquid" ) && class_exists( "Template" ) )
		{
			$this->context = $context;

			Liquid::set( "INCLUDE_SUFFIX", self::$ext );
			$this->environment = new Template( );
		}
		else
		{
			$message = __( "\"Liquid\" is required to use this project." );

			if ( WordpressTools::isWordpress( ) )
				new AdminNotice( $message, "error", true );
			else
				throw new Exception( $message );
		}
	}

	public function updateContext( $new_context )
	{
		$this->context = $new_context;
	}

	public function render( $template, $variables, $return = false )
	{
		$return = "";

		if ( $return )
			ob_start( );

		$the_file = $this->context."/".$template.".".self::$ext;
		if ( !is_null( $this->environment ) && file_exists( $the_file ) )
		{
			$string = file_get_contents( $the_file );
			$this->environment->parse( $string );
			echo $this->environment->render( $variables );
		}
		
		if ( $return )
		{
			$return = ob_get_contents( );
			ob_end_clean( );
		}

		return $return;
	}
}
endif;