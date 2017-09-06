<?php
namespace Torch\Templating;

use \Timber;
use \Torch\Wordpress\AdminNotice;

if ( !class_exists( __NAMESPACE__."\\TimberWrapper" ) ):
class TimberWrapper implements Renderer
{
	private $context = null;
	
	public function __construct( $context )
	{
		if ( class_exists( "Timber" ) )
			$this->context = $context;
		else
			new AdminNotice( sprintf( __( "The \"%sTimber Library%s\" plugin is required for this custom WordPress Theme to function properly." ), "<a href=\"https://en-ca.wordpress.org/plugins/timber-library/installation/\" target=\"_blank\">", "</a>" ), "error", true );
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

		if ( class_exists( "Timber" ) )
			Timber::render( $this->context."/".$template.".twig", $variables );

		if ( $return )
		{
			$return = ob_get_contents( );
			ob_end_clean( );
		}

		return $return;
	}
}
endif;