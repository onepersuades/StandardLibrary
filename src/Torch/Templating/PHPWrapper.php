<?php
namespace Torch\Templating;

if ( !class_exists( "PHPWrapper" ) ):
class PHPWrapper implements Renderer
{
	private $context = null;
	
	public function __construct( $context )
	{
		$this->context = $context;
	}

	public function render( $template, $variables, $return = false )
	{
		$return = "";

		if ( $return )
			ob_start( );

		extract( $variables, EXTR_OVERWRITE );
		include $this->context."/".$template.".php";

		if ( $return )
		{
			$return = ob_get_contents( );
			ob_end_clean( );
		}

		return $return;
	}
}
endif;