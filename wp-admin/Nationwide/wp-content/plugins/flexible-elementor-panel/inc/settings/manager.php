<?php
namespace FEP\Inc\Settings;

use FEP\Inc\Settings\Model as FEP_Model;

use Elementor\Controls_Manager;
use Elementor\Core\Settings\Base\Manager as BaseManager;
use Elementor\Core\Settings\Base\Model as BaseModel;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Manager extends BaseManager {

	const META_KEY = 'elementor_preferences';
	//const META_KEY = 'elementor_preferences_fep'; // TODO: use custom meta for FEP


	/**
	 * Get model for config.
	 *
	 * Retrieve the model for settings configuration.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @return BaseModel The model object.
	 *
	 */
	public function get_model_for_config() {
		return $this->get_model();
	}


	/**
	 * Get manager name.
	 *
	 * Retrieve settings manager name.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function get_name() {
		return 'fep-settings';
	}

	/**
	 * Get saved settings.
	 *
	 * Retrieve the saved settings from the database.
	 *
	 * @since 2.8.0
	 * @access protected
	 *
	 * @param int $id.
	 * @return array
	 *
	 */
	protected function get_saved_settings( $id ) {

		$settings = []; // create the table

		$options = get_user_meta( get_current_user_id(), self::META_KEY, true );
		if( $options ) {

			foreach ( $options as $option => $value) {

				$settings[ $option ] = $value;

			}

		}

		return $settings;
	}

	/**
	 * Save settings to DB.
	 *
	 * Save settings to the database.
	 *
	 * @param array $settings Settings.
	 * @param int $id Post ID.
	 * @since 2.8.0
	 * @access protected
	 *
	 */
	protected function save_settings_to_db(array $settings, $id) {

		$model_controls = FEP_Model::get_controls_list();

		$one_list_settings = [];

		foreach ( $model_controls as $tab_name => $sections ) {

			foreach ( $sections as $section_name => $section_data ) {

				foreach ( $section_data['controls'] as $control_name => $control_data ) {

					if ( isset( $settings[ $control_name ] ) ) {
					//si le controle est sans valuer (yes ou par default dans elementor), il doit retourner son default

						$one_list_control_name = str_replace( 'elementor_', '', $control_name ); // remove the slug before option 'elementor_'
						$one_list_settings[ $one_list_control_name ] = $settings[ $control_name ]; // add to table

					} else {

						if ( isset($control_data['default']) ) {
							$one_list_control_name = str_replace( 'elementor_', '', $control_name ); // remove the slug before option 'elementor_'
							$one_list_settings[ $one_list_control_name ] = $control_data['default']; // add to table (default value if not set)
						}

					}

				}
			}
		}

		// Save all settings in one list
		if ( ! empty( $one_list_settings ) ) {
			update_user_meta( get_current_user_id(), self::META_KEY, $one_list_settings );
		}

	}

	// get settings from database to share in javascript
	public static function get_settings() {

		$settings = []; // create the table

		$options = get_user_meta( get_current_user_id(), self::META_KEY, true );
		if( $options ) {

			foreach ( $options as $option => $value) {

				$settings[ $option ] = $value;

			}

		} else {

			// there to get all control FEP with default value if any database exist
			$model_controls = FEP_Model::get_controls_list();

			foreach ( $model_controls as $tab_name => $sections ) {

				foreach ( $sections as $section_name => $section_data ) {

					foreach ( $section_data['controls'] as $control_name => $control_data ) {

						if ( isset($control_data['default']) ) {
							$one_list_control_name = str_replace( 'elementor_', '', $control_name ); // remove the slug before option 'elementor_'
							$settings[ $one_list_control_name ] = $control_data['default']; // add to table
						}

					}
				}
			}


		}

		return $settings;

	}

}
