<?php 
/**
 * Main theme class.
 */
class Clockworks_Theme {

	public static $instance;

	protected $hooks_manager;

	public function __construct( $args ) {

		// 	Run hooks manager.
		$this->hooks_manager = new Clockworks_Hooks();
		$this->hooks_manager->set_actions( $args['hooks'] );
		$this->hooks_manager->set_filters( $args['filters'] );
		$this->hooks_manager->run_hooks();

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @return   object    A single instance of this class.
	 */
	public static function get_instance( $args = array() ) {
		if ( null == self::$instance ) {
			self::$instance = new self( $args );
		}
		return self::$instance;
	}

	public function get_actions() {
		return $this->hooks_manager->get_actions();
	}

	public function get_filters() {
		return $this->hooks_manager->get_filters();
	}

}