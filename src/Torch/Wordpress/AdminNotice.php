<?php
namespace Torch\Wordpress;

if ( !class_exists( __NAMESPACE__."\\AdminNotice" ) ):
class AdminNotice
{

	public $valid_types = array( "info", "warning", "error" );

	public function __construct( $message, $type, $action = false )
	{
		if ( !in_array( $type, $this->valid_types ) )
			$type = "info";

		if ( $action )
			add_action( "admin_notices", function( ) use ( $message, $type ) { \Torch\Wordpress\AdminNotice::draw( $message, $type ); } );
		else
			echo self::draw( $message, $type );
	}

	public static function draw( $message, $type )
	{
		?>
		<div class="notice notice-<?php echo $type; ?>">
            <p><?php echo $message; ?></p>
        </div>
        <?php
	}
}
endif;