<?php
if (! defined ( 'ABSPATH' )) {
	die ();
} // Cannot access pages directly.
/**
 *
 * Field: Fieldset
 *
 * @since 1.0.0
 * @version 1.0.0
 *         
 */
class WPSFramework_Option_fieldset extends WPSFramework_Options {
	public function __construct($field, $value = '', $unique = '') {
		parent::__construct ( $field, $value, $unique );
	}
	public function output() {
		echo $this->element_before ();
		
		echo '<div class="wpsf-inner">';
		
		foreach ( $this->field ['fields'] as $field ) {
			
			$field_id = (isset ( $field ['id'] )) ? $field ['id'] : '';
			$field_default = (isset ( $field ['default'] )) ? $field ['default'] : '';
			$field_value = (isset ( $this->value [$field_id] )) ? $this->value [$field_id] : $field_default;
			$unique_id = $this->unique . '[' . $this->field ['id'] . ']';
			
			if (! empty ( $this->field ['un_array'] )) {
				echo wpsf_add_element ( $field, $field_value, $this->unique );
			} else {
				echo wpsf_add_element ( $field, $field_value, $unique_id );
			}
		}
		
		echo '</div>';
		
		echo $this->element_after ();
	}
}
