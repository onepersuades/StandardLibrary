<?php
namespace Torch\Templating;

if ( !interface_exists( __NAMESPACE__."\\Renderer" ) ):
interface Renderer
{
	
	public function __construct( $context );
	public function render( $template, $variables, $return = false );
}
endif;