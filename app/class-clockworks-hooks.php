<?php 
/** Class responsible to manage hooks.

	Template:
	//	Comment
	array(
		'tag' => '',
		'function' => '',
		'priority' => '',
		'args' => '',
	),
 */
class Clockworks_Hooks {

	protected $actions;
	protected $filters;

	public function set_actions($actions) {
		$this->actions = $actions;
	}

	public function set_filters($filters) {
		$this->filters = $filters;
	}

	public function get_actions() {
		return $this->actions;
	}

	public function get_filters() {
		return $this->filters;
	}

	public function run_hooks() {

		$this->run( 'actions', $this->actions );
		$this->run( 'filters', $this->filters );

	}

	protected function run( $type, $args ) {

		if ( isset( $args['add'] ) ) {

			foreach ( $args['add'] as $hook ) {

				$defaults = array(
					'priority' => 10,
					'args' => null,
				);

				$hook = wp_parse_args( $hook, $defaults );

				if ( 'actions' === $type ) {
					add_action( $hook['tag'], $hook['function'], $hook['priority'], $hook['args'] );
				} else if ( 'filters' === $type ) {
					add_filter( $hook['tag'], $hook['function'], $hook['priority'], $hook['args'] );
				}

			}

		}

		if ( isset( $args['remove'] ) ) {

			foreach ( $args['remove'] as $hook ) {

				$defaults = array(
					'priority' => 10,
					'args' => null,
				);

				$hook = wp_parse_args( $hook, $defaults );

				if ( 'actions' === $type ) {
					remove_action( $hook['tag'], $hook['function'], $hook['priority'] );
				} else if ( 'filters' === $type ) {
					remove_filter( $hook['tag'], $hook['function'], $hook['priority'] );
				}

			}

		}

	}

}